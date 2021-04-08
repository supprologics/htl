<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Subject;

class LecturerSubjectController extends Controller
{   
    public function subject(Subject $subject){

        
        if (Auth::user()->role_id==1) {
            return view('dash.admin.mysubjects.index')
            ->with('subject',$subject);
        }
        else{
            return view('dash.lecturer.mysubjects.index')
            ->with('mysubjects',Auth::user()->subjects)
            ->with('subject',$subject);
        }
    }
}
