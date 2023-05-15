<?php

namespace Modules\Menu\Actions;

class AdminRebuildMenusAction extends BaseAction
{
    public function run($data)
    {
        return $this->model->query()->rebuildTree($data);
    }
}
