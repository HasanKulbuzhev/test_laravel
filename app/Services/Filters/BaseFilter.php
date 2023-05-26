<?php

namespace App\Services\Filters;

use App\Interfaces\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

abstract class BaseFilter implements FilterInterface
{
    protected $model;
    protected Builder $builder;
    protected array $filters = [];
    protected array $values = [];

    public function __construct()
    {
        $this->builder = $this->model::query();
    }

    public function getBuilder(): Builder
    {
        return $this->builder;
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function getValues(): array
    {
        return $this->values;
    }

    public function setValues(array $values): static
    {
        $this->values = $values;

        return $this;
    }

    public function setBuilder(Builder $builder): static
    {
        $this->builder = $builder;

        return $this;
    }

    public function run(): Builder
    {
        $builder = $this->getBuilder();

        foreach ($this->getValues() as $key => $value) {
            $method = Arr::get($this->filters, $key, '');

            if (method_exists($this, $method)) {
                $this->$method($builder, $value);
            }
        }

        return $builder;
    }
}