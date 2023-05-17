<?php

namespace Modules\Promos\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Pages\Models\Page;
use Modules\Promos\Models\Promo;

class PromoFactory extends Factory
{
    protected $model = Promo::class;

    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->words(rand(2, 4), true)),
            'content' => $this->faker->realText(400),
            'is_active' => true,
            'img' => $this->faker->imageUrl,
            'url' => Page::query()->select(['slug'])->inRandomOrder()->value('slug')
        ];
    }
}

