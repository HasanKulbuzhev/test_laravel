<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreQuestionRequest
 * @package App\Http\Requests
 *
 * @property string $name
 * @property string $title
 * @property string $email
 * @property string $message
 */
class StoreQuestionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'min:3', 'max:255'],
            'message' => ['required', 'string', 'min:6', 'max:2000']
        ];
    }
}
