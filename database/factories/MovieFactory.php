<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(rand(3, 6));
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'synopsis' => fake()->paragraphs(rand(3, 5), true),
            'category_id' => Category::inRandomOrder()->value('id'), // hanya ambil id
            'year' => fake()->year(),
            'actors' => fake()->name() . ', ' . fake()->name() . ', ' . fake()->name(),
            'cover_image' => 'https://picsum.photos/seed/' . Str::random(10) . '/480/640',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}