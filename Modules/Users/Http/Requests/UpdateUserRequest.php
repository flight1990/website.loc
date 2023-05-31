<?php

namespace Modules\Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'max:191', 'unique:users,email,'.$this->id],
            'password' => ['nullable', 'confirmed', 'max:50'],
            'roles' => ['nullable', 'array']
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function attributes() {
        return [
            'name' => '"Имя"',
            'email' => '"Эл. почта"',
            'password' => '"Пароль"',
            'roles' => '"Роль"',
        ];
    }
}
