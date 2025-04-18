<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'admin123',
            'cpf' => '00000000000',
            'tel' => '99999999999'
        ]);

        $this->call([
            CategoriesSeeder::class,
            ProductsSeeder::class,
            CouponsSeeder::class,
            RemindersSeeder::class
        ]);
    }
}
