<?php

namespace Modules\Pages\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:191'],
            'content' => ['required', 'string'],
            'is_active' => ['nullable', 'boolean'],
            'meta_keywords' => ['nullable', 'string', 'max:191'],
            'meta_description' => ['nullable', 'string', 'max:191'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function attributes() {
        return [
            'title' => '"Название"',
            'content' => '"Содержимое"',
            'is_active' => '"Статус"',
            'meta_keywords' => '"SEO слова"',
            'meta_description' => '"SEO описание"',
        ];
    }

}
