<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Models\Language;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\StudentHasLanguages;
use App\Models\StudentHasGrades;
use DB;
use App\Http\Requests\Auth\UpdateProfileRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminindex()
    {
        return view('home');
    }
    
    public function lecturerindex()
    {
        return view('dash.lecturer.home')
        ->with('mysubjects',Auth::user()->subjects);
    }
    
    public function studentindex()
    {
        return view('dash.student.home');
    }

    public function profile(){
        return view('dash.student.profile');
    }

    public function profileupdate(Request $request){
        
        $user=User::find(Auth::user()->id);
        $user->first_name='Nipuna';
        $user->last_name='AAAAAA';
        $user->contact='45698774';
        $user->save();
        $toast = array('message' => 'Profile Updated Succesfully!');
        return response()->json($toast);
    }
}
