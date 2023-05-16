<?php

namespace Modules\Gallery\Http\Controllers\Admin;

use App\Traits\FileTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Gallery\Http\Requests\CreateGalleryRequest;
use Modules\Gallery\Repositories\GalleryRepository;

class GalleryController extends Controller
{
    use FileTrait;

    protected GalleryRepository $galleryRepository;

    public function __construct(GalleryRepository $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }

    public function index(): Response
    {
        $images = $this->galleryRepository->all(['id', 'img']);

        return Inertia::render('Gallery::Admin/AdminGalleryIndex', [
            'images' => $images
        ]);
    }

    public function store(CreateGalleryRequest $request): RedirectResponse
    {
        if (!empty($request->images)) {

            $images = $request->images;

            DB::transaction(function () use ($images) {
                foreach ($images as $file) {
                    $image = $this->upload($file, 'gallery');

                    $this->galleryRepository->create([
                        'img' => ['original' => $image['location']]
                    ]);
                }
            });

        }

        return redirect()->route('admin.gallery.index');
    }

    public function destroy($id): RedirectResponse
    {
        $image = $this->galleryRepository->findByID($id);

        $this->delete($image->img['original']);

        $image->delete();

        return redirect()->route('admin.gallery.index');
    }
}
