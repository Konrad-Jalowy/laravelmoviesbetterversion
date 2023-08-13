<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreDelayedArticle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->is_admin === 1 || Auth::user()->is_reviever === 1 || Auth::user()->is_moderator === 1;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:255|min:5',
            'content' => 'required',
            'lead' => 'required',
            'publish_date' => 'required'
        ];
    }

    public function messages(): array
{
    return [
        'title.required' => 'A title is required',
        'content.required' => 'Content is required',
        'lead.required' => 'Lead is required',
        'title.max' => 'Title max length is 255',
        'title.min' => 'Title too short!',
        'publish_date.required' => 'Publish date is required!'
    ];
}
}
