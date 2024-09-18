<?php

namespace App\Services;

use App\Enums\TransactionTypeEnum;
use App\Models\Product;
use App\Models\Transaction;
use App\Services\Filters\TransactionFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

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

    public function index(array $filters): Builder
    {
        return (new TransactionFilter)->run(Transaction::query(), $filters);
    }

    public function getInventories(Carbon $beginDate, Carbon $endDate): Builder
    {
        return Product::query()->with(['transactions' => function(HasMany $query) use($beginDate, $endDate) {
            $query->whereDate('created_at', '>=', $beginDate);
            $query->whereDate('created_at', '<=', $endDate);
            $query->where('type', TransactionTypeEnum::INVENTORY->value);
            $query->latest();
        }]);
//            ->leftJoin('transactions', 'products.id', '=', 'transactions.product_id')
//            ->select('transactions.*', 'avg(case when type == '. (string) TransactionTypeEnum::INCOME->value . ' then price end) as avg_price')
//            ->select( Db::raw('avg(price) as avg_price'))
    }
}
