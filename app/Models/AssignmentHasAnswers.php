<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class AssignmentHasAnswers extends Model
{
    protected $fillable = [
        'assignment_id','user_id','description','file',
        'highlight','mark','remark','flag'
   ];
   
    public function topic(){
        return $this->belongsTo(ForumHasTopics::class,'topic_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
