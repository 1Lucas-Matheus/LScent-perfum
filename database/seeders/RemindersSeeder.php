<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RemindersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reminders')->insert([
            ['reminder' => 'Pagamento futuro', 'date' => '2025/02/20'],
            ['reminder' => 'Promoção dia das mães', 'date' => '2026/04/19'],
        ]);
    }
}
