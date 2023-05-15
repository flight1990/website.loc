<?php

namespace Modules\Pages\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Pages\Http\Requests\CreatePageRequest;
use Modules\Pages\Http\Requests\UpdatePageRequest;
use Modules\Pages\Repositories\PageRepository;

class PagesController extends Controller
{
    protected PageRepository $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax() && !$request->inertia()) {
            return $this->pageRepository->getAll(['id', 'title', 'slug', 'is_active']);
        }

        return Inertia::render('Pages::Admin/AdminPagesIndex');
    }

    public function create(): Response
    {
        return Inertia::render('Pages::Admin/AdminPagesModify');
    }

    public function store(CreatePageRequest $request): RedirectResponse
    {
        $this->pageRepository->create($request->validated());

        return redirect()->route('admin.pages.index');
    }

    public function show($id): Response
    {
        $page = $this->pageRepository->findByID($id);

        return Inertia::render('Pages::Admin/AdminPagesShow', [
            'page' => $page
        ]);
    }

    public function edit($id): Response
    {
        $page = $this->pageRepository->findByID($id);

        return Inertia::render('Pages::Admin/AdminPagesModify', [
            'page' => $page
        ]);
    }

    public function update(UpdatePageRequest $request, $id): RedirectResponse
    {
        $this->pageRepository->update($request->validated(), $id);

        return redirect()->route('admin.pages.index');
    }

    public function destroy($id): RedirectResponse
    {
        $this->pageRepository->delete($id);

        return redirect()->route('admin.pages.index');
    }
}
