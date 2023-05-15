<?php

namespace Modules\Menu\Actions;

class AdminCreateMenuAction extends BaseAction
{
    public function run($data)
    {
        return $this->model->create($data);
    }
}
