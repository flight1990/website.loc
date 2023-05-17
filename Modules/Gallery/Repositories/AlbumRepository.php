<?php

namespace Modules\Gallery\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Gallery\Models\Album;

class AlbumRepository extends BaseRepository
{
    public function __construct(Album $model)
    {
        parent::__construct($model);
    }

    public function findBySlugWithPhotos($slug)
    {
        return $this->model
            ->query()
            ->select(['id', 'title', 'description', 'updated_at'])
            ->with('photos', function ($q) {
                $q->select(['id', 'img', 'album_id']);
            })
            ->whereSlug($slug)
            ->firstOrFail();
    }
}
