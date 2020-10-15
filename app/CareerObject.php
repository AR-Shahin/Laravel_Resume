<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareerObject extends Model
{
     protected $fillable = [
        'user_id', 'career_object',
    ];
}
