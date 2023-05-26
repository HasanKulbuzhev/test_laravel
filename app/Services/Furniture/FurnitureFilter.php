<?php

namespace App\Services\Furniture;

use App\Models\Furniture\Furniture;
use App\Services\Filters\BaseFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class FurnitureFilter extends BaseFilter
{
    protected $model = Furniture::class;

    protected array $filters = [
        'from_date' => 'fromDate',
        'to_date' => 'toDate',
    ];

    public function fromDate(Builder $builder, string $fromDate): Builder
    {
        return $this->builder->whereHas('rooms', function (Builder $builder) use ($fromDate) {
            $builder->where('from_date', '<', new Carbon($fromDate));
        });
    }

    public function toDate(Builder $builder, string $toDate): Builder
    {
        return $this->builder->whereHas('rooms', function (Builder $builder) use ($toDate) {
            $builder->where('to_date', '>', new Carbon($toDate));
        });
    }
}