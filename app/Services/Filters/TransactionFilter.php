<?php

namespace App\Services\Filters;

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

    public function beginDate(int $type): Builder
    {
        return $this->builder->where('type', $type);
    }
}
