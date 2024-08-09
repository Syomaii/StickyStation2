<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_image',
        'product_name',
        'product_quantity',
        'product_price',
        'product_description',
        'product_status',
        'product_type',
        'user_id',
    ];
}
