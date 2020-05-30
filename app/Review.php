<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  protected $fillable = [
      'uid',
      'p_id',
      'created_at',
      'updated_at',
  ];

  protected $dates = [
    'created_at',
    'updated_at',
  ];
}
