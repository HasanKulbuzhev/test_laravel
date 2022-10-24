<?php

namespace Database\Seeders;

use App\Enums\User\UserRole;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createProjects(3);
        $this->createProjects(1, ['username' => 'testProject']);
    }

    private function createProjects(int $int, array $attributes = [])
    {
        User::factory()->count($int)->create(array_merge([
            'role' => UserRole::PROJECT
        ], $attributes))->each(function (User $user) {
            $user->project_id = Project::factory()->for($user, 'projectUser')->createOne()->id;
            $user->save();
        });
    }
}
