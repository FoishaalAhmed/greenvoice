<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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

            'date'=> ['date', 'required'],
            'writer'=> ['string', 'nullable', 'max:255'],
            'content' => 'required|string',
        ];

        if ($this->getMethod() == 'POST') {

            return $rules + [
                'title'    => 'required|string|max:255|unique:blogs,title',
                'slug'    => 'required|string|max:255|unique:blogs,slug',
                'photo'  => 'mimes:jpeg,jpg,png,gif,webp|max:1000|required',
            ];

        } else {

            return $rules + [

                'title'    => 'required|string|max:255|unique:blogs,title,' . $this->blog->id,
                'slug'    => 'required|string|max:255|unique:blogs,slug,' . $this->blog->id,
                'photo'  => 'mimes:jpeg,jpg,png,gif,webp|max:100|nullable',

            ];
        }
    }
}
