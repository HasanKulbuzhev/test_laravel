<?php

namespace App\Http\Requests;

class UpdateQuestionRequest extends StoreQuestionRequest
{

    public function rules(): array
    {
        return array_merge(parent::rules(), [

        ]);
    }
}
