<?php

namespace App\Http\Requests\Section;

use Illuminate\Foundation\Http\FormRequest;

class CreateSectionRequest extends FormRequest
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
            'name'=>'required',
            'section_no'=>'required',
        ];
    }
}
