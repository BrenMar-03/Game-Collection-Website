<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGameRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'platform' => 'required|string|max:100',
            'genre' => 'nullable|string|max:100',
            'release_year' => 'nullable|integer|min:1900|max:2030',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}