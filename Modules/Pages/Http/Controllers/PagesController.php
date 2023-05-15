<?php

namespace Modules\Pages\Http\Controllers;

use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Pages\Actions\FindPageBySlugAction;
use Modules\Promos\Actions\GetAllPromosAction;

class PagesController extends Controller
{
    public function index(): Response
    {
        $promos = app(GetAllPromosAction::class)->run();
        return Inertia::render('Pages::Guest/GuestPagesIndex', compact('promos'));
    }

    public function show($slug): Response
    {
        $page = app(FindPageBySlugAction::class)->run($slug);
        return Inertia::render('Pages::Guest/GuestPagesShow', compact('page'));
    }

}
