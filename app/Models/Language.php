<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Language extends Model
{
    protected $fillable = [
        'name','flag','grade_in_lang'
    ];

    public function subjects(){
        return $this->hasMany(Subject::class,'language_id');
    }
    
    public function students(){
        return $this->belongsToMany(User::class,'student_has_languages');
    }
}
