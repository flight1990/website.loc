<?php

namespace Modules\Reviews\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Reviews\Models\Review;

class ReviewFactory extends Factory
{
    protected $model = Review::class;
    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->words(rand(2, 4), true)),
            'content' => $this->faker->realText(400),
            'is_active' => true,
            'client' => $this->faker->name
        ];
    }
}

