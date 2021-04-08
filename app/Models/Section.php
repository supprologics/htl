<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'subject_id','name','description','section_no'
    ];
    
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }

    
    public function my_subject(){
        return $this->belongsToMany(StudentHasSubjects::class,'subject_id');
    }
}
