<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            Product::create([
                'title' => $faker->word,
                'price' => $faker->randomFloat(2, 10, 500),
                'description' => $faker->sentence,
                'discount' => $faker->numberBetween(0, 50),
            ]);
        }
    }
}