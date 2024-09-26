<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Functions\ProjectHelper;
class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Variabie per i vari tipi di tag
        $data = ['WebApp', 'Mobile' ,'App', 'Editor','Template'];
        
        // Eseguire un foreach
        foreach($data as $tag) {
            $new_tag = new Tag();
            $new_tag->name = $tag;
            $new_tag->slug = ProjectHelper::generateSlug($new_tag,Tag::class);
            $new_tag->save();
        }
    }
}
