<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coupons')->insert([
            ['value' => 10, 'key' => '1'],
            ['value' => 20, 'key' => '2'],
            ['value' => 30, 'key' => '3'],
            ['value' => 40, 'key' => '4'],
            ['value' => 50, 'key' => '5']
        ]);
    }
}
