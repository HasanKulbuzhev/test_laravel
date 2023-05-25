<?php

namespace Database\Seeders\Furniture;

use App\Models\Furniture\Furniture;
use App\Models\Furniture\FurnitureConfiguration;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class FurnitureConfigurationSeed extends Seeder
{
    public function run()
    {
        Furniture::query()->chunk(300, function (Collection $furnitures) {
            /** @var Furniture $furniture */
            foreach ($furnitures as $furniture) {
                FurnitureConfiguration::factory()->count(1)->hasAttached($furniture)->create();
            }
        });
    }
}
