<?php

namespace Modules\Users\Actions;

class AdminCreateUserAction extends BaseAction
{
    public function run($data)
    {
        $data['password'] = bcrypt($data['password']);

        return $this->model
            ->create($data)
            ->syncRoles($data['roles']);
    }
}
