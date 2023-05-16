<?php

namespace Modules\Promos\Repositories;

use DataTables;
use App\Repositories\BaseRepository;
use Modules\Promos\Models\Promo;

class PromoRepository extends BaseRepository
{
    public function __construct(Promo $model)
    {
        parent::__construct($model);
    }

    public function getAll(array $columns = ['*'])
    {
        return DataTables::eloquent($this->model->query()->select($columns))
            ->editColumn('img', function ($item) {
                return "<img src='{$item->img}'  alt='{$item->title}' width='200'>";
            })
            ->editColumn('is_active', function ($item) {
                return $item->is_active ? 'Активна' : 'Не активна';
            })
            ->addColumn('actions', function ($item) {

                $editLink = '<a href="/admin/promos/'.$item->id.'/edit">Редактировать</a>';
                $deleteLink = '<a href="/admin/promos/'.$item->id.'" data-method="delete">Удалить</a>';

                return $editLink.' '.$deleteLink;
            })
            ->rawColumns(['actions', 'img'])
            ->toJson();
    }
}
