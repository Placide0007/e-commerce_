<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_ame',
        'price',
        'quantity',
        'category',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
