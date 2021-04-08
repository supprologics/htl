<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectReferencesType extends Model
{
    protected $fillable = [
        'name','flag',
    ];

    
    public function ref_docs(){
        return $this->hasMany(SubjectReferencesDoc::class);
    }
}
