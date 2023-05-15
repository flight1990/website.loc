<?php

namespace Modules\Pages\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AdminUpdatePageAction extends BaseAction
{
    public function run($data, $id): Model|Collection|Builder|array|null
    {
        $page = $this->model->query()->findOrFail($id);
        $page->update($data);

        return $page;
    }
}
