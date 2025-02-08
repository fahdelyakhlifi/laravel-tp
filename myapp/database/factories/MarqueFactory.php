<?php

namespace Database\Factories;
use App\Models\Marque;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marque>
 */
class MarqueFactory extends Factory
{
    protected $model = Marque::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker->unique()->name(),
            'desc'=>$this->faker->sentence(),    // faker() = $this->faker
        ];
    }
}
