<?php

namespace Modules\Gallery\Repositories;

use App\Repositories\BaseRepository;
use Modules\Gallery\Models\Gallery;

class GalleryRepository extends BaseRepository
{
    public function __construct(Gallery $model)
    {
        parent::__construct($model);
    }
}
