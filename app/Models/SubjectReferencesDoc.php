<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectReferencesDoc extends Model
{
    protected $fillable = [
        'name','subject_id','subject_references_type_id',
        'file_path','description',
    ];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function types(){
        return $this->belongsTo(SubjectReferencesType::class,'subject_references_type_id');
    }
}
