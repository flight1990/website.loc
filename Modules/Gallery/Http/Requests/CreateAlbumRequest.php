<?php

namespace Modules\Gallery\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAlbumRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:191'],
            'description' => ['nullable', 'string'],
            'photos' => ['nullable', 'array', 'max:4'],
            'photos.*' => ['nullable', 'mimes:jpeg,jpg,png']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
