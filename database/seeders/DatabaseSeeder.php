<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Scrivere per primo il Seeder delle categories dato che [ ProjectSeeder ] è in relazione con [ CategoryTableSeeder ];

        $this->call([
            
            // Seeder data categorie;
            CategoryTableSeeder::class,

            // Seeder data progetti;
            ProjectSeeder::class

        ]);
    }
}
