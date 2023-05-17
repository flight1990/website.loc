<?php

namespace Modules\Gallery\Http\Controllers\Admin;

use App\Traits\FileTrait;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\Gallery\Http\Requests\CreateAlbumRequest;
use Modules\Gallery\Http\Requests\UpdateAlbumRequest;
use Modules\Gallery\Models\Album;
use Modules\Gallery\Models\Photo;

class GalleryController extends Controller
{
    use FileTrait;

    public function index(Request $request)
    {
        if ($request->ajax() && !$request->inertia()) {
            $query = Album::query()
                ->select(['id', 'title', 'slug', 'description']);

            return DataTables::eloquent($query)
                ->addColumn('actions', function ($item) {

                    $editLink = '<a href="/admin/gallery/' . $item->id . '/edit">Редактировать</a>';
                    $deleteLink = '<a href="/admin/gallery/' . $item->id . '" data-method="delete">Удалить</a>';

                    return $editLink . ' ' . $deleteLink;
                })
                ->rawColumns(['actions'])
                ->toJson();
        }

        return Inertia::render('Gallery::Admin/AdminGalleryIndex');
    }

    public function create()
    {
        return Inertia::render('Gallery::Admin/AdminGalleryModify');
    }

    public function store(CreateAlbumRequest $request)
    {
        return redirect()->route('admin.gallery.index');
    }

    public function edit($id)
    {
        $album = Album::query()
            ->select(['id', 'title', 'description'])
            ->with('photos', function ($q) {
                $q->select(['id', 'img', 'album_id']);
            })
            ->findOrFail($id);

        return Inertia::render('Gallery::Admin/AdminGalleryModify', [
            'album' => $album
        ]);
    }

    public function update(UpdateAlbumRequest $request, $id)
    {
        return redirect()->route('admin.gallery.index');
    }

    public function destroy($id)
    {
        $album = Album::query()->findOrFail($id);

        foreach ($album->photos as $photo) {
            $this->delete($photo->img);
        }

        $album->delete();

        return redirect()->route('admin.gallery.index');
    }

    public function deletePhoto($id)
    {
        $photo = Photo::query()->findOrFail($id);

        $this->delete($photo->img);
        $photo->delete();

        return redirect()->route('admin.gallery.edit', $photo->album_id);
    }
}
