<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                DB::table('category')->insert([
         ['name' => 'Laptops', 'image_path' => 'assets/img/cat/1.jpg'],
        ['name' => 'Phones', 'image_path' => 'assets/img/cat/2.jpg'],
        ['name' => 'Accessories', 'image_path' => 'assets/img/cat/5.jpg'],
        ]);
    }
}
