<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Question;
use App\Models\User;
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
        $this->call(ProjectSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(QuestionSeeder::class);
    }
}
