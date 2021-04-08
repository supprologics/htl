<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReferenceDocType\CreateReferenceDocTypeRequest;
use App\Http\Requests\ReferenceDocType\UpdateReferenceDocTypeRequest;
use App\Models\SubjectReferencesType;
use Yajra\DataTables\Facades\DataTables;

class SubjectReferencesTypeController extends Controller
{


    public function typeindex(){
        return view('dash.admin.referncesdoctype.typeindex');
    }

    public function typegetdata(Request $request){
        
        if ($request->ajax()) {
            return Datatables::of(SubjectReferencesType::where('flag', 1)->get())
            ->addIndexColumn()
            ->setRowId('{{$id}}')
            ->removeColumn('updated_at')
            ->addColumn('action', function ($model) {
                return view('dash.admin.referncesdoctype.includes.actions', ['model' => $model]); })
            ->make(true);
        }
    }


    public function typeadd(CreateReferenceDocTypeRequest $request){
        SubjectReferencesType::create([
            'name'=>$request->name,
            'flag'=>'1',
        ]);
        
        $toast = array('message' => 'References Type Created Succesfully!');
        return response()->json($toast);
    }
    
    public function typeedit(UpdateReferenceDocTypeRequest $request){
        SubjectReferencesType::where('id', $request->id_edit)->update([
            'name' => $request->name_edit
        ]);
        
        $toast = array('message' => 'References Type Updated Succesfully!');
        return response()->json($toast);
    }
    
    public function typedelete(Request $request)
    {
        SubjectReferencesType::where('id', $request->id)->delete();
        
        $toast = array('message' => 'References Type Deleted Succesfully!');
        return response()->json($toast);
    }
}
