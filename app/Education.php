<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'user_id', 'degree', 'institute','year',
    ];
    
    

}
