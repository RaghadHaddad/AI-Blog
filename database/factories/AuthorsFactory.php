<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Authors>
 */
class AuthorsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'author_name' => $this->faker->text(30),
            'author_image' =>$this->faker->imageUrl(640,480),
            'country' => $this->faker->text(30),
            'permission' => $this->faker->text(70),
        ];
    }
}
