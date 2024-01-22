<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\contacts>
 */
class ContactsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->text(10),
            'last_name' =>$this->faker->text(10),
            'email' => fake()->unique()->safeEmail(),
            'phone' => (string) $this->faker->numberBetween(1000000000, 9999999999),
            'message' => $this->faker->text(50),
            'agree' =>$this->faker->numberBetween($min = 0, $max = 1),
        ];
    }
}
