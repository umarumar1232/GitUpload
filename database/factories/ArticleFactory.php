<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'body' => fake()->text(1000),
            'cover' => fake()->imageUrl(640, 480, 'animals', true),
            'user_id' => User::inRandomOrder()->pluck('id')->first(),
        ];
    }
}
