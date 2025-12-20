<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tag;
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
            'title'     => fake()->uuid(),
            'body'      => fake()->paragraph(5),
            'author'    => fake()->name(),
            'published' => fake()->boolean(),
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $tags = Tag::factory(3)->create();
            $post->tags()->attach($tags->pluck('id'));
        });
    }
}
