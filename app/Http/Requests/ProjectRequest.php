<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:100',
            'client_name' => 'required|min:5|max:100',
            'cover_image' => 'image|max:5000',
            'summary' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo obbligatorio.',
            'name.min' => 'Minimo :min caratteri.',
            'name.max' => 'Massimo :max caratteri.',
            'client_name.required' => 'Campo obbligatorio.',
            'client_name.min' => 'Minimo :min caratteri.',
            'client_name.max' => 'Massimo :max caratteri.',
            'cover_image.image' => 'File non valido.',
            'cover_image.max' => 'File troppo grande. Dimensione massima: 5 MB.',
            'summary.required' => 'Campo obbligatorio.',
            'summary.min' => 'Minimo :min caratteri.',
        ];
    }
}
