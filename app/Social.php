<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
      'id',
      'social_name',
      'social_link',
      'status',
    ];
}
