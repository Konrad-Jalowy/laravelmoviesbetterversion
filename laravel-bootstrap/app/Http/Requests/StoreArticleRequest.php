<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|min:5',
            'content' => 'required',
            'lead' => 'required'
        ];
    }

    public function messages(): array
{
    return [
        'title.required' => 'A title is required',
        'content.required' => 'Content is required',
        'lead.required' => 'Lead is required',
        'title.max' => 'Title max length is 255',
        'title.min' => 'Title too short!'
    ];
}
}
