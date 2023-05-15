<?php

namespace Modules\Promos\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Promos\Models\Promo;

class PromoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Promo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}

