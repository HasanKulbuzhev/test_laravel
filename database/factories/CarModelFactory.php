<?php

namespace Database\Factories;

use App\Models\CarModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarModelFactory extends Factory
{
    protected $model = CarModel::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'engine_type' => array_rand(array_keys(CarModel::TYPES_ENGINE)),
            'drive_type' => array_rand(array_keys(CarModel::TYPES_DRIVE)),
        ];
    }
}
