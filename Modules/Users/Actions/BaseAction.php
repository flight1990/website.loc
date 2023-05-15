<?php

namespace Modules\Users\Actions;

use Modules\Users\Models\User;

class BaseAction
{
    public User $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
