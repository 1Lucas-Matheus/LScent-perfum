<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'Malbec X', 'quantity' => 10, 'price' => 299.99, 'category_id' => 1, 'promo' => 0],
            ['name' => 'Luna', 'quantity' => 10, 'price' => 299.99, 'category_id' => 1, 'promo' => 0],
            ['name' => 'Malbec Flame', 'quantity' => 10, 'price' => 299.99, 'category_id' => 1, 'promo' => 0],
            ['name' => 'Ilia', 'quantity' => 10, 'price' => 299.99, 'category_id' => 1, 'promo' => 0],
            ['name' => 'Homen essence', 'quantity' => 10, 'price' => 299.99, 'category_id' => 1, 'promo' => 0]
        ]);
    }
}
