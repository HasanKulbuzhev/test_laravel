<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transactions\CreateTransactionRequest;
use App\Http\Requests\Transactions\IndexTransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Product;
use App\Models\Transaction;
use App\Services\TransactionService;

/**
 *
 */
class TransactionController extends Controller
{
    public function __construct(
        private TransactionService $transactionService
    )
    {
    }

    public function index(IndexTransactionRequest $request)
    {
        $builder = $this->transactionService->index($request->validated());
        return TransactionResource::collection($builder->paginate());
    }

    public function create(CreateTransactionRequest $request)
    {
        $transaction = $this->transactionService->create($request->validated());

        return new TransactionResource($transaction);
    }
}
