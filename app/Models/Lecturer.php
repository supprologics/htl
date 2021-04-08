<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = [
         'name', 'email','description', 'password','flag','image','contact'
    ];

    
}
