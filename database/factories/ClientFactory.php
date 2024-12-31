<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "firstName"=>fake()->firstName(),
            "lastName"=>fake()->lastName(),
            "phone"=>fake()->phoneNumber(),
            "city"=>fake()->randomElement(["Agadir","Safi","Rabat","Casa"]),
            "birthDay"=>fake()->date(),

        ];
    }
}
