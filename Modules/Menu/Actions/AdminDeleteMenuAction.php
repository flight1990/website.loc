<?php

namespace Modules\Menu\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AdminDeleteMenuAction extends BaseAction
{
    public function run($id): Model|Collection|Builder|array|null
    {
        $menu = $this->model->query()->findOrFail($id);
        $menu->delete();

        return $menu;
    }
}
