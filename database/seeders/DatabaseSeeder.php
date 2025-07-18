<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // إنشاء مستخدم يدوي
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123') // لازم تعمل هاش للباسورد
        ]);

        // تقدر كمان تشغل Seeders تانية لو عاوز:
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
