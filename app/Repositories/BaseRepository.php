<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected Model $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function findByID($id, $columns = ['*']): Model|Collection|Builder|array|null
    {
        return $this->model
            ->query()
            ->select($columns)
            ->findOrFail($id);
    }

    public function create($payload): Model|Builder
    {
        return $this->model
            ->query()
            ->create($payload);
    }

    public function update($payload, $id): bool|int
    {
        return $this->model
            ->query()
            ->findOrFail($id)
            ->update($payload);
    }

    public function delete($id)
    {
        return $this->model
            ->query()
            ->findOrFail($id)
            ->delete();
    }
}
