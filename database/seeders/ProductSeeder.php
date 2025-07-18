<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  DB::table('products')->insert([
    [
        
        'name' => 'iphone ',
        'price' => 1899.99,
        'quantity' => 5,
        'image_path' => 'assets/img/products/4.jpg',
        'category_id' => 2,
       
    ],
    [
        'name' => 'iPhone 12 Pro',
        'price' => 999.99,
        'quantity' => 10,
        'image_path' => 'assets/img/products/3.jpg',
        'category_id' => 2,
       
    ],
      [
        
        'name' => 'MacBook Pro M3',
        'price' => 1899.99,
        'quantity' => 5,
        'image_path' => 'assets/img/products/12.jpg',
        'category_id' => 1,
       
    ],
    [
        'name' => 'iPhone 13 Pro',
        'price' => 999.99,
        'quantity' => 10,
        'image_path' => 'assets/img/products/2.jpg',
        'category_id' => 2,
       
    ], 
     [
        
        'name' => 'كاميرا web',
        'price' => 200,
        'quantity' => 5,
        'image_path' => 'assets/img/products/7.jpg',
        'category_id' => 3,
       
    ],
    [
        'name' => 'iPhone 14 Pro',
        'price' => 999.99,
        'quantity' => 10,
        'image_path' => 'assets/img/products/3.jpg',
        'category_id' => 2,
       
    ],
       [
        'name' => 'مجموعة كاملة',
        'price' => 999.99,
        'quantity' => 10,
        'image_path' => 'assets/img/products/5.jpg',
        'category_id' => 3,
       
    ], 
    [
        'name' => 'جيراب هاتف',
        'price' => 100,
        'quantity' => 10,
        'image_path' => 'assets/img/products/1.jpg',
        'category_id' => 3,
       
    ],
        [
        'name' => 'ساعة هاتف',
        'price' => 450,
        'quantity' => 10,
        'image_path' => 'assets/img/products/10.jpg',
        'category_id' => 3,
       
    ],
]);

    }
}
