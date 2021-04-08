<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\Subject;
use DB;
use App\Models\Forum;
use App\Models\ForumHasTopics;
use App\Models\TopicHasReplies;
use App\Models\Grade;
use App\Http\Requests\Forum\CreateForumRequest;
use App\Http\Requests\Forum\UpdateForumRequest;
use App\Http\Requests\Forum\CreateReplyRequest;

class ForumController extends Controller
{
    public function forums(){

        if (Auth::user()->role_id==2) {
            $mysubjects = Auth::user()->subjects->reverse();
        }
        elseif(Auth::user()->role_id==1){
            $mysubjects = Subject::all()->reverse();
        }
        else{
            $grades=Grade::orderBy('name')->pluck('id')->toArray();
            $mysubjects = Auth::user()->stu_subjects->sortBy(function($model) use ($grades) {
                return array_search($model->getKey(), $grades);
            });
        }
        
        $lesson_id=[];
        foreach($mysubjects as $subject){
            foreach($subject->sections as $section){
                foreach($section->lessons as $lesson){
                    if ($lesson->approve==1) {
                        $lesson_id[]=$lesson->id;
                    }
                }
            }
        }
        $topics=ForumHasTopics::orderBy('created_at', 'DESC')->whereIn('lesson_id', $lesson_id)->get()->all();

        
        if (Auth::user()->role_id==2) {
            return view('dash.lecturer.forum.forum')
            ->with('mysubjects',$mysubjects) 
            ->with('topics',$topics);
        }
        elseif(Auth::user()->role_id==1){
            return view('dash.admin.forum.forum')
            ->with('mysubjects',$mysubjects) 
            ->with('topics',$topics);
        }
        else{
            return view('dash.student.forum.forum')
            ->with('mysubjects',$mysubjects) 
            ->with('topics',$topics);
        }
        
    }

    
    public function topic(ForumHasTopics $id){
        
        $grades=Grade::orderBy('name')->pluck('id')->toArray();
        if (Auth::user()->role_id==2) {
            $mysubjects = Auth::user()->subjects;
        }
        elseif(Auth::user()->role_id==1){
            $mysubjects = Subject::all()->reverse();
        }
        else{
            $mysubjects = Auth::user()->stu_subjects;
        }
        
        $lesson_id=[];
        foreach($mysubjects as $subject){
            foreach($subject->sections as $section){
                foreach($section->lessons as $lesson){
                    if ($lesson->approve==1) {
                        $lesson_id[]=$lesson->id;
                    }
                    
                }
            }
        }

        $topics=ForumHasTopics::orderBy('created_at', 'DESC')->whereIn('lesson_id', $lesson_id)->get()->all();

        
        if (Auth::user()->role_id==2) {
            return view('dash.lecturer.forum.topic') 
            ->with('topics',$topics)
            ->with('mysubjects',Auth::user()->subjects->reverse())
            ->with('topic_read',$id);
        }
        elseif(Auth::user()->role_id==1){
            return view('dash.admin.forum.topic') 
            ->with('topics',$topics)
            ->with('topic_read',$id);
        }
        else{
            return view('dash.student.forum.topic') 
            ->with('topics',$topics)
            ->with('topic_read',$id);
        }
        
    }

