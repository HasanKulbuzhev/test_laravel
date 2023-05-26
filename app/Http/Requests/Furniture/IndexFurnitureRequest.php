<?php

namespace App\Http\Requests\Furniture;

use Illuminate\Foundation\Http\FormRequest;

class IndexFurnitureRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'search' => ['array'],
        ];
    }
}