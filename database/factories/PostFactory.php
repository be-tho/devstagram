<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' 		=> fake()->title(),
			'descripcion' 	=> fake()->text(),
			'imagen' 		=> 'default-image.png',
			'user_id' 		=> fake()->randomElement([1,2,3]),
        ];
    }
}
