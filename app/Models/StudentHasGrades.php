<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentHasGrades extends Model
{
    protected $fillable = [
        'user_id', 'grade_id',
   ];
   
    public function grade_subjects(){
        return $this->hasMany(Subject::class,'grade_id');
    }
}
