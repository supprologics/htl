<?php

namespace App\Http\Requests\ReferenceDocType;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReferenceDocTypeRequest extends FormRequest
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
            'id_edit'=>'required|exists:subject_references_types,id',
            'name_edit'=>'required',
        ];
    }
}
