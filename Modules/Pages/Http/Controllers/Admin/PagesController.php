<?php

namespace Modules\Pages\Http\Controllers\Admin;

use DataTables;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Pages\Http\Requests\CreatePageRequest;
use Modules\Pages\Http\Requests\UpdatePageRequest;
use Modules\Pages\Models\Page;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax() && !$request->inertia()) {

            $query = Page::query()
                ->select(['id', 'title', 'slug', 'is_active']);

            return DataTables::eloquent($query)
                ->editColumn('is_active', function ($item) {
                    return $item->is_active ? 'Активна' : 'Не активна';
                })
                ->addColumn('actions', function ($item) {

                    $showLink = '<a href="/admin/pages/'.$item->id.'">Просмотр</a>';
                    $editLink = '<a href="/admin/pages/'.$item->id.'/edit">Редактировать</a>';
                    $deleteLink = '<a href="/admin/pages/'.$item->id.'" data-method="delete">Удалить</a>';

                    return $showLink.' '.$editLink.' '.$deleteLink;
                })
                ->rawColumns(['actions'])
                ->toJson();
        }

        return Inertia::render('Pages::Admin/AdminPagesIndex');
    }

    public function create(): Response
    {
        return Inertia::render('Pages::Admin/AdminPagesModify');
    }

    public function store(CreatePageRequest $request): RedirectResponse
    {
        Page::create($request->validated());
        return redirect()->route('admin.pages.index');
    }

    public function show($id): Response
    {
        $page = Page::query()
            ->select(['id', 'title', 'content'])
            ->findOrFail($id);

        return Inertia::render('Pages::Admin/AdminPagesShow', [
            'page' => $page
        ]);
    }

    public function edit($id): Response
    {
        $page = Page::query()
            ->select(['id', 'title', 'content', 'is_active', 'meta_keywords', 'meta_description'])
            ->findOrFail($id);

        return Inertia::render('Pages::Admin/AdminPagesModify', [
            'page' => $page
        ]);
    }

    public function update(UpdatePageRequest $request, $id): RedirectResponse
    {
        $page = Page::query()->findOrFail($id);
        $page->update($request->validated());

        return redirect()->route('admin.pages.index');
    }

    public function destroy($id): RedirectResponse
    {
        $page = Page::query()->findOrFail($id);
        $page->delete();

        return redirect()->route('admin.pages.index');
    }
}
