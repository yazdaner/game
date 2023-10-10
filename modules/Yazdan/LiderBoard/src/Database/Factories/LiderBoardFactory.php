<?php

namespace Yazdan\LiderBoard\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Yazdan\LiderBoard\App\Models\LiderBoard;

class LiderBoardFactory extends Factory
{

    protected $model = LiderBoard::class;

    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'slug' => $this->faker->slug(),
            'parent_id' => null,
        ];
    }


    public function subLiderBoard()
    {
        return $this->state(function (array $attributes) {
            return [
                'parent_id' => LiderBoard::factory()->create()->id,
            ];
        });
    }
}
