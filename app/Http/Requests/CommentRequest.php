<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'author' => "bail|required|string|max:255",
            'content' => 'required',
            'post_id' => 'required|exists:post,id'
        ];
    }

    protected function prepareForValidation(): void
    {
        // If the route provided a Post via route-model binding, merge its id into the data
        if ($this->route('post')) {
            $this->merge(['post_id' => $this->route('post')->id]);
        }
    }

    public function messages()
    {
        return [
            'author.required' => 'Field is required',
            'content.required' => 'Field is required',
            'post_id.required' => 'Field is required',
        ];
    }
}
