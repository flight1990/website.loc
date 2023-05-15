<?php

namespace Modules\Menu\Actions;

use Illuminate\Database\Eloquent\Collection;

class AdminGetRootMenusForComboboxAction extends BaseAction
{
    public function run($id = null): Collection|array
    {
        return $this->model->query()
            ->select(['id', 'title'])
            ->whereNull('parent_id')
            ->when(!empty($id), function ($q) use ($id) {
                $q->where('id', '!=', $id);
            })
            ->get();
    }
}
