<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\SubjectReferencesType;

use App\Http\Requests\ReferenceDoc\CreateReferanceDocRequest;
use App\Http\Requests\ReferenceDoc\UpdateReferanceDocRequest;
use App\Models\SubjectReferencesDoc;
use App\Models\Subject;
use Yajra\DataTables\Facades\DataTables;

class SubjectReferencesDocController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function docindex(Subject $subject)
    {
        return view('dash.admin.referncesdoc.index')
        ->with('subject',$subject)
        ->with('types',SubjectReferencesType::all());
    }

    public function docgetdata(Request $request,$id){
        
        if ($request->ajax()) {
            return Datatables::of(SubjectReferencesDoc::where('subject_id', $id)->get())
            ->editColumn('subject_references_type_id', function ($model) {
                return $model->types ? $model->types->name : '';
            })
            ->addIndexColumn()
            ->setRowId('{{$id}}')
            ->removeColumn('updated_at')
            ->addColumn('download', function ($model) {
                return view('dash.admin.referncesdoc.includes.download', ['model' => $model]); })
            ->addColumn('action', function ($model) {
                return view('dash.admin.referncesdoc.includes.indexactions', ['model' => $model]); })
            ->make(true);
        }

    }

    public function docadd(CreateReferanceDocRequest $request){
        
        $image = $request->file('file_path');
        $imageName = time().$request->name.'.'.$request->file_path->getClientOriginalExtension();
        #$imageName = time().$request->file->getClientOriginalName();
        $image->move(public_path('storage/reference_docs'), $imageName);

        SubjectReferencesDoc::create([
            'name'=>$request->name,
            'subject_id'=>$request->subject_id,
            'subject_references_type_id'=>$request->subject_references_type_id,
            'file_path'=>'reference_docs/'.$imageName,
            'description'=>$request->description,
        ]);
        
        $toast = array('message' => 'References Document Uploaded Succesfully!');
        return response()->json($toast);
    }
    public function docedit(UpdateReferanceDocRequest $request){

        $doc=SubjectReferencesDoc::find($request->edit_id);

        if($request->hasFile('edit_file_path')){
            $edit_file_path=$request->edit_file_path->store('reference_docs');
            Storage::delete($doc->file_path);
            $doc->Update([
                'file_path'=>$request->edit_file_path,
            ]);
        }

        $doc->Update([
            'name'=>$request->edit_name,
            'description'=>$request->edit_description,
            'subject_references_type_id'=>$request->edit_subject_references_type_id,
        ]);
        $toast = array('message' => 'References Document Updated Succesfully!');
        return response()->json($toast);

    }
    public function docdelete(Request $request)
    {
        $doc=SubjectReferencesDoc::find($request->id);
        Storage::delete($doc->file_path);
        $doc->delete();

        $toast = array('message' => 'References Document Deleted Succesfully!');
        return response()->json($toast);
    }
    public function getfile(SubjectReferencesDoc $id){
        return response()->download(public_path('/storage/'. $id->file_path));

    }



}
