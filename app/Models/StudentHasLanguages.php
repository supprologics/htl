<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentHasLanguages extends Model
{
    protected $fillable = [
        'user_id', 'language_id',
   ];
   
    public function languages(){
        return $this->hasMany(Language::class,'language_id');
    }
}
