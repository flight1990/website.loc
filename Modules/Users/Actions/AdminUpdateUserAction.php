<?php

namespace Modules\Users\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AdminUpdateUserAction extends BaseAction
{
    public function run($data, $id): Model|Collection|Builder|array|null
    {
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

         $user = $this->model->query()->findOrFail($id);

         $user->update($data);
         $user->syncRoles($data['roles']);

         return $user;
    }
}
