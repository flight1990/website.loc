<?php

namespace Modules\Menu\Actions;

class AdminGetNodeTreeMenusAction extends BaseAction
{
    public function run()
    {
        return $this->model->query()
            ->select(['id', 'title', 'url', 'sort', 'is_active', 'parent_id', '_lft', '_rgt'])
            ->get()
            ->sortBy('sort')
            ->toTree();
    }
}
