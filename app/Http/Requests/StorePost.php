<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'bail|required|min:5|max:10',
            'content' =>'required|min:10'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'title.min' => 'The title must be at least 5 characters.',
            'title.max' => 'The title may not be greater than 10 characters.',
            'content.required' => 'The content field is required.',
            'content.min' => 'The content must be at least 10 characters.'
        ];
    }
}
