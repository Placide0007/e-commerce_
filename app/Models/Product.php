<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_price',
        'product_image',
        'category_id',
        'product_description',
        'product_stock',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
