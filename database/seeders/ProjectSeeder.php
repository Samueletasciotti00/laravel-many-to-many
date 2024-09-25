<?php

namespace Database\Seeders;

// Import del Model ['Project'];
use App\Models\Project;

// Use del Faker per generare dati fittizzi;
use Faker\Generator as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Import dell Helper;
use App\Functions\ProjectHelper;

use App\Models\Category;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 100; $i++) {

            $new_project = new Project();
            $new_project->title = $faker->sentence();
            $new_project->category_id = Category::inRandomOrder()->first()->id;
            $new_project->slug = ProjectHelper::generateSlug($new_project->title, Project::class);
            $new_project->description = $faker->text(100);
            $new_project->save();
        }
    }
}
