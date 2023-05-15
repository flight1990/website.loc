<?php

namespace Modules\Pages\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Pages\Actions\AdminCreatePageAction;
use Modules\Pages\Actions\AdminDeletePageAction;
use Modules\Pages\Actions\AdminFindPageByIDAction;
use Modules\Pages\Actions\AdminGetAllPagesAction;
use Modules\Pages\Actions\AdminUpdatePageAction;
use Modules\Pages\Http\Requests\CreatePageRequest;
use Modules\Pages\Http\Requests\UpdatePageRequest;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax() && !$request->inertia()) {
            return app(AdminGetAllPagesAction::class)->run();
        }

        return Inertia::render('Pages::Admin/AdminPagesIndex');
    }

    public function create(): Response
    {
        return Inertia::render('Pages::Admin/AdminPagesModify');
    }

    public function store(CreatePageRequest $request): RedirectResponse
    {
        app(AdminCreatePageAction::class)->run($request->validated());
        return redirect()->route('admin.pages.index');
    }

    public function show($id): Response
    {
        $page = app(AdminFindPageByIDAction::class)->run($id);
        return Inertia::render('Pages::Admin/AdminPagesShow', compact('page'));
    }

    public function edit($id): Response
    {
        $page = app(AdminFindPageByIDAction::class)->run($id);
        return Inertia::render('Pages::Admin/AdminPagesModify', compact('page'));
    }

    public function update(UpdatePageRequest $request, $id): RedirectResponse
    {
        app(AdminUpdatePageAction::class)->run($request->validated(), $id);
        return redirect()->route('admin.pages.index');
    }

    public function destroy($id): RedirectResponse
    {
        app(AdminDeletePageAction::class)->run($id);
        return redirect()->route('admin.pages.index');
    }
}
