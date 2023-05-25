<?php

namespace Database\Seeders;

use App\Models\House\House;
use App\Models\Room\Room;
use Database\Seeders\Apartment\ApartmentSeeder;
use Database\Seeders\Furniture\FurnitureConfigurationSeed;
use Database\Seeders\Furniture\FurnitureSeed;
use Database\Seeders\House\HouseSeed;
use Database\Seeders\Room\RoomSeed;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            HouseSeed::class,
            ApartmentSeeder::class,
            RoomSeed::class,
            FurnitureSeed::class,
            FurnitureConfigurationSeed::class,
        ]);
    }
}
