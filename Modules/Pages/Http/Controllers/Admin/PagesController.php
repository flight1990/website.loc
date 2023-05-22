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

                    $showLink = '<a href="/admin/pages/' . $item->id . '" class="soft-icon-button-primary-sm">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 14a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"></path>
                                        <path d="M22 12c-2.667 4.667-6 7-10 7s-7.333-2.333-10-7c2.667-4.667 6-7 10-7s7.333 2.333 10 7Z"></path>
                                    </svg>
                                </a>';
                    $editLink = '<a href="/admin/pages/' . $item->id . '/edit" class="soft-icon-button-amber-sm">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                </a>';
                    $deleteLink = '<a href="/admin/pages/' . $item->id . '" data-method="delete" class="soft-icon-button-rose-sm">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M3 6h18"></path>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                          <path d="M10 11v6"></path>
                                          <path d="M14 11v6"></path>
                                        </svg>
                                   </a>';

                    return $showLink . ' ' . $editLink . ' ' . $deleteLink;
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