    public function topicadd(CreateForumRequest $request){
        $new_topic=ForumHasTopics::create([
            'lesson_id'=>$request->lesson_id,
            'topic'=>$request->topic,
            'description'=>$request->description,
            'user_id'=>Auth::user()->id,
        ]);
        $topic='   
            <div class="card card-bordered my-1 topic'.$new_topic->id.'">
                <div class="card-inner">
                <div class="row">
                    <div class="col-md-12">
                        <a  href="'. route('forum.topic',$new_topic->id) .'" class="btn btn-round btn-icon btn-md btn-light mr-1"  style="float: right"><em class="icon ni ni-eye"></em></a>';
                        if($new_topic->user_id==Auth::user()->id){
                            $topic.= '<a class="btn btn-round btn-icon btn-md btn-light mr-1 topic-edit"  data-id="'.$new_topic->id.'" data-topic="'. $new_topic->topic .'" data-description="'. $new_topic->description .'" style="float: right"><em class="icon ni ni-edit"></em></a>';
                        }
                        if (Auth::user()->role_id!=3){
                            $topic.= '<a  onclick="del_topic('.$new_topic->id.')"  class="btn btn-round btn-icon btn-md btn-light mr-1"  style="float: right"><em class="icon ni ni-trash"></em></a>';
                        }
                        $topic.= '<h5 class="card-title">'. $new_topic->topic .'</h5>
                        <p class="card-text">'. $new_topic->description .'</p>
                    </div>
                </div>
                </div>
            </div>
            ';
        
        $toast = array('message' => 'Topic Created Succesfully!','topic'=>$topic);
        return response()->json($toast);
    }

    public function topicedit(UpdateForumRequest $request){
        
        $new_topic=ForumHasTopics::find($request->edit_id);

        $new_topic->update([
            'topic'=>$request->edit_topic,
            'description'=>$request->edit_description,
        ]);

        $topic='   
            <div class="card card-bordered my-1 topic'.$new_topic->id.'">
                <div class="card-inner">
                <div class="row">
                    <div class="col-md-12">
                        <a  href="'. route('forum.topic',$new_topic->id) .'" class="btn btn-round btn-icon btn-md btn-light mr-1"  style="float: right"><em class="icon ni ni-eye"></em></a>';
                        if($new_topic->user_id==Auth::user()->id){
                            $topic.= '<a class="btn btn-round btn-icon btn-md btn-light mr-1 topic-edit"  data-id="'.$new_topic->id.'" data-topic="'. $new_topic->topic .'" data-description="'. $new_topic->description .'" style="float: right"><em class="icon ni ni-edit"></em></a>';
                        }
                        if (Auth::user()->role_id!=3){
                            $topic.= '<a  onclick="del_topic('.$new_topic->id.')"  class="btn btn-round btn-icon btn-md btn-light mr-1"  style="float: right"><em class="icon ni ni-trash"></em></a>';
                        }
                        $topic.= '<h5 class="card-title">'. $new_topic->topic .'</h5>
                        <p class="card-text">'. $new_topic->description .'</p>
                    </div>
                </div>
                </div>
            </div>
            ';
        
        $toast = array('message' => 'Topic Updated Succesfully!','topic'=>$topic,'topic_id'=>'topic'.$new_topic->id);
        return response()->json($toast);
    }

    public function addreply(CreateReplyRequest $request){
        $new_reply=TopicHasReplies::create([
            'topic_id'=>$request->topic_id,
            'reply'=>$request->reply,
            'user_id'=>Auth::user()->id,
        ]);
        $topic='   
            
            <div class="nk-reply-item">
                <div class="nk-reply-header">
                    <div class="user-card">
                        <div class="user-avatar sm bg-pink">
                            <span>ST</span>
                        </div>
                        <div class="user-name">'.$new_reply->user->name.'<span>('.$new_reply->user->role->name.')</span></div>
                    </div>
                    <div class="date-time">'.$new_reply->created_at.'</div>
                </div>
                <div class="nk-reply-body">
                    <div class="nk-reply-entry entry">
                        <p>'. nl2br($new_reply->reply) .'</p>
                    </div>
                </div>
            </div><!-- .nk-reply-item -->
            ';
        
        $toast = array('message' => 'Reply Added!','topic'=>$topic);
        return response()->json($toast);
    }
    
    public function hide(Request $request)
    {
        ForumHasTopics::where('id', $request->id)->delete();

        $toast = array('message' => 'Topic Deleted Succesfully!','remove'=>'topic'.$request->id);
        return response()->json($toast);
    }
}
