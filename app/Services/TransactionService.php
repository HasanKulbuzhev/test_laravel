<?php

namespace App\Services;

use App\Enums\TransactionTypeEnum;
use App\Models\Product;
use App\Models\Transaction;
use App\Services\Filters\TransactionFilter;
use Illuminate\Database\Eloquent\Builder;

class TransactionService
{
    public function create(array $data): Transaction
    {
        $product = Product::query()->find($data['product_id']);
        $otherTransaction = $product->transactions()->latest()->first();
        $transaction = new Transaction($data);
        $balance = $otherTransaction ? $otherTransaction->balance : 0;
        switch ($transaction->type) {
            case TransactionTypeEnum::INCOME->value:
                $balance += $transaction->value;
                break;
            case TransactionTypeEnum::EXPENSE->value:
                $balance -= $transaction->value;
                break;
            case TransactionTypeEnum::INVENTORY->value:
                $transaction->inventory_error = $transaction->value - $balance;
                $balance = $transaction->value;
                break;
        }
        $transaction->balance = $balance;
        $transaction->save();

        return $transaction;
    }

    public function index(array $filters)
    {
        TransactionFilter::run(Transaction::query(), $filters);
    }
}
