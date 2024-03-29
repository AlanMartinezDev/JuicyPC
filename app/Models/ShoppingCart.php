<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'product_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
