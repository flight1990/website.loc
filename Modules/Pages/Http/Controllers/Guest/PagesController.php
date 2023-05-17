<?php

namespace Modules\Pages\Http\Controllers\Guest;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Modules\FAQ\Repositories\FAQRepository;
use Modules\Gallery\Repositories\AlbumRepository;
use Modules\Pages\Repositories\PageRepository;
use Modules\Promos\Repositories\PromoRepository;
use Modules\Reviews\Repositories\ReviewRepository;

class PagesController extends Controller
{
    protected PageRepository $pageRepository;
    protected PromoRepository $promoRepository;
    protected FAQRepository $FAQRepository;
    protected ReviewRepository $reviewRepository;
    protected AlbumRepository $albumRepository;

    public function __construct(PageRepository $pageRepository, PromoRepository $promoRepository, FAQRepository $FAQRepository, ReviewRepository $reviewRepository, AlbumRepository $albumRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->promoRepository = $promoRepository;
        $this->FAQRepository = $FAQRepository;
        $this->reviewRepository = $reviewRepository;
        $this->albumRepository = $albumRepository;
    }

    public function index(): Response
    {
        $promos = $this->promoRepository->getAllOnlyActive(['id', 'title', 'url', 'img', 'content']);
        $faqs = $this->FAQRepository->getAllOnlyActive(['id', 'question', 'answer']);
        $reviews = $this->reviewRepository->getLatestOnlyActive(['id', 'title', 'content', 'client']);
        $albums = $this->albumRepository->getLatest(['id','title', 'description', 'slug',
            DB::raw('(select img from photos where album_id = albums.id  order by id asc limit 1) as cover')]);

        return Inertia::render('Pages::Guest/GuestPagesIndex', [
            'promos' => $promos,
            'faqs' => $faqs,
            'reviews' => $reviews,
            'albums' => $albums
        ]);
    }

    public function show($slug): Response
    {
        $page = $this->pageRepository->findOnlyActiveBySlug($slug, ['title', 'content', 'meta_keywords', 'meta_description']);

        return Inertia::render('Pages::Guest/GuestPagesShow', [
            'page' => $page
        ]);
    }

}
