<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'brand',
        'image'
    ];

    public function store()
    {
        return $this->belongsToMany(
            Store::class,'product_store');
    }

    public function category()
    {
        return $this->belongsToMany(
            Category::class,'product_cat');
    }

    public function order()
    {
        return $this->belongsToMany(
            Order::class,'order_product');
    }
}
