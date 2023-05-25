<?php

namespace Database\Seeders\Room;

use App\Models\Apartment\Apartment;
use App\Models\Room\Room;
use Illuminate\Database\Seeder;

class RoomSeed extends Seeder
{
    public function run()
    {
        $apartments = Apartment::query()->get();

        foreach ($apartments as $apartment) {
            Room::factory(10)->create([
                'apartment_id' => $apartment->id
            ]);
        }
    }
}
