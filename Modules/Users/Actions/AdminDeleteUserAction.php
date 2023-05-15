<?php

namespace Modules\Users\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AdminDeleteUserAction extends BaseAction
{
    public function run($id): Model|Collection|Builder|array|null
    {
        $user = $this->model->query()->findOrFail($id);
        $user->delete();

        return $user;
    }
}
