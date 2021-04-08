<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Models\Subject;
use App\Models\Lesson;
use App\Models\Grade;
use App\Models\Language;
use App\Models\ForumHasTopics;
use App\Models\StudentHasSubjects;
use App\Models\AssignmentHasAnswers;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'name', 'email','description', 'password','flag','verification_code','is_verified','dob',
        'grade','grade_updated_at'
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function role(){
        return $this->belongsTo(Role::class);
    }
    
    public function subjects(){
        return $this->belongsToMany(Subject::class,'lecture_has_subjects');
    }

    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
    
    public function grades(){
        return $this->belongsToMany(Grade::class,'student_has_grades');
    }
    
    public function languages(){
        return $this->belongsToMany(Language::class,'student_has_languages');
    }
    
    public function stu_subjects(){
        return $this->belongsToMany(Subject::class,'student_has_subjects');
    }
    
    public function student_subjects(){
        return $this->hasMany(StudentHasSubjects::class,'user_id');
    }
    
    public function isLecturer(){
        return $this->role_id=='2';
    }

    public function topics(){
        return $this->belongsToMany(ForumHasTopics::class,'user_id');
    }

    public function replies(){
        return $this->belongsToMany(TopicHasReplies::class,'user_id');
    }

    
    public function answers(){
        return $this->belongsToMany(AssignmentHasAnswers::class,'user_id');
    }

}
