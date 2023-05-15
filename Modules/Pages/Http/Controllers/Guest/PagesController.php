<?php

namespace Modules\Pages\Http\Controllers\Guest;

use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Pages\Repositories\PageRepository;
use Modules\Promos\Repositories\PromoRepository;

class PagesController extends Controller
{
    protected PageRepository $pageRepository;
    protected PromoRepository $promoRepository;

    public function __construct(PageRepository $pageRepository, PromoRepository $promoRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->promoRepository = $promoRepository;
    }

    public function index(): Response
    {
        $promos = $this->promoRepository->getAllOnlyActive(['id', 'title', 'url', 'img', 'content']);

        return Inertia::render('Pages::Guest/GuestPagesIndex', [
            'promos' => $promos
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
