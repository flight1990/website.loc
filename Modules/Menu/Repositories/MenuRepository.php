<?php

namespace Modules\Menu\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Menu\Models\Menu;

class MenuRepository extends BaseRepository
{
    public function __construct(Menu $model)
    {
        parent::__construct($model);
    }

    public function getNodeTreeMenus($columns = ['*'])
    {
        return $this->model
            ->query()
            ->select($columns)
            ->get()
            ->sortBy('sort')
            ->toTree();
    }

    public function getRootMenusForCombobox($selfID = null)
    {
        return $this->model->query()
            ->select(['id', 'title'])
            ->whereNull('parent_id')
            ->when(!empty($selfID), function ($q) use ($selfID) {
                $q->where('id', '!=', $selfID);
            })
            ->get();
    }

    public function rebuildTree($payload)
    {
        return $this->model
            ->query()
            ->rebuildTree($payload);
    }

    public function findByID($id, $columns = ['*']): Model|Collection|Builder|array|null
    {
        return $this->model->query()
            ->select($columns)
            ->withCount('children')
            ->findOrFail($id);
    }
}
