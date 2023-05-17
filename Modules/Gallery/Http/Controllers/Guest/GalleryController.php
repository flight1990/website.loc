<?php

namespace Modules\Gallery\Http\Controllers\Guest;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Modules\Gallery\Repositories\AlbumRepository;

class GalleryController extends Controller
{
    protected AlbumRepository $albumRepository;

    public function __construct(AlbumRepository $albumRepository)
    {
        $this->albumRepository = $albumRepository;
    }

    public function index()
    {
        $albums = $this->albumRepository->all(['id','title', 'description', 'slug',
            DB::raw('(select img from photos where album_id = albums.id  order by id asc limit 1) as cover')]);

        return Inertia::render('Gallery::Guest/GuestGalleryIndex', [
            'albums' => $albums
        ]);
    }
    public function show($slug)
    {
        $album = $this->albumRepository->findBySlugWithPhotos($slug);

        return Inertia::render('Gallery::Guest/GuestGalleryShow', [
            'album' => $album
        ]);
    }
}
