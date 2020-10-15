<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
     protected $fillable = [
        'user_id', 'certificate_name', 'about','year',
    ];
}
