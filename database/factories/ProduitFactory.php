<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->text(20),
            'description'=>fake()->text(100),
            'price'=>fake()->randomFloat(2,0.5,10000),
            'stock'=>fake()->numberBetween(0,100),
            'categorie_id'=>Categorie::inRandomOrder()->first()->id,
        ];
    }
}
