<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Lesson extends Model
{
    protected $fillable = [
        'section_id','video','lecturer_id','poster','views'
        ,'name','description','flag','approve'
    ];
    
    public function section(){
        return $this->belongsTo(Section::class);
    }
    
    public function lecturer(){
        return $this->belongsTo(User::class,'lecturer_id');
    }

    public function attachments(){
        return $this->hasMany(LessonAttachment::class);
    }

    
    public function topics(){
        return $this->hasMany(ForumHasTopics::class,'lesson_id');
    }
    
    public function assignments(){
        return $this->hasMany(LessonHasAssignments::class,'lesson_id');
    }
}
