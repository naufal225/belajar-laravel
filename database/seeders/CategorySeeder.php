<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("categories")->insert([
            "name" => "Programming",
            "slug" => "programming"
        ]);
        
        DB::table("categories")->insert([
            "name" => "Web Design",
            "slug" => "web-design"
        ]);

        DB::table("categories")->insert([
            "name" => "Computer",
            "slug" => "computer"
        ]);

        DB::table("categories")->insert([
            "name" => "Science",
            "slug" => "science"
        ]);
    }
}
