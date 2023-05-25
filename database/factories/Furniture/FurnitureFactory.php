<?php

namespace Database\Factories\Furniture;

use App\Enums\RoomType;
use App\Models\Furniture\Furniture;
use Illuminate\Database\Eloquent\Factories\Factory;

class FurnitureFactory extends Factory
{
    protected $model = Furniture::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'type' => \Arr::random(RoomType::values())
        ];
    }
}
