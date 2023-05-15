<?php

namespace Modules\Promos\Actions;

use Modules\Promos\Models\Promo;

class BaseAction
{
    public Promo $model;

    public function __construct(Promo $model)
    {
        $this->model = $model;
    }
}
