<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Grade\CreateGradeRquest;
use App\Http\Requests\Grade\UpdateGradeRquest;
use App\Models\Grade;
use App\Models\StudentHasGrades;
use Yajra\DataTables\Facades\DataTables;

class GradeController extends Controller
{

    public function index(){
        return view('dash.admin.grade.index');
    }

    public function getdata(Request $request){
        if ($request->ajax()) {
            return Datatables::of(Grade::where('flag', 1)->get())
            ->addIndexColumn()
            ->setRowId('{{$id}}')
            ->removeColumn('updated_at')
            ->addColumn('action', function ($model) {
                return view('dash.admin.grade.includes.actions', ['model' => $model]); })
            ->make(true);
        }
    }

    public function add(CreateGradeRquest $request){
        $grade=Grade::create([
            'name'=>$request->name,
            'value'=>$request->value,
            'flag'=>'1',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().$request->name.'.'.$request->image->getClientOriginalExtension();
            $file->move(public_path('storage/grade_image'), $fileName);

            $grade->update([
                'image'=>'grade_image/'.$fileName,
            ]);
        }
        $toast = array('message' => 'Grade Created Succesfully!');
        return response()->json($toast);
    }

    
    public function edit(UpdateGradeRquest $request){
        $grade=Grade::find($request->edit_id);
        $grade->update([
            'name' => $request->edit_name,
            'value' => $request->edit_value,
        ]);
        if($request->hasFile('edit_image')){
            $file = $request->file('edit_image');
            $fileName = time().$request->edit_name.'.'.$request->edit_image->getClientOriginalExtension();
            $file->move(public_path('storage/grade_image'), $fileName);
            
            # \File::delete(public_path('storage/'.$grade->image));
            $grade->update([
                'image'=>'grade_image/'.$fileName,
            ]);
        }
        $toast = array('message' => 'Grade Updated Succesfully!');
        return response()->json($toast);
    }

    
    public function delete(Request $request)
    {
        $grade=Grade::find($request->id);
        if($grade->subjects->count() >0 ){
            $toast = array('message' => 'Grade has subject. Delete related subjects first !');
            return response()->json($toast);
        }
        if($grade->students->count() >0 ){
            $gradeusers=StudentHasGrades::where('grade_id',$request->id)->get();
            foreach($gradeusers as $gradeuser){
                $gradeuser->delete();
            }
        }
        Grade::where('id', $request->id)->delete();

        $toast = array('message' => 'Grade Deleted Succesfully!');
        return response()->json($toast);
    }
}