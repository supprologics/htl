<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Models\Section;
use App\Models\Lesson;
use App\Models\LessonAttachment;
use App\Http\Requests\Lesson\VideoUploadRequest;
use App\Http\Requests\Lesson\AttachmentUpdateRequest;
use App\Http\Requests\Lesson\DescriptionUpdateRequest;
use Yajra\DataTables\Facades\DataTables;

class LecturerLessonController extends Controller
{    
    
    public function redirect_back(){
        return redirect()->back();
    }

    public function lesson(Lesson $lesson){
        
        if (Auth::user()->role_id==1) {
            return view('dash.admin.lesson.index')
            ->with('lesson',$lesson);
        }
        else{
            return view('dash.lecturer.lesson.index')
            ->with('mysubjects',Auth::user()->subjects)
            ->with('lesson',$lesson);
        }
        
    }

    public function newlesson(Request $request){
        $lesson=Lesson::create([
            'section_id'=>$request->section_id,
            'lecturer_id'=>Auth::user()->id,
            'name'=>$request->lesson_name,
            'views'=>'0',
            'flag'=>'0',
            'approve'=>'0',
        ]);
        return redirect(route('lecturer.lesson',$lesson->id));
        
    }

    public function upload(VideoUploadRequest $request)
    {
        $video = $request->file('file');
        $videoName = time().'.'.$request->file->getClientOriginalExtension();
        #$videoName = time().$request->file->getClientOriginalName();
        $video->move(public_path('storage/lesson'), $videoName);
        $video_loc='./storage/lesson/'.$videoName;

        $lesson=Lesson::find($request->lesson_id);
        \File::delete(public_path($lesson->video));

        Lesson::where('id', $request->lesson_id)->update([
            'video'=>$video_loc,
            'approve'=>'0',
            'flag'=>'0',
        ]);
        $toast = array('message' => 'Lesson Video Content Updated Succesfully!','video'=>$video_loc,'id'=>$request->lesson_id);
        return response()->json($toast);
    }

    public function content_upload(DescriptionUpdateRequest $request){
        $lesson=Lesson::where('id', $request->lesson_desc_id)->update([
            'description' => $request->lesson_description,
            'flag'=>'0',
            'approve'=>'0',
        ]);
        
        $toast = array('message' => 'Lesson Content Updated Succesfully!','description'=>$request->lesson_description);
        return response()->json($toast);
    }

        //not used yet
    public function lesson_delete(Request $request)
    {
        Lesson::where('id', $request->id_delete)->delete();
        
        $toast = array('message' => 'Lesson Content Deleted Succesfully!','id'=>$request->id_delete);
        return response()->json($toast);
    }


    //attachments
    
    public function attachadd(AttachmentUpdateRequest $request){
        
        $file = $request->file('lesson_attach_file_path');
        $fileName = time().$request->lesson_attch_name.'.'.$request->lesson_attach_file_path->getClientOriginalExtension();
        #$fileName = time().$request->file->getClientOriginalName();
        $file->move(public_path('storage/lesson_attachments'), $fileName);

        $attach=LessonAttachment::create([
            'name'=>$request->lesson_attch_name,
            'lesson_id'=>$request->attch_lesson_id,
            'file_path'=>'storage/lesson_attachments/'.$fileName,
        ]);
        $attchcount=LessonAttachment::where('lesson_id',$attach->lesson_id)->count();
        
        Lesson::where('id', $request->attch_lesson_id)->update([
            'flag'=>'0',
            'approve'=>'0',
        ]);

        $tr='
        <tr class="tb-tnx-item" id="attachment-'.$attach->id.'">
            <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">'.$attach->name.'</span>
                </div>
            </td>
            <td class="tb-tnx-action">
                <div class="dropdown">
                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs" style="">
                        <ul class="link-list-plain">
                            <li><a href="'.route('get.lessonattach',$attach->id).'">Download</a></li>
                            <li><a onclick="del_attach('.$attach->id.')"  class="remove_file" id="'.$attach->id.'">Remove</a></li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        ';
        
        $toast = array('message' => 'References Document Uploaded Succesfully!','tr'=>$tr,'count'=>$attchcount);
        return response()->json($toast);
    }

    
    function getfile(LessonAttachment $attach){
        return response()->download(public_path($attach->file_path));

    }

    public function attachdelete(Request $request)
    {
        $attach=LessonAttachment::find($request->id);
        Storage::delete($attach->file_path);
        $attach->delete();
        $attchcount=LessonAttachment::where('lesson_id',$attach->lesson_id)->count();

        $toast = array('message' => 'Attachment Deleted Succesfully!','id'=>$request->id,'count'=>$attchcount);
        return response()->json($toast);
    }
    
    public function status(Request $request)
    {
        Lesson::where('id', $request->lesson_status_id)->update([
            'name'=>$request->lesson_name,
            'flag'=>$request->status_type,
            'approve'=>'0',
        ]);
        $toast = array('message' => 'Lesson Status Updated Succesfully!','name'=>$request->lesson_name);
        return response()->json($toast);
    }
    
    public function getstatus(Request $request)
    {
        $lesson=Lesson::find($request->id);
        if ($lesson->flag==0) {
            $status='<span class="badge badge-pill badge-outline-info">Draft</span>';
        }
        elseif ($lesson->flag==2) {
            $status='<span class="badge badge-pill badge-outline-danger">Rejected</span>';
        }
        elseif ($lesson->flag==3) {
            $status='<span class="badge badge-pill badge-outline-secondary">On Review</span>';
        }
        elseif ($lesson->flag==1) {
            $status='<span class="badge badge-pill badge-outline-success">Published</span>';
        }
        
        $toast = array('message' => 'Lesson Status Updated Succesfully!','status'=>$status);
        return response()->json($toast);
    }

    public function lessonapprove(){
        return view('dash.admin.approve.index');
    }

    public function lessonapprove_getdata(Request $request){
        
        if ($request->ajax()) {
            return Datatables::of(Lesson::orderBy('updated_at','desc')->where('flag', 3)->get())
            ->addIndexColumn()
            ->setRowId('{{$id}}')
            ->removeColumn('updated_at')
            ->editColumn('lecturer_id', function ($model) {
                $name=$model->lecturer->name;
                return $name; })
            ->addColumn('action', function ($model) {
                return view('dash.admin.approve.includes.actions', ['model' => $model]); })
            ->make(true);
        }
    }
}
