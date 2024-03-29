<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resource>
 */
class ResourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' =>  rand(1, 5),
            'author_id' =>  rand(1, 5),
            'title' => $this->faker->text(30),
            'description' => $this->faker->text(70),
        ];
    }
}
