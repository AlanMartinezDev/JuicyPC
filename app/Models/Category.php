<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function product()
    {
        return $this->hasMany(
            Product::class,'order_product');
    }

    public function user()
    {
        return $this->belongsTo(
            User::class);
    }
}
