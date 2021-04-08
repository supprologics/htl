<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Grade;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Requests\Subject\CreateSubjectRequest;
use App\Http\Requests\Subject\UpdateSubjectRequest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class SubjectController extends Controller
{

    public function index(){
        return view('dash.admin.subject.index')
        ->with('grades',Grade::all())
        ->with('mediums',Language::all());
    }

    public function getdata(Request $request){
        
        if ($request->ajax()) {
            return Datatables::of(Subject::all())
            ->editColumn('language_id', function ($model) {
                return $model->medium->name;
            })
            ->editColumn('grade_id', function ($model) {
                return $model->grade->name;
            })
            ->addIndexColumn()
            ->setRowId('{{$id}}')
            ->removeColumn('updated_at')
            ->addColumn('action', function ($model) {
                return view('dash.admin.subject.includes.actions', ['model' => $model]); })
            ->make(true);
        }
    }
    public function add(CreateSubjectRequest $request){
        $subject=Subject::create([
            'name'=>$request->name,
            'language_id'=>$request->medium,
            'grade_id'=>$request->grade,
            'description'=>$request->description,
        ]);
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().$request->name.'.'.$request->image->getClientOriginalExtension();
            $file->move(public_path('storage/subject_image'), $fileName);

            $subject->update([
                'image'=>'subject_image/'.$fileName,
            ]);
        }

        $toast = array('message' => 'Subject Created Succesfully!');
        return response()->json($toast);
    }
    
    public function edit(UpdateSubjectRequest $request){
        $subject=Subject::find($request->edit_id);
        $subject->update([
            'name'=>$request->edit_name,
            'language_id'=>$request->edit_medium,
            'grade_id'=>$request->edit_grade,
            'description'=>$request->edit_description,
        ]);
        
        if($request->hasFile('edit_image')){
            $file = $request->file('edit_image');
            $fileName = time().$request->name.'.'.$request->edit_image->getClientOriginalExtension();
            $file->move(public_path('storage/subject_image'), $fileName);
            
            # \File::delete(public_path('storage/'.$subject->image));
            $subject->update([
                'image'=>'subject_image/'.$fileName,
            ]);
        }

        $toast = array('message' => 'Subject Updated Succesfully!');
        return response()->json($toast);
    }

    
    public function delete(Request $request)
    {
        $subject=Subject::find($request->delete_id);
        # Storage::delete($subject->image);
        $subject->delete();

        $toast = array('message' => 'Subject Deleted Succesfully!');
        return response()->json($toast);
    }

}
