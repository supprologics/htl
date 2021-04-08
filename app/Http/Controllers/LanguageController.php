<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Language\CreateLanguageRequest;
use App\Http\Requests\Language\UpdateLanguageRequest;
use App\Models\Language;
use Yajra\DataTables\Facades\DataTables;

class LanguageController extends Controller
{

    public function index(){
        return view('dash.admin.medium.index');
    }

    public function getdata(Request $request){
        
        if ($request->ajax()) {
            return Datatables::of(Language::where('flag', 1)->get())
            ->addIndexColumn()
            ->setRowId('{{$id}}')
            ->removeColumn('updated_at')
            ->addColumn('action', function ($model) {
                return view('dash.admin.medium.includes.actions', ['model' => $model]); })
            ->make(true);
        }
    }

    
    public function add(CreateLanguageRequest $request){
        $grade=Language::create([
            'name'=>$request->name,
            'grade_in_lang'=>$request->grade_in_lang,
            'flag'=>'1',
        ]);
        $toast = array('message' => 'Medium Created Succesfully!');
        return response()->json($toast);
    }

    
    public function edit(UpdateLanguageRequest $request){
        Language::where('id', $request->id)->update([
            'name' => $request->name,
            'grade_in_lang'=>$request->grade_in_lang,
        ]);
        $toast = array('message' => 'Medium Updated Succesfully!');
        return response()->json($toast);
    }

    
    public function delete(Request $request)
    {
        $medium=Language::find($request->id);
        if($medium->subjects->count() >0 ){
            $toast = array('message' => 'Medium has subject. Delete related subjects first !');
            return response()->json($toast);
        }
        if($medium->students->count() >0 ){
            $mediumusers=StudentHasLanguages::where('language_id',$request->id)->get();
            foreach($mediumusers as $mediumuser){
                $mediumuser->delete();
            }
        }
        Language::where('id', $request->id)->delete();
        
        $toast = array('message' => 'Medium Deleted Succesfully!');
        return response()->json($toast);
    }
}
