<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
     protected $fillable = [
        'user_id', 'company_name', 'position','year',
    ];
}
