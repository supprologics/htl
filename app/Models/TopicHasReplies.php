<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class TopicHasReplies extends Model
{
    protected $fillable = [
        'topic_id','user_id','reply','flag','highlight'
   ];
   
    public function topic(){
        return $this->belongsTo(ForumHasTopics::class,'topic_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
