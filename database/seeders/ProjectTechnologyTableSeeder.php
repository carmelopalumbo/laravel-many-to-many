<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i < 100; $i++) {

            //progetto random
            $project = Project::inRandomOrder()->first();

            //id tecnologia random
            $technology_id = Technology::inRandomOrder()->first();

            //metoto attach per inserire relazione nella pivot
            $project->technologies()->attach($technology_id);
        }
    }
}
