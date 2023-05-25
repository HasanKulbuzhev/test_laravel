<?php

namespace Database\Factories\Room;

use App\Enums\RoomType;
use App\Models\Apartment\Apartment;
use App\Models\Room\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition()
    {
        return [
            'type' => \Arr::random(RoomType::values()),
            'apartment_id' => Apartment::first()->id
        ];
    }
}
