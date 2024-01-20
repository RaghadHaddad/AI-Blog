<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResourceDetail>
 */
class ResourceDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'resource_id' =>  rand(1, 5),
            'job' =>  $this->faker->text(50),
            'image' =>$this->faker->imageUrl(640,480),
            'publication_date' => $this->faker->text(10),
            'total_download' => rand(1,100),
            'download_formate' =>$this->faker->text(30),
            'total_number' => $this->faker->text(20),
            'average_author_expertise' =>$this->faker->text(40),

        ];
    }
}
