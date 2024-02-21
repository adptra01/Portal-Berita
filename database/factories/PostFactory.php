<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Status;
use App\Models\User;
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
        $content =
            '<h1><strong><em><u><span style="color: rgb(0, 0, 0);">Labore pariatur? Dol.Labore pariatur?&nbsp;</span></u></em></strong></h1><ol><li><span style="color: rgb(0, 0, 0);">Dol.Labore pariatur?&nbsp;</span></li><li><span style="color: rgb(0, 0, 0);">Dol.Labore pariatur?&nbsp;</span></li></ol><p><span style="color: rgb(0, 0, 0);">Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.Labore pariatur? Dol.</span></p>';

        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'thumbnail' => 'https://images.unsplash.com/photo-1682687220975-7b2df674d3ce?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHwxfHx8ZW58MHx8fHx8',
            'content' => $content,
            'category_id' => Category::all()->random()->id,
            'user_id' => User::where('role', 'Penulis')->all()->random()->id,
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}
