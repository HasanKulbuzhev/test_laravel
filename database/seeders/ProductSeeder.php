<?php

namespace Database\Seeders;

use App\Models\CarModel;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarModel::query()->get()->each(function (CarModel $carModel){
            Product::factory()->count(2)->for($carModel)->create();
        });
    }
}
