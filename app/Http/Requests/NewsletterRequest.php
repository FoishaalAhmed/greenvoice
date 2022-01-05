<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
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
            'title' => 'required|string|max:255',
        ];

        if ($this->getMethod() == 'POST') {
            return $rules + [
                'file' => 'mimes:pdf,doc,docx|max:5000|required',
            ];
        } else {
            return $rules + [
                'file' => 'mimes:pdf,doc,docx|max:5000|nullable',
            ];
        }
    }
}
