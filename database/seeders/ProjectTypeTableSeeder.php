<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::all();

        foreach ($projects as $project) {

            //estraggo id random di un type e lo assegno al progetto
            $type_id = Type::inRandomOrder()->first()->id;
            $project->type_id = $type_id;
            $project->update();
        }
    }
}
