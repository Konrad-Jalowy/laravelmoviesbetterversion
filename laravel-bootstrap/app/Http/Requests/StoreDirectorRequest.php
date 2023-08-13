<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDirectorRequest extends FormRequest
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
            'name' => 'required|max:255|min:5',
            'date_of_birth' => 'required',
            'bio' => 'required'
        ];
    }

    public function messages(): array
{
    return [
        'name.required' => 'Name is required',
        'date_of_birth.required' => 'Date of birth is required',
        'bio.required' => 'Bio is required',
        'name.max' => 'Name max length is 255',
        'name.min' => 'Name too short!'
    ];
}
}
