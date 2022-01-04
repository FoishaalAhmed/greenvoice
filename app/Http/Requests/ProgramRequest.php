<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
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
        $rules = [

            'photo'  => 'mimes:jpeg,jpg,png,gif,webp|max:1000|nullable',
            'detail' => 'required|string',
        ];

        if ($this->getMethod() == 'POST') {

            return $rules + [

                'title'    => 'required|string|max:255|unique:programs,title',
                'slug'    => 'required|string|max:255|unique:programs,slug',

            ];
        } else {

            return $rules + [

                'title'    => 'required|string|max:255|unique:programs,title,' . $this->program->id,
                'slug'    => 'required|string|max:255|unique:programs,slug,' . $this->program->id,

            ];
        }
    }
}
