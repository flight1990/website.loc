<?php

namespace Modules\Gallery\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Gallery\Models\Album;
use Modules\Gallery\Models\Photo;

class PhotoFactory extends Factory
{
    protected $model = Photo::class;

    public function definition()
    {
        return [
            'album_id' => Album::query()->inRandomOrder()->value('id'),
            'img' => $this->faker->imageUrl
        ];
    }
}

