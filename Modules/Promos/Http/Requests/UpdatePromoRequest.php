<?php

namespace Modules\Promos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePromoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:191'],
            'url' => ['nullable', 'string', 'max:191'],
            'img' => ['nullable', 'image', 'mimes:jpg'],
            'content' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
