<?php

namespace App\Http\Requests\ReferenceDoc;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReferanceDocRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'edit_id'=>'required|exists:subject_references_docs,id',
            'edit_name'=>'required|string|max:255',
            'edit_subject_references_type_id'=>'required|exists:subject_references_types,id',
        ];
    }
}
