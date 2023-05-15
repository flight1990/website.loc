<?php

namespace Modules\Menu\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Menu\Models\Menu;

class MenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Menu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(rand(1,4), true),
            'url' => $this->faker->url,
            'is_active' => $this->faker->boolean
        ];
    }
}

