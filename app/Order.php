<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'order_id',
      'uid',
      'shipping_id',
      'payment_id',
      'order_total',
      'order_status',
    ];
}
