<?php

namespace App\Http\Requests\AdminRole;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequestStore extends FormRequest
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

            'name' => 'required',
            'title'=> 'required',
            'text'=> 'required',
            'time'=> 'required',

        ];
    }
}
