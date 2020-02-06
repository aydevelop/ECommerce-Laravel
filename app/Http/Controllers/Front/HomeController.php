<?php

namespace App\Http\Controllers\Front;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function products()
    {
        $products = Product::paginate(30);
        return view('front.home', compact('products'));
    }

    public function product(Product $product)
    {
        return view('front.product_show', compact('product'));
    }
}
