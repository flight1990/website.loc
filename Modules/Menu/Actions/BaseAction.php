<?php

namespace Modules\Menu\Actions;
use Modules\Menu\Models\Menu;

class BaseAction
{
    public Menu $model;

    public function __construct(Menu $model)
    {
        $this->model = $model;
    }
}
