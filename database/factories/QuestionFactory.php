<?php

namespace Database\Factories;

use App\Enums\Question\Status;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'first_name' => $this->faker->name,
            'email' => $this->faker->email,
            'status' => Status::ACTIVE,
            'message' => $this->faker->text,
        ];
    }
}
