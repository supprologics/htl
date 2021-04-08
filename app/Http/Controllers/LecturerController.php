<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Models\Subject;
use App\Models\Lesson;
use App\Models\LectureHasSubjects;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Lecturer\CreateLecturerRequest;
use App\Http\Requests\Lecturer\UpdateLecturerRequest;

class LecturerController extends Controller
{

    public function index(){
        return view('dash.admin.lecturer.index')
        ->with('all_subjects',Subject::all());
    }

    public function getdata(Request $request){
        
        if ($request->ajax()) {
            return Datatables::of(User::where('role_id', 2)->where('flag', 1)->get())
            ->addIndexColumn()
            ->setRowId('{{$id}}')
            ->removeColumn('updated_at')
            ->addColumn('action', function ($model) {
                return view('dash.admin.lecturer.includes.actions', ['model' => $model]); })
            ->make(true);
        }
    }

    public function add(CreateLecturerRequest $request){
        $data=$request;
        $password=Str::random(8);
        $data['password']=$password;
        $lecturer=User::create([
            'role_id'=>2,
            'name'=>$request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'flag'=>'1',
            'is_verified'=>'1',
        ]);

        \Mail::to($lecturer->email)->send(new \App\Mail\LectureMail($data));

        $data = array('message' => 'Lecturer Created Succesfully!','lec_id'=>$lecturer->id);
        return Response::json($data); 
    }

    
    public function edit(UpdateLecturerRequest $request){
        User::where('id', $request->edit_id)->update([
            'name' => $request->edit_name,
            'email' => $request->edit_email,
        ]);
        $toast = array('message' => 'Lecturer Updated Succesfully!');
        return response()->json($toast);
    }

    
    public function delete(Request $request)
    {
        User::where('id', $request->delete_id)->delete();
        
        $toast = array('message' => 'Lecturer Deleted Succesfully!');
        return response()->json($toast);
    }

    
    public function subject(Request $request){
        $lecturer=User::find($request->lecturer_id);
        $lecturer->subjects()->sync($request->lec_subjects);
        
        $toast = array('message' => 'Assigned To Subjects Succesfully!');
        return response()->json($toast);
    }

    
    public function lecsubjectsindex(User $lecturer){
        return view('dash.admin.lecturersubjects.index')
        ->with('all_subjects',Subject::all())
        ->with('lecturer',$lecturer);
    }

    public function lecsubgetdata(Request $request,$lecturer){
        
        if ($request->ajax()) {
            return Datatables::of(LectureHasSubjects::where('user_id', $lecturer)->get())
            ->addIndexColumn()
            ->setRowId('{{$id}}')
            ->editColumn('subject_id', function ($model) {
                $subject=Subject::find($model->subject_id)->name;
                $subject_grade=Subject::find($model->subject_id)->grade->name;
                $subject_medium=Subject::find($model->subject_id)->medium->name;
                $name=$subject.' | '.$subject_grade.' | '.$subject_medium;
                return $name;
             })
            ->addColumn('lesson_count', function ($model) {
                $sections=Subject::find($model->subject_id)->sections;
                $lessons_count=0;
                foreach($sections as $section){
                    
                    $count=$section->lessons->count();
                    $lessons_count+=$count;
                }
                return $lessons_count;
             })
             ->addColumn('lec_lesson_count', function ($model) {
                 $sections=Subject::find($model->subject_id)->sections;
                 $lessons_count=0;
                 foreach($sections as $section){
                     $count=Lesson::where('section_id',$section->id)->where('lecturer_id',$model->user_id)->count();
                     $lessons_count+=$count;
                 }
                 return $lessons_count;
              })
            ->addColumn('action', function ($model) {
                return view('dash.admin.lecturersubjects.includes.actions', ['model' => $model]); })
            ->make(true);
        }
    }

    
    public function approve(Request $request)
    {
        Lesson::where('id', $request->id)->update([
            'flag'=>'1',
            'approve'=>'1',
        ]);
        $toast = array('message' => 'Lesson Published!');
        return response()->json($toast);
    }
    
    public function reject(Request $request)
    {
        Lesson::where('id', $request->id)->update([
            'flag'=>'2',
            'approve'=>'0',
        ]);
        $toast = array('message' => 'Lesson Rejected!');
        return response()->json($toast);
    }
    

}