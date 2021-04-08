<?php

namespace App\Http\Requests\ReferenceDoc;

use Illuminate\Foundation\Http\FormRequest;

class CreateReferanceDocRequest extends FormRequest
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
            'subject_id'=>'required|exists:subjects,id',
            'name'=>'required|string|max:255|unique:subject_references_docs',
            'subject_references_type_id'=>'required|exists:subject_references_types,id',
            'file_path'=>'required',
        ];
    }
}
