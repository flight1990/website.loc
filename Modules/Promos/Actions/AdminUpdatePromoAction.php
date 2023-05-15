<?php

namespace Modules\Promos\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AdminUpdatePromoAction extends BaseAction
{
    public function run($data, $id): Model|Collection|Builder|array|null
    {
        $promo = $this->model->query()
            ->findOrFail($id);

        $promo->update($data);

        return $promo;
    }
}
