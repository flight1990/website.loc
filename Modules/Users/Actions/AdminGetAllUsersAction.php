<?php

namespace Modules\Users\Actions;
use DataTables;

class AdminGetAllUsersAction extends BaseAction
{
    public function run()
    {
        $query = $this->model->query()
            ->select(['id', 'name', 'email', 'created_at', 'updated_at']);

        return DataTables::eloquent($query)
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
}
