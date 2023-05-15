<?php

namespace Modules\Menu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMenuRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:191'],
            'url' => ['nullable', 'string', 'max:191'],
            'is_active' => ['nullable', 'boolean'],
            'parent_id' => ['nullable', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
