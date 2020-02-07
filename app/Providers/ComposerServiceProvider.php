<?php

namespace App\Providers;

use App\Category;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.partials.nav', function($view) {
            $categories = Category::all();
            $cart_items = 0;

            if(Auth::check()){
                $userId = auth()->user()->id;
                $cart_items = \Cart::session($userId)->getContent()->count();
            }

            $view->with(['categories' => $categories,'cart_items' => $cart_items]);
        });
    }
}
