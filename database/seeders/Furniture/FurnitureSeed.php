<?php

namespace Database\Seeders\Furniture;

use App\Models\Furniture\Furniture;
use App\Models\Room\Room;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FurnitureSeed extends Seeder
{
    public function run()
    {
        $rooms = Room::query()->get();
        /** @var Room $room */
        foreach ($rooms as $room) {
            $fromMinutes = rand(1, 1000);

            Furniture::factory(10)->hasAttached($room, [
                'from_date' => Carbon::now()->subMinutes($fromMinutes),
                'to_date' => Carbon::now()->subMinutes($fromMinutes + rand(1, 10000)),
            ])->create();
        }
    }
}
