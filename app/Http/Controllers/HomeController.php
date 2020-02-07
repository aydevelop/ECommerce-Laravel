<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.stat');
    }

    public function jsonOrders()
    {
        return response()->json(Order::all());
    }

    public function jsonOrdersGroupBy($f)
    {
        $orders = Order::select('created_at')->get()
        ->groupBy(function($date) use ($f) {
            return Carbon::parse($date->created_at)->format($f);
        });

        $array = $orders->map(function($item){
            return $item->count();
        });

        return $array[Carbon::now()->format($f)];
    }
}
