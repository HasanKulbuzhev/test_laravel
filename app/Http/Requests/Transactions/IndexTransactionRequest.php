<?php

namespace App\Http\Requests\Transactions;

use Illuminate\Foundation\Http\FormRequest;

class IndexTransactionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_id' => ['integer'],
            'type' => ['integer'],
            'begin_date' => ['string', 'date_format:Y-m-d h:i'],
            'end_date' => ['string', 'date_format:Y-m-d h:i'],
        ];
    }
}
