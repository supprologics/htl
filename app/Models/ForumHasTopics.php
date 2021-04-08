<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ForumHasTopics extends Model
{
    protected $fillable = [
        'lesson_id','topic','description','user_id','highlight','flag'
   ];

   
    public function lesson(){
        return $this->belongsTo(Lesson::class,'lesson_id');
    }
    
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
        
    public function replies(){
        return $this->hasMany(TopicHasReplies::class,'topic_id');
    }
}
