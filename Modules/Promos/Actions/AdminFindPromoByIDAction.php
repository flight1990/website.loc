<?php

namespace Modules\Promos\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AdminFindPromoByIDAction extends BaseAction
{
    public function run($id): Model|Collection|Builder|array|null
    {
        return $this->model->query()
            ->findOrFail($id);
    }
}
