<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Language;
use App\Models\Lesson;
use App\Models\Grade;
use App\Models\Subject;
use DB;
use Carbon\Carbon;
use App\Models\StudentHasLanguages;
use App\Models\StudentHasGrades;
use App\Models\StudentHasSubjects;

class SiteController extends Controller
{

    public function welcome(){
        return view('welcome')
        ->with('grades',Grade::orderBy('name')->get())
        ->with('subjects',Subject::orderBy('created_at','desc')->get());
    }
    
    public function subjects(Request $request){
        if ($request->grade_filter && $request->language_filter) {
                
            if($request->search_filter) {
                $subjects=Subject::where('language_id',$request->language_filter)->where('grade_id',$request->grade_filter)->where('name','LIKE','%'.$request->search_filter.'%')->orderBy('created_at','asc')->get();
            }
            else{
                $subjects=Subject::where('language_id',$request->language_filter)->where('grade_id',$request->grade_filter)->orderBy('created_at','asc')->get();
            }
        }
        elseif($request->grade_filter) { 
            if($request->search_filter) {
                $subjects=Subject::where('grade_id',$request->grade_filter)->where('name','LIKE','%'.$request->search_filter.'%')->orderBy('created_at','asc')->get();
            }
            else{
                $subjects=Subject::where('grade_id',$request->grade_filter)->orderBy('created_at','asc')->get();
            }
        } 
        elseif($request->language_filter) {
            if($request->search_filter) {
                $subjects=Subject::where('language_id',$request->language_filter)->where('name','LIKE','%'.$request->search_filter.'%')->orderBy('created_at','asc')->get();
            }
            else{
                $subjects=Subject::where('language_id',$request->language_filter)->orderBy('created_at','asc')->get();
            }
        }
        else{
            if($request->search_filter) {
                $subjects=Subject::where('name','LIKE','%'.$request->search_filter.'%')->orderBy('created_at','asc')->get();
            }
            else{
                $subjects=Subject::orderBy('created_at','asc')->get();
            }
        }
        
        #$subject_show=[];
        #foreach ($subjects as $subject){
        #    $lessons=0;
        #    foreach ($subject->sections as $section){
        #        $count=$section->lessons->where('approve',1)->count();
        #        $lessons+=$count;
        #    }
        #    if($lessons>0){
        #        $subject_show[]=$subject->id;
        #    }
        #}
           //if you need to show subjects with lesson pass $show
        #$show=Subject::whereIn('id', $subject_show)->get();

        $current_filter=[$request->grade_filter,$request->language_filter,$request->search_filter];

        return view('site.subjects')
        ->with('current_filter',$current_filter)
        ->with('grades',Grade::orderBy('name')->get())
        ->with('languages',Language::orderBy('name')->get())
        ->with('subjects',$subjects);
    }
    
    public function subject(Subject $subject){
        return view('site.subject')
        ->with('subject',$subject);
    }

    public function about(){
        return view('site.about');
    }
}
