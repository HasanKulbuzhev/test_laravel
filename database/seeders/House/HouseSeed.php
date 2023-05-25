<?php

namespace Database\Seeders\House;

use App\Models\House\House;
use Illuminate\Database\Seeder;

class HouseSeed extends Seeder
{
    public function run()
    {
        House::factory(2)->create();
    }
}
