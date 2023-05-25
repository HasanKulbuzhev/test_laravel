<?php

namespace Database\Factories\Furniture;

use App\Enums\ConfigurationType;
use App\Enums\FurnitureConfigurationType;
use App\Models\Furniture\FurnitureConfiguration;
use Illuminate\Database\Eloquent\Factories\Factory;

class FurnitureConfigurationFactory extends Factory
{
    protected $model = FurnitureConfiguration::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->colorName,
            'type' => FurnitureConfigurationType::COLOR->value,
        ];
    }
}
