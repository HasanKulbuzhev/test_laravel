<?php

namespace App\Enums;

enum TransactionTypeEnum: int
{
    case INCOME = 1;
    case EXPENSE = 2;
    case INVENTORY = 3;

    public static function values(): array
    {
        $values = [];

        foreach (self::cases() as $case) {
            $values[] = $case->value;
        }

        return $values;
    }
}
