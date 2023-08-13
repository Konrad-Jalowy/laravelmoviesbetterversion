<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class StoreActorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return Auth::user()->is_admin === 1 || Auth::user()->is_reviever === 1 || Auth::user()->is_moderator === 1;
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
