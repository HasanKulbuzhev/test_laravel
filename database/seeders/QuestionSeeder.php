<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::query()->each(function (Project $project) {
            Question::factory()->count(10)->for($project)->create();
        });
    }
}
