<?php

namespace Modules\FAQ\Repositories;

use DataTables;
use App\Repositories\BaseRepository;
use Modules\FAQ\Models\Faq;

class FAQRepository extends BaseRepository
{
    public function __construct(Faq $model)
    {
        parent::__construct($model);
    }

    public function getAll(array $columns = ['*'])
    {
        return DataTables::eloquent($this->model->query()->select($columns))
            ->editColumn('is_active', function ($item) {
                return $item->is_active ? 'Активен' : 'Не активен';
            })
            ->addColumn('actions', function ($item) {

                $editLink = '<a href="/admin/faq/'.$item->id.'/edit">Редактировать</a>';
                $deleteLink = '<a href="/admin/faq/'.$item->id.'" data-method="delete">Удалить</a>';

                return $editLink.' '.$deleteLink;
            })
            ->rawColumns(['actions'])
            ->toJson();
    }
}
