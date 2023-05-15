<?php

namespace Modules\Pages\Repositories;

use DataTables;
use App\Repositories\BaseRepository;
use Modules\Pages\Models\Page;

class PageRepository extends BaseRepository
{
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }

    public function getAll(array $columns = ['*'])
    {
        return DataTables::eloquent($this->model->query()
            ->select($columns))
            ->editColumn('updated_at', function ($item) {
                return $item->updated_at?->format('d.m.Y h:s');
            })
            ->addColumn('actions', function ($item) {

                $showLink = '<a href="/admin/pages/'.$item->id.'">Просмотр</a>';
                $editLink = '<a href="/admin/pages/'.$item->id.'/edit">Редактировать</a>';
                $deleteLink = '<a href="/admin/pages/'.$item->id.'" data-method="delete">Удалить</a>';

                return $showLink.' '.$editLink.' '.$deleteLink;
            })
            ->rawColumns(['actions'])
            ->toJson();
    }

    public function findOnlyActiveBySlug($slug, $columns = ['*'])
    {
        return $this->model
            ->query()
            ->select($columns)
            ->whereSlug($slug)
            ->whereIsActive(1)
            ->firstOrFail();
    }
}
