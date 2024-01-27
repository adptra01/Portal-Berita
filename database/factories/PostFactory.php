<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Status;
use App\Models\Category;
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
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'thumbnail' => 'https://images.unsplash.com/photo-1682687220975-7b2df674d3ce?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHwxfHx8ZW58MHx8fHx8', // image unplashed
            'content' => '<p>' . $this->faker->sentence(6) . '</p>',
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'status_id' => Status::all()->random()->id,
        ];
    }
}
