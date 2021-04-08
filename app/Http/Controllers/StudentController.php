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
use App\Models\StudentHasLanguages;
use App\Models\StudentHasGrades;
use App\Models\StudentHasSubjects;
use App\Http\Requests\Preference\PreferenceUpdate;
use Yajra\DataTables\Facades\DataTables;
use Session;
use Carbon\Carbon;

class StudentController extends Controller
{

    public function __construct(){
        $this->middleware('VerifyStudentSubject')->only(['subject']);
        $this->middleware('VerifyStudentLesson')->only(['lesson']);
    }

    public function mediumandgrade(){
        return view('dash.student.mediumandgrade')
        ->with('mylanguages',StudentHasLanguages::all()->where('user_id',Auth::user()->id))
        ->with('mygrades',StudentHasGrades::all()->where('user_id',Auth::user()->id))
        ->with('grades',Grade::all())
        ->with('languages',Language::all());
    }
    
    public function preferencesupdate(PreferenceUpdate $request){
        $user=Auth::user();
        
        $user->first_login=1;
        $user->save();
        
        $user->grades()->sync($request->grades);
        $user->languages()->sync($request->languages);
    }

    public function relatedsubjects(Request $request){

        $related_languages=Auth::user()->languages;
        $related_languages_subject_id=[];
        foreach($related_languages as $language){
            $related_languages_subjects=$language->subjects;
            foreach($related_languages_subjects as $subject){
                $related_languages_subject_id[]=$subject->id;
            }
        }
        
        $related_grades=Auth::user()->grades;
        $related_grades_subject_id=[];
        foreach($related_grades as $grade){
            $related_grades_subjects=$grade->subjects;
            foreach($related_grades_subjects as $subject){
                $related_grades_subject_id[]=$subject->id;
            }
        }

        #related_grades_and_mediums_intersect_subjects
        $subjects = array_intersect($related_languages_subject_id, $related_grades_subject_id);

        $grades=Grade::orderBy('name')->pluck('id')->toArray();
        $grade_order = implode(',', $grades);
        //intersect related subjects with all subjects
        //subjects order by grade
        $related_subjects=Subject::whereIn('id', $subjects)->orderByRaw(DB::raw("FIELD(grade_id, $grade_order)"))->get()->all();

        $related_grades=Auth::user()->grades->sortBy('name');
        
        return view('dash.student.related')
        ->with('related_subjects',$related_subjects)
        ->with('relatedgrades',$related_grades)
        ->with('relatedlanguages',Auth::user()->languages);
    }

    // enroll subjects for auth users or save session 
    public function enrollsubject(Request $request){
        if (Auth::user()) {

            $subject=Subject::find($request->subject_id);
            //removed conditions for enroll 
            #$grade_value = (int) filter_var($subject->grade->name, FILTER_SANITIZE_NUMBER_INT);

            #$auth_user_school_grade=Carbon::parse(Auth::user()->dob)->age-5;
            #if(($grade_value >= $auth_user_school_grade-1) && ($grade_value <= $auth_user_school_grade+1)){
                StudentHasLanguages::create([
                    'language_id'=>$subject->language_id,
                    'user_id'=>Auth::user()->id
                ]);
                StudentHasGrades::create([
                    'grade_id'=>$subject->grade_id,
                    'user_id'=>Auth::user()->id
                ]);
            #}
            #else{
                #$toast = array('message' => 'Age Limit Issue.Your age around '.($auth_user_school_grade+5).'.'.$subject->name.' for '.$subject->grade->name ,'next'=>'error');
            
                #return response()->json($toast);
            #}
            $usersubjects=StudentHasSubjects::where('user_id',Auth::user()->id)->where('subject_id',$request->subject_id)->count();

            if ($usersubjects > 0) {
                $toast = array('message' => 'You Already Enrolled this Subject','next'=>'error');
                return response()->json($toast);
            }

            StudentHasSubjects::create([
                'user_id'=>Auth::user()->id,
                'subject_id'=>$request->subject_id,
            ]);
            $toast = array('message' => 'Enrolled New Subject Succesfully!','next'=>'success');
            return response()->json($toast);
                
        } else {
            Session::put('subject', $request->subject_id);
            $toast = array('next'=>'login');
            return response()->json($toast);
        }
        
    }

    public function mysubjects(){
        //for order by grade
        $grades=Grade::orderBy('name')->pluck('id')->toArray();
        $mysubjects = Auth::user()->stu_subjects->sortBy(function($model) use ($grades) {
            return array_search($model->getKey(), $grades);
        });
        $mygrades=Auth::user()->grades->sortBy('name');

        return view('dash.student.mysubject')
        ->with('mysubjects',$mysubjects)
        ->with('mygrades',$mygrades);
    }

    
    public function subject(Subject $subject){
        return view('dash.student.mysubjects.index')
        ->with('subject',$subject);
    }

    public function lesson(Lesson $lesson){
        return view('dash.student.lesson.index')
        ->with('lesson',$lesson);
    }

    

    public function enrolled_stu(){
        return view('dash.admin.student.index');
    }

    public function enrolled_stu_getdata(Request $request){
        
        if ($request->ajax()) {
            return Datatables::of(User::orderBy('id','desc')->where('role_id', 3)->where('is_verified', 1)->get())
            ->addIndexColumn()
            ->setRowId('{{$id}}')
            ->removeColumn('updated_at')
            ->addColumn('action', function ($model) {
                return view('dash.admin.student.includes.actions', ['model' => $model]); })
            ->make(true);
        }
    }


    //for un auth users on register enrolled session saved subjects
    public function enrollsubjectweb(){
        
            $session_subject_id=Session::get('subject');
            $subject=Subject::find($session_subject_id);
            #$grade_value = (int) filter_var($subject->grade->name, FILTER_SANITIZE_NUMBER_INT);

            #$auth_user_school_grade=Carbon::parse(Auth::user()->dob)->age-5;
            #if(($grade_value >= $auth_user_school_grade-1) && ($grade_value <= $auth_user_school_grade+1)){
                StudentHasLanguages::create([
                    'language_id'=>$subject->language_id,
                    'user_id'=>Auth::user()->id
                ]);
                StudentHasGrades::create([
                    'grade_id'=>$subject->grade_id,
                    'user_id'=>Auth::user()->id
                ]);
            #}
            #else{
                #$status = array('message' => 'Age Limit Issue.Your age around '.($auth_user_school_grade+5).'.'.$subject->name.' for '.$subject->grade->name ,'status'=>'error');
           # }
            
            $usersubjects=StudentHasSubjects::where('user_id',Auth::user()->id)->where('subject_id',$session_subject_id)->count();

            if ($usersubjects > 0) {
                $status = array('message' => 'You Already Enrolled '.$subject->name,'status'=>'error');
            }
            else{
                StudentHasSubjects::create([
                    'user_id'=>Auth::user()->id,
                    'subject_id'=>$session_subject_id,
                ]);
                $status = array('message' => 'Enrolled '.$subject->name.' Succesfully!','status'=>'success');
            }

            
            $first_login = Auth::user()->first_login; 
            if ($first_login!=1) {
                return view('dash.student.mediumandgrade')
                ->with('session_subject',$status)
                ->with('mylanguages',StudentHasLanguages::all()->where('user_id',Auth::user()->id))
                ->with('mygrades',StudentHasGrades::all()->where('user_id',Auth::user()->id))
                ->with('grades',Grade::all())
                ->with('languages',Language::all());
            }
            if ($first_login==1) {
                return view('dash.student.home')
                ->with('session_subject',$status);
            }

                
        
    }

}
