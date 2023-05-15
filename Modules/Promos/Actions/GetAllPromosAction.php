<?php

namespace Modules\Promos\Actions;
use Illuminate\Database\Eloquent\Collection;

class GetAllPromosAction extends BaseAction
{
    public function run(): Collection|array
    {
        return $this->model->query()
            ->select(['id', 'title', 'url', 'img', 'content'])
            ->where('is_active', 1)
            ->get();
    }
}
