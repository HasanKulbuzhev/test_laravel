<?php

namespace App\Http\Requests\Transactions;

use App\Enums\TransactionTypeEnum;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateTransactionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'value' => ['required', 'integer'],
            'type' => ['required', 'integer', Rule::in(TransactionTypeEnum::values()),],
            'product_id' => ['required', 'integer', function ($attribute, $value, $error) {
                if ($this->input('type') === TransactionTypeEnum::EXPENSE->value) {
                    $product = Product::query()->with(['transactions' => function ($query) {
                        $query->latest('id');
                    }])->find($value);
                    if (is_null($product)) {
                        $error('Product not found');
                    }
                    /** @var Transaction $latestTransaction */
                    $latestBalance = $product->transactions->first()->balance ?? 0;
                    if ($latestBalance < $value) {
                        $error('Expense value is greater than balance value');
                    }
                }
            }],
            'price' => ['integer', Rule::requiredIf(function () {
                return $this->input('type') === TransactionTypeEnum::INCOME->value;
            })]
        ];
    }
}
