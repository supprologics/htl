<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LectureHasSubjects extends Model
{

    protected $fillable = [
        'lecturer_id', 'subject_id',
   ];
}
