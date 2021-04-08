<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    protected $fillable = [
        'grade_id','language_id','name','description','image',
    ];

    public function medium(){
        return $this->belongsTo(Language::class,'language_id');
    }

    public function grade(){
        return $this->belongsTo(Grade::class);
    }

    public function ref_docs(){
        return $this->hasMany(SubjectReferencesDoc::class);
    }
    
    public function sections(){
        return $this->hasMany(Section::class);
    }

    public function lectures(){
        return $this->belongsToMany(User::class,'lecture_has_subjects');
    }
    
    public function grade_subjects(){
        return $this->belongsToMany(StudentHasGrades::class,'grade_id');
    }
        
    public function students(){
        return $this->belongsToMany(User::class,'student_has_subjects');
    }

}
