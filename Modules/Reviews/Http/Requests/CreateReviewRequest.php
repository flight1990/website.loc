<?php

namespace Modules\Reviews\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReviewRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:191'],
            'content' => ['required', 'string'],
            'is_active' => ['nullable', 'boolean'],
            'client' => ['required', 'string', 'max:191']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function attributes() {
        return [
            'title' => '"Заголовок"',
            'content' => '"Отзыв"',
            'is_active' => '"Статус"',
            'client' => '"Имя"',
        ];
    }
}
