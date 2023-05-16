<?php

namespace Modules\Reviews\Repositories;

use DataTables;
use App\Repositories\BaseRepository;
use Modules\Reviews\Models\Review;

class ReviewRepository extends BaseRepository
{
    public function __construct(Review $model)
    {
        parent::__construct($model);
    }

    public function getAll(array $columns = ['*'])
    {
        return DataTables::eloquent($this->model->query()
            ->select($columns))
            ->editColumn('is_active', function ($item) {
                return $item->is_active ? 'Активен' : 'Не активен';
            })
            ->addColumn('actions', function ($item) {

                $editLink = '<a href="/admin/reviews/'.$item->id.'/edit">Редактировать</a>';
                $deleteLink = '<a href="/admin/reviews/'.$item->id.'" data-method="delete">Удалить</a>';

                return $editLink.' '.$deleteLink;
            })
            ->rawColumns(['actions'])
            ->toJson();
    }
}
