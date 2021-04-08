<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Section;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Section\CreateSectionRequest;
use App\Http\Requests\Section\UpdateSectionRequest;

class SectionController extends Controller
{

    public function index(Subject $subject){
        return view('dash.admin.section.index')
        ->with('subject',$subject);
    }

    public function getdata(Request $request,$id){
        if ($request->ajax()) {
            return Datatables::of(Section::where('subject_id', $id)->get())
            ->addIndexColumn()
            ->setRowId('{{$id}}')
            ->addColumn('action', function ($model) {
                return view('dash.admin.section.includes.actions', ['model' => $model]); })
            ->make(true);
        }
    }

    public function add(CreateSectionRequest $request){
        $section=Section::create([
            'subject_id'=>$request->subject_id,
            'name'=>$request->name,
            'description'=>$request->description,
            'section_no'=>$request->section_no,
        ]);
        $toast = array('message' => 'Subject Section Created Succesfully!');
        return response()->json($toast);
    }

    public function edit(UpdateSectionRequest $request){
        Section::where('id', $request->edit_id)->update([
            'name' => $request->edit_name,
            'description' => $request->edit_description,
            'section_no'=>$request->edit_section_no,
        ]);
        $toast = array('message' => 'Subject Section Updated Succesfully!');
        return response()->json($toast);
    }
    
    public function delete(Request $request)
    {
        Section::where('id', $request->id_delete)->delete();
        
        $toast = array('message' => 'Subject Section Deleted Succesfully!');
        return response()->json($toast);
    }
}
