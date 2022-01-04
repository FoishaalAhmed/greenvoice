<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
    { {
            $rules = [

                'photo'  => 'mimes:jpeg,jpg,png,gif,webp|max:1000|nullable',
                'detail' => 'required|string',
            ];

            if ($this->getMethod() == 'POST') {

                return $rules + [

                    'title'    => 'required|string|max:255|unique:projects,title',
                    'slug'    => 'required|string|max:255|unique:projects,slug',

                ];
            } else {

                return $rules + [

                    'title'    => 'required|string|max:255|unique:projects,title,' . $this->project->id,
                    'slug'    => 'required|string|max:255|unique:projects,slug,' . $this->project->id,

                ];
            }
        }
    }
}
