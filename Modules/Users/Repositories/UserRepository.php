<?php

namespace Modules\Users\Repositories;

use DataTables;
use App\Repositories\BaseRepository;
use Modules\Users\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getAll(array $columns = ['*'])
    {
        return DataTables::eloquent($this->model->query()
            ->select($columns))
            ->editColumn('created_at', function ($item) {
                return $item->created_at?->format('d.m.Y h:s');
            })
            ->editColumn('updated_at', function ($item) {
                return $item->updated_at?->format('d.m.Y h:s');
            })
            ->addColumn('actions', function ($item) {

                $editLink = '<a href="/admin/users/'.$item->id.'/edit">Редактировать</a>';
                $deleteLink = '<a href="/admin/users/'.$item->id.'" data-method="delete">Удалить</a>';

                return $editLink.' '.$deleteLink;
            })
            ->rawColumns(['actions'])
            ->toJson();
    }

    public function update($payload, $id): bool|int
    {
        if (!empty($payload['password'])) {
            $payload['password'] = bcrypt($payload['password']);
        } else {
            unset($payload['password']);
        }

        return parent::update($payload, $id);
    }
}
