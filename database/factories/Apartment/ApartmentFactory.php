<?php

namespace Database\Factories\Apartment;

use App\Models\Apartment\Apartment;
use App\Models\House\House;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApartmentFactory extends Factory
{
    protected $model = Apartment::class;

    public function definition(): array
    {
        return [
            'house_id' => House::query()->first()->id,
        ];
    }
}
