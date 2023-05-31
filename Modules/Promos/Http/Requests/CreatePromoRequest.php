<?php

namespace Modules\Promos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePromoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:191'],
            'url' => ['nullable', 'string', 'max:191'],
            'file' => ['required', 'image', 'mimes:jpg'],
            'content' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function attributes() {
        return [
            'title' => '"Название"',
            'url' => '"Ссылка"',
            'file' => '"Изображение"',
            'content' => '"Содержимое"',
            'is_active' => '"Статус"',
        ];
    }
}
