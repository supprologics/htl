<?php

namespace App\Http\Requests\Lesson;

use Illuminate\Foundation\Http\FormRequest;

class AttachmentUpdateRequest extends FormRequest
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
            'attch_lesson_id'=>'required|exists:lessons,id',
            'lesson_attch_name'=>'required|string|max:255',
            'lesson_attach_file_path'=>'required',
        ];
    }
}
