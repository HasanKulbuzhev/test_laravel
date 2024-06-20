<?php

namespace App\Services;

class TransactionReport
{
    public function calculateAmount(array $data): int
    {
        $sum = 0;
        /** @var array $transaction */
        foreach ($data as $transaction) {
            if (
                !$transaction['is_adding'] &&
                ($transaction['balance'] - $transaction['amount']) + 2000 <= 0
            ) {
                $sum += $transaction['amount'] - $transaction['balance'];
            }
        }

        return $sum;
    }
}
