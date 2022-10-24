<?php

namespace App\Services\Base;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class BuilderService
{
    protected Builder $builder;
    protected Request $request;
    protected array $filters = [

    ];

    public function __construct(Builder $builder, Request $request)
    {
        $this->builder = $builder;
        $this->request = $request;
    }

    protected function filter()
    {
        /** @var array $filter */
        foreach((array) $this->request->get('filter') as $filter => $value) {
            if (! array_key_exists($filter, $this->filters)) continue;
            $method = data_get($this->filters, $filter);
            $this->builder = $this->$method($value);
        }
    }
}
