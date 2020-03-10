<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['product_name', 'product_code', 'product_price', 'image', 'product_info', 'sale_price'];
}
