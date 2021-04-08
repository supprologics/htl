<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentHasSubjects extends Model
{
    protected $fillable = [
        'user_id', 'subject_id',
   ];
   
    public function shs_subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }

    //StudentHasSubjects->shs
    public function shs_user(){
        return $this->belongsTo(User::class,'user_id');
    }

    
    public function sections(){
        return $this->belongsToMany(Section::class,'subject_id');
    }
}
