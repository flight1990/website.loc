<?php

namespace Modules\FAQ\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\FAQ\Models\Faq;

class FaqFactory extends Factory
{
    protected $model = Faq::class;

    public function definition(): array
    {
        return [
            'question' => ucfirst($this->faker->words(rand(2, 4), true)).'?',
            'answer' => $this->faker->realText(400),
            'is_active' => true
        ];
    }
}

