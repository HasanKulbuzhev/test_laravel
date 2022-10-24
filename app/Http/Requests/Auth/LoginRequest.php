<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginRequest
 * @package App\Http\Requests\Auth
 *
 * @property string $username
 * @property string $password
 */
class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'min:3', 'max:100', 'exists:users,username'],
            'password' => ['required', 'string', 'min:6']
        ];
    }
}
