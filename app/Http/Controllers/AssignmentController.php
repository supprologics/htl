<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use App\Models\LessonHasAssignments;
use App\Models\AssignmentHasAnswers;
use App\Http\Requests\Assignment\CreateAssignmentRequest;
use App\Http\Requests\Assignment\UpdateAssignmentRequest;
use App\Http\Requests\Assignment\AnswerAssignmentRequest;
use App\Http\Requests\Assignment\MarkAssignmentRequest;

class AssignmentController extends Controller
{

    public function add(CreateAssignmentRequest $request){

        
        $new_assignment=LessonHasAssignments::create([
            'lesson_id'=>$request->assignment_lesson_id,
            'name'=>$request->assignment_name,
            'description'=>$request->assignment_description,
            'deadline'=>$request->assignment_deadline,
        ]);
        
        if($request->hasFile('assignment_file')){
            $file = $request->file('assignment_file');
            $fileName = time().$request->assignment_name.'.'.$request->assignment_file->getClientOriginalExtension();
            $file->move(public_path('storage/assignment_attachments'), $fileName);

            $new_assignment->update([
                'file'=>'assignment_attachments/'.$fileName,
            ]);
        }

        $assignment='   
            <div class="card card-bordered my-1 assignment'.$new_assignment->id.'">
                <div class="card-inner">
                    <div class="row">
                        <div class="col-md-12">
                        <a  class="btn btn-round btn-icon btn-md btn-light mr-1" onclick="del_assignment('.$new_assignment->id.')" style="float: right"><em class="icon ni ni-trash"></em></a>
                        <a  class="btn btn-round btn-icon btn-md btn-light mr-1 assignment-edit"  data-id="'.$new_assignment->id.'" data-name="'.$new_assignment->name .'" data-description="'.$new_assignment->description .'" data-deadline="'.$new_assignment->deadline .'" style="float: right"><em class="icon ni ni-edit"></em></a>
                            <h5 class="card-title">'.$new_assignment->name.'</h5>
                            <p class="card-text">'.$new_assignment->description.'</p>
                            <div class="attach-foot">
                                <span class="attach-info">Deadline : '.$new_assignment->deadline.'</span> ';
                                if (isset($new_assignment->file)) {
                                    $assignment.= '<a class="attach-download link" href="'.route('get.assignmentattach',$new_assignment->id).'"><em class="icon ni ni-download"></em><span>Download Attchment</span></a>';
                                }
                            $assignment.= '</div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            ';
        
        $toast = array('message' => 'Assignment Created Succesfully!','assignment'=>$assignment);
        return response()->json($toast);
    }

    
    function getfile(LessonHasAssignments $assignment){
        return response()->download(public_path('storage/'.$assignment->file));
    }

    
    public function edit(UpdateAssignmentRequest $request){

        $new_assignment=LessonHasAssignments::find($request->edit_assignment_id);
        
        $new_assignment->update([
            'name'=>$request->edit_assignment_name,
            'description'=>$request->edit_assignment_description,
            'deadline'=>$request->edit_assignment_deadline,
        ]);
        
        if($request->hasFile('edit_assignment_file')){
            $file = $request->file('edit_assignment_file');
            $fileName = time().$request->edit_assignment_name.'.'.$request->edit_assignment_file->getClientOriginalExtension();
            $file->move(public_path('storage/assignment_attachments'), $fileName);

            $new_assignment->update([
                'file'=>'assignment_attachments/'.$fileName,
            ]);
        }

        $assignment='   
            <div class="card card-bordered my-1 assignment'.$new_assignment->id.'">
                <div class="card-inner">
                    <div class="row">
                        <div class="col-md-12">
                        <a  class="btn btn-round btn-icon btn-md btn-light mr-1" onclick="del_assignment('.$new_assignment->id.')" style="float: right"><em class="icon ni ni-trash"></em></a>
                        <a  class="btn btn-round btn-icon btn-md btn-light mr-1 assignment-edit"  data-id="'.$new_assignment->id.'" data-name="'.$new_assignment->name .'" data-description="'.$new_assignment->description .'" data-deadline="'.$new_assignment->deadline .'" style="float: right"><em class="icon ni ni-edit"></em></a>
                            <h5 class="card-title">'.$new_assignment->name.'</h5>
                            <p class="card-text">'.$new_assignment->description.'</p>
                            <div class="attach-foot">
                            <span class="attach-info">Deadline : '.$new_assignment->deadline.'</span> ';
                                if (isset($new_assignment->file)) {
                                    $assignment.= '<a class="attach-download link" href="'.route('get.assignmentattach',$new_assignment->id).'"><em class="icon ni ni-download"></em><span>Download Attchment</span></a>';
                                }
                            $assignment.= '</div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            ';
        
        $toast = array('message' => 'Assignment Created Succesfully!','assignment'=>$assignment,'assignment_id'=>'assignment'.$new_assignment->id);
        return response()->json($toast);
    }

    
    public function hide(Request $request)
    {
        LessonHasAssignments::where('id', $request->id)->delete();

        $toast = array('message' => 'Grade Deleted Succesfully!','remove'=>'assignment'.$request->id);
        return response()->json($toast);
    }
    
    public function answer(AnswerAssignmentRequest $request)
    {
        $new_answer=AssignmentHasAnswers::create([
            'assignment_id'=>$request->assignment_id,
            'user_id'=>Auth::user()->id,
            'description'=>$request->assignment_answer_description,
        ]);

        
        if($request->hasFile('assignment_answer_file')){
            $file = $request->file('assignment_answer_file');
            $fileName = time().'.'.$request->assignment_answer_file->getClientOriginalExtension();
            $file->move(public_path('storage/assignment_answers'), $fileName);

            $new_answer->update([
                'file'=>'assignment_answers/'.$fileName,
            ]);
        }
        $answer='
        
        <div class="attach-foot">
            <span class="attach-info">Submited : '.$new_answer->created_at.'</span>
            <span class="attach-info">Mark : -</span>
            <a class="" onclick=answer_view('.$new_answer->id.',as,sa,Not Marked,No Feedback)" >
                <em class="icon ni ni-eye"></em><span>View</span>
            </a>
        </div>
        ';

        $toast = array('message' => 'Answered Succesfully!','answer'=>$answer,'assignment'=>'answer-add'.$new_answer->assignment_id);
        return response()->json($toast);
    }

    public function answersview(LessonHasAssignments $assignment){
        
        if (Auth::user()->role_id==1) {
            return view('dash.admin.lesson.assginmentanswer') 
            ->with('assignment',$assignment);
        }
        else{
            return view('dash.lecturer.lesson.assginmentanswer') 
            ->with('mysubjects',Auth::user()->subjects)
            ->with('assignment',$assignment);
        }
    }

    
    function answerattach(AssignmentHasAnswers $answer){
        return response()->download(public_path('storage/'.$answer->file));
    }

    
    public function marked(MarkAssignmentRequest $request){

        $answer=AssignmentHasAnswers::find($request->answer_id);
        
        $answer->update([
            'mark'=>$request->mark,
            'remark'=>$request->remark,
        ]);
        
        
        $toast = array('message' => 'Answer Marked !','status'=>'markstatus'.$answer->id);
        return response()->json($toast);
    }
}
