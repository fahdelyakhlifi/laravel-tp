<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {

        //* Vider la table avant d'insérer de nouvelles données
        Product::truncate();

        //* Utilise ProductFactory.php
        Product::factory()->count(100)->create();

        /*

        * methode de creer un faker produits avec un boucle for
        * sans utiliser ProductFactory.php
         $faker = Faker::create();

         for ($i = 0; $i < 100; $i++) {
            Product::create([
                'title' => $faker->word,
                'price' => $faker->randomFloat(2, 10, 500),
                'description' => $faker->sentence,
                'discount' => $faker->numberBetween(0, 50),
                ]);
            } */
    }
}