<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'director' => 'required',
            'review' => 'required',
            'date_of_publishing' => 'required',
            'movie_length' => 'required',
            'category' => 'required',
            'grade' => 'required'
        ];
    }

    public function messages(): array
{
    return [
        'title.required' => 'Title is required',
        'date_of_publishing.required' => 'Date is required',
        'review.required' => 'Review is required',
        'movie_length' => 'Length is required',
        'category.required' => 'Category is required',
        'grade.required' => 'Grade is required',
        'title.max' => 'Title max length is 255',
        'title.min' => 'Title too short!'
    ];
}
}
