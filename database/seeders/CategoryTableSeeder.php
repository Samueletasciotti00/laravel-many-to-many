<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Foreach_;
use App\Models\Category;
use App\Functions\ProjectHelper;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['JAVA', 'JAVASCRIPT', 'TYPESCRIPT', 'C#', 'PYTON'];

        foreach($data as $category){
            $new_category = new Category();
            $new_category->name = $category;
            $new_category->slug = ProjectHelper::generateSlug($new_category->name, Category::class);
            $new_category->save();
        }
    }
}
