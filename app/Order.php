<?php

namespace App;

use App\Product;
use App\OrderStatus;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'orders_products','product_id','order_id');
    }
}
