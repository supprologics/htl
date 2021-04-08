<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonNotesController extends Controller
{
    public function add(Request $request){
        
        $file = $request->file('file_path');
        $fileName = time().$request->name.'.'.$request->file_path->getClientOriginalExtension();
        #$fileName = time().$request->file->getClientOriginalName();
        $file->move(public_path('storage/lesson_notes'), $fileName);

        LessonNote::create([
            'lesson_id'=>$request->lesson_id,
            'name'=>$request->name,
            'file_path'=>'reference_docs/'.$fileName,
        ]);
        
        $toast = array('message' => 'Lesson Attchment Uploaded Succesfully!');
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
