<?php

namespace Modules\Menu\Actions;

use Illuminate\Database\Eloquent\Collection;

class AdminGetAllMenusAction extends BaseAction
{
    public function run(): Collection|array
    {
        return $this->model->query()
            ->select(['id', 'title', 'url', 'is_active', 'parent_id'])
            ->get();
    }
}
