<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $new_project = new Project();
            $new_project->name = $faker->sentence(4);
            $new_project->slug = Project::generateSlug($new_project->name);
            $new_project->client_name = $faker->sentence(3);
            $new_project->summary = $faker->text();
            //dump($new_project);
            $new_project->save();
        }
    }
}
