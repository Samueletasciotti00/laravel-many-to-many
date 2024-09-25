<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Project;
use Symfony\Component\Mailer\Header\TagHeader;

class ProjectTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       for($i = 0; $i < 150; $i++){

        // Estrazione del progetto random
        $project = Project::inRandomOrder()->first();

        // Estrazione del'id 
        $tag_id = Tag::inRandomOrder()->first()->id;

        // Aggiunta della relazione
        $project->tags()->attach($tag_id);
       }
    }
}
