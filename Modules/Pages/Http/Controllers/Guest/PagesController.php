<?php

namespace Modules\Pages\Http\Controllers\Guest;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Modules\FAQ\Models\Faq;
use Modules\Gallery\Models\Album;
use Modules\Pages\Models\Page;
use Modules\Promos\Models\Promo;
use Modules\Reviews\Models\Review;

class PagesController extends Controller
{
    public function index(): Response
    {
        $promos = Promo::query()
            ->select(['id', 'title', 'url', 'img', 'content'])
            ->active()
            ->get();

        $faqs = Faq::query()
            ->select(['id', 'question', 'answer'])
            ->active()
            ->get();

        $reviews = Review::query()
            ->select(['id', 'title', 'content', 'client'])
            ->active()
            ->latest()
            ->limit(5)
            ->get();

        $albums = Album::query()->select(['id','title', 'description', 'slug',
            DB::raw('(select img from photos where album_id = albums.id  order by id desc limit 1) as cover')])
            ->latest()
            ->get();

        return Inertia::render('Pages::Guest/GuestPagesIndex', [
            'promos' => $promos,
            'faqs' => $faqs,
            'reviews' => $reviews,
            'albums' => $albums
        ]);
    }

    public function show($slug): Response
    {
        $page = Page::query()
            ->select(['title', 'content', 'meta_keywords', 'meta_description'])
            ->slug($slug)
            ->active()
            ->firstOrFail();

        return Inertia::render('Pages::Guest/GuestPagesShow', [
            'page' => $page
        ]);
    }

}
