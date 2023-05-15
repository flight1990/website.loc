<?php

namespace Modules\Pages\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Pages\Models\Page;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->words(rand(1,4), true)),
            'content' => $this->faker->realText(750),
            'is_active' => $this->faker->boolean,
            'meta_keywords' => $this->faker->words(rand(1,4), true),
            'meta_description' =>$this->faker->words(rand(1,4), true),
        ];
    }
}

