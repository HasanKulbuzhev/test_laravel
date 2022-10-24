<?php

namespace Database\Seeders;

use App\Enums\User\UserRole;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::query()->each(function (Project $project) {
            User::factory()->count(10)->for($project)->create();
        });

        $adminExists = User::query()->where('role', UserRole::ADMIN)->exists();

        if (! $adminExists) {
            User::factory()->createOne([
                'role' => UserRole::ADMIN,
                'username' => 'Hasan'
            ]);
        }
    }
}
