<?php

namespace Database\Seeders\Apartment;

use App\Models\Apartment\Apartment;
use App\Models\House\House;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $houses = House::query()->get();
        /** @var House $house */
        foreach ($houses as $house) {
            Apartment::factory(100)->create([
                'house_id' => $house->id
        ]);
        }
    }
}
