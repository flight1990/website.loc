<?php

namespace Modules\Promos\Actions;

class AdminCreatePromoAction extends BaseAction
{
    public function run($data)
    {
        return $this->model->create($data);
    }
}
