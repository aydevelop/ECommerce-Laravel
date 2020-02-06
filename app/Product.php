<?php

namespace App;

use App\Image;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Product extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function scopeFilter($query)
    {
        $price_up = Input::get('price_up', '');
        if($price_up){
            $query->orderBy('price');
        }

        $price_down = Input::get('price_down', '');
        if($price_down){
            $query->orderByDesc('price');
        }

        $price_up = Input::get('name_up', '');
        if($price_up){
            $query->orderBy('name');
        }

        $price_down = Input::get('name_down', '');
        if($price_down){
            $query->orderByDesc('name');
        }

        return $query;
    }
}
