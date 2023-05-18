<?php

namespace Modules\Gallery\Http\Controllers\Guest;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Modules\Gallery\Models\Album;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = Album::query()->select(['id','title', 'description', 'slug',
            DB::raw('(select img from photos where album_id = albums.id  order by id desc limit 1) as cover')])
            ->latest()
            ->get();

        return Inertia::render('Gallery::Guest/GuestGalleryIndex', [
            'albums' => $albums
        ]);
    }
    public function show($slug)
    {
        $album = Album::query()
            ->select(['id', 'title', 'slug', 'description'])
            ->slug($slug)
            ->with('photos', function ($q) {
                $q->select(['id', 'img', 'album_id']);
            })
            ->firstOrFail();

        return Inertia::render('Gallery::Guest/GuestGalleryShow', [
            'album' => $album
        ]);
    }
}
