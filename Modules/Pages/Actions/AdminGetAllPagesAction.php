<?php

namespace Modules\Pages\Actions;
use DataTables;
class AdminGetAllPagesAction extends BaseAction
{
    public function run()
    {
        $query = $this->model->query()
            ->select(['id', 'title', 'slug', 'is_active', 'created_at', 'updated_at']);

        return DataTables::eloquent($query)
            ->editColumn('is_active', function ($item) {
                return $item->is_active ? 'Активна' : 'Не активна';
            })
            ->editColumn('created_at', function ($item) {
                return $item->created_at?->format('d.m.Y h:s');
            })
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
}
