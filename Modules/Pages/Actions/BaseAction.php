<?php

namespace Modules\Pages\Actions;

use Modules\Pages\Models\Page;

class BaseAction
{
    public Page $model;

    public function __construct(Page $model)
    {
        $this->model = $model;
    }
}
