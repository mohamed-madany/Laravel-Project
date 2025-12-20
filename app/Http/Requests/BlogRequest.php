<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'title' => "bail|required|unique:post,title,{$this->input('id')}",
            'author' => 'required',
            'body' => 'required',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Field is required',
            'author.required' => 'Field is required',
            'body.required' => 'Field is required',
        ];
    }
}
