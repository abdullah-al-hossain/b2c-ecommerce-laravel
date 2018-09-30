<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
    'p_id', 'product_name', 'short_desc', 'pub_stat',
    'long_desc', 'category_id', 'man_id', 'product_price',
    'product_size', 'product_color'
  ];
}
