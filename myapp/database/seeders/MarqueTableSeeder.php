<?php

namespace Database\Seeders;

use App\Models\Marque;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class MarqueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Marque::factory()->count(500)->create();
    }
}
