<?php

namespace App\Services;

class TransactionReport
{
    public function calculateAmount(array $data)
    {
        $summ = 0;
        /** @var array $transaction */
        foreach ($data as $transaction) {
            if (
                $transaction['balance'] - $transaction['amount'] &&
                $transaction['balance'] <= 2000 &&
                !$transaction['is_adding']
            ) {

            }
        }
    }
}
