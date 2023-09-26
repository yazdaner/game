<?php

namespace Yazdan\Blog\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Yazdan\Blog\App\Models\Blog;

class BlogFactory extends Factory
{

    protected $model = Blog::class;

    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'slug' => $this->faker->slug(),
            'parent_id' => null,
        ];
    }


    public function subBlog()
    {
        return $this->state(function (array $attributes) {
            return [
                'parent_id' => Blog::factory()->create()->id,
            ];
        });
    }
}
