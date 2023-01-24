<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['HTML', 'CSS', 'JavaScript', 'VUE', 'Laravel', 'PHP', 'Full-Stack'];

        foreach ($types as $item) {
            $new_type = new Type();
            $new_type->name = $item;
            $new_type->slug = Str::slug($new_type->name);
            //dump($new_type);
            $new_type->save();
        }
    }
}
