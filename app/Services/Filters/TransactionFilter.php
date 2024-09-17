<?php

namespace App\Services\Filters;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class TransactionFilter extends BaseFilters
{

    protected function getFilterMethods(): array
    {
        return [
            'product_id' => 'productId',
            'type' => 'type',
            'begin_date' => 'beginDate',
            'end_date' => 'endDate',
        ];
    }

    public function productId(int $productId): Builder
    {
        return $this->builder->where('product_id', $productId);
    }

    public function type(int $type): Builder
    {
        return $this->builder->where('type', $type);
    }

    public function beginDate(string $date): Builder
    {
        $beginDate = Carbon::createFromFormat('Y-m-d h:i', $date);
        return $this->builder->whereDate('created_at', '>=', $beginDate);
    }

    public function endDate(string $date): Builder
    {
        $endDate = Carbon::createFromFormat('Y-m-d h:i', $date);
        return $this->builder->whereDate('created_at', '<=', $endDate);
    }
}
