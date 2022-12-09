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

    public function stores()
    {
        return $this->belongsToMany(
            Store::class,'product_store');
    }

    public function cats()
    {
        return $this->belongsToMany(
            Cat::class,'product_cat');
    }

    public function orders()
    {
        return $this->belongsToMany(
            Order::class,'order_product');
    }
}
