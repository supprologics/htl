<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonHasAssignments extends Model
{
    protected $fillable = [
        'lesson_id','name','description','file','deadline','flag'
   ];

   
    public function lesson(){
        return $this->belongsTo(Lesson::class,'lesson_id');
    }
        
    public function answers(){
        return $this->hasMany(AssignmentHasAnswers::class,'assignment_id');
    }
}
