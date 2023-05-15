<?php

namespace Modules\Promos\Actions;

class AdminDeletePromoAction extends BaseAction
{
    public function run($id)
    {
        return $this->model->query()
            ->findOrFail($id)
            ->delete();
    }
}
