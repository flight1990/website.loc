<?php

namespace Modules\Gallery\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Gallery\Models\Album;

class AlbumFactory extends Factory
{
    protected $model = Album::class;

    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->words(rand(1,3), true)),
            'description' => $this->faker->realText(200)
        ];
    }
}

