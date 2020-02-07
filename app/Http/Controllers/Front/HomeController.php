<?php

namespace App\Http\Controllers\Front;

use App\User;
use App\Order;
use App\Product;
use App\Callback;
use App\Category;
use App\Mail\NewOrder;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\CallbackCreateRequest;

class HomeController extends Controller
{
    public function products($category='')
    {
        $products;
        if($category){
            $products = Product::where('category_id', $category)->filter()->paginate(20);
        }else{
            $products = Product::filter()->paginate(20);
        }

        $category_name = '';
        if(!empty($category)){
            $category_name = Category::findOrFail($category)->name;
        }

        return view('front.home', compact('products','category_name'));
    }

    public function product(Product $product)
    {
        return view('front.product_show', compact('product'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::where('name','LIKE','%'.$search.'%')->orWhere('text','LIKE','%'.$search.'%')->get();
        $search_count = count($products);
        $search=1;

        return view('front.home', compact('products','search_count','search'));
    }

    public function getUAH($total, $key)
    {
        try {
            $content = file_get_contents("https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5");
            $result  = json_decode($content);
            $uah = (floatval($result[0]->sale) * $total);
            $seconds = 1800;
            Cache::set($key, $uah, $seconds);
        } catch (Exception $e) {
        }
    }

    public function checkout()
    {
        $userId = auth()->user()->id;
        $cart_items = \Cart::session($userId)->getContent();
        $total = \Cart::session($userId)->getTotal();

        $uah = 0.0;
        $key = "uah";
        if(Cache::has($key)){ $uah = Cache::get($key); }
        else { $uah = $this->getUAH($total, $key); }

        if($total==0) { $uah=0; }
        return view('front.checkout', compact('cart_items','total', 'uah'));
    }

    public function orderCreate(OrderCreateRequest $request)
    {
        $userId = auth()->user()->id;
        $cart_items = \Cart::session($userId)->getContent();

        if($cart_items->count() > 0){
            $text = $request->phone;
            $text .= ', ' . $request->addresses;

            $order = Order::create(['user_id' => $userId, 'text' => $text]);
            $cart_items->map(function ($item) use($order){
                $order->products()->save($item->model);
            });

            \Cart::session($userId)->clear();
            Mail::to(auth()->user()->email)->queue(new NewOrder($order->load('products')));
            $admins = User::where('role_id','1')->get()->map(function($item){ return $item->email; });
            Mail::to($admins)->queue(new NewOrder($order->load('products')));
        }

        return redirect('/orders');
    }

    public function callbackCreate(CallbackCreateRequest $request)
    {
        Callback::create(['phone' => $request->phone, 'name' => $request->name]);

        return redirect('/');
    }

    public function orders()
    {
        $orders = auth()->user()->orders()->latest()->with('products')->get();
        return view('front.orders', compact('orders'));
    }

}
