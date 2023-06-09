<?php

namespace Modules\FAQ\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFAQRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'question' => ['required', 'string', 'max:191'],
            'answer' => ['required', 'string'],
            'is_active' => ['nullable', 'boolean']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function attributes() {
        return [
            'question' => '"Вопрос"',
            'answer' => '"Ответ"',
            'is_active' => '"Статус"',
        ];
    }
}
