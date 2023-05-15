<?php

namespace Modules\Pages\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AdminDeletePageAction extends BaseAction
{
    public function run($id): Model|Collection|Builder|array|null
    {
       $page = $this->model->query()->findOrFail($id);
       $page->delete();

       return $page;
    }
}
