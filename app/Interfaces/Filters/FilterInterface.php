<?php

namespace App\Interfaces\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    public function getBuilder(): Builder;

    public function setBuilder(Builder $builder): static;

    public function getFilters(): array;

    public function getValues(): array;

    public function setValues(array $values): static;

    public function run(): Builder;
}