<?php

namespace Modules\Menu\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AdminFindMenuByIDAction extends BaseAction
{
    public function run($id): Model|Collection|Builder|array|null
    {
        return $this->model->query()
            ->withCount('children')
            ->findOrFail($id);
    }
}
