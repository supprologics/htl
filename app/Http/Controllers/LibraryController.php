<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Grade;
use App\Models\Subject;

class LibraryController extends Controller
{
    public function __construct(){
        $this->middleware('VerifyStudentLibrarySubject')->only(['subjectfile']);
    }

    function subjects(){
        $grades=Grade::orderBy('name')->pluck('id')->toArray();
        $mysubjects = Auth::user()->stu_subjects->sortBy(function($model) use ($grades) {
            return array_search($model->getKey(), $grades);
        });

        return view('dash.student.library.subjects')
        ->with('mysubjects',$mysubjects);
    }

    
    function subjectfile($id){
        $mysubject=Subject::find($id);
        $mysubjectfiles=$mysubject->ref_docs;
        $mysubjectsections=$mysubject->sections;

        return view('dash.student.library.subjects')
        ->with('mysubjectfiles',$mysubjectfiles)
        ->with('mysubjectsections',$mysubjectsections);
    }
}
