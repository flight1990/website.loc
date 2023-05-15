<?php

namespace Modules\Pages\Actions;

class AdminCreatePageAction extends BaseAction
{
    public function run($data)
    {
        return $this->model->create($data);
    }
}
