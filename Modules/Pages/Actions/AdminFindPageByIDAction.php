<?php

namespace Modules\Pages\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AdminFindPageByIDAction extends BaseAction
{
    public function run($id): Model|Collection|Builder|array|null
    {
        return $this->model->query()->findOrFail($id);
    }
}
