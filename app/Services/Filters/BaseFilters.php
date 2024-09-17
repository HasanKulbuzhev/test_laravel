<?php

namespace App\Services\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class BaseFilters
{
    protected Builder $builder;

    public function run(Builder $builder, array $filters)
    {
        $this->builder = $builder;

        foreach ($filters as $key => $value) {
            if ($method = $this->getFilterMethods()[$key]) {
                $this->$method($value);
            }
        }
        return $this->builder;
    }

    abstract protected function getFilterMethods(): array;

}
