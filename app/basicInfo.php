<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class basicInfo extends Model
{
    protected $table = 'basic_information';
    protected $fillable = [
        'user_id', 'first_name', 'last_name','profession','email','phone','website','address','post_code','division',
    ];
}