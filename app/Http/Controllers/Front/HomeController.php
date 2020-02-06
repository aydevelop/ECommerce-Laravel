<?php

namespace App\Http\Controllers\Front;

use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        return view('front.home', compact('products'));
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

    public function checkout()
    {
        $userId = auth()->user()->id;
        $cart_items = \Cart::session($userId)->getContent();
        $total = \Cart::session($userId)->getTotal();

        return view('front.checkout', compact('cart_items','total'));
    }

}
