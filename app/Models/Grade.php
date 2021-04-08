<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Grade extends Model
{
    protected $fillable = [
        'name','flag','value','image'
    ];

    public function subjects(){
        return $this->hasMany(Subject::class);
    }

    public function students(){
        return $this->belongsToMany(User::class,'student_has_grades');
    }
}
