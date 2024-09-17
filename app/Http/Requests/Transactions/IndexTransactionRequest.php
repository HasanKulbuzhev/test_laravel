<?php

namespace App\Http\Requests\Transactions\Transactions;

class IndexTransactionRequest
{
    public function rules(): array
    {
        return [
            'product_id' => ['integer'],
        ];
    }
}
