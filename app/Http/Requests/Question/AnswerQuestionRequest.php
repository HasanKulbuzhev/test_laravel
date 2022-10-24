<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AnswerQuestionRequest
 * @package App\Http\Requests\Question
 * @property string $answer
 */
class AnswerQuestionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'answer' => ['required', 'string', 'min:6', 'max:2000']
        ];
    }
}
