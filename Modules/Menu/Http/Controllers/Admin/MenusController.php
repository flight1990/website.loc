<?php

namespace Modules\Menu\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Menu\Http\Requests\CreateMenuRequest;
use Modules\Menu\Http\Requests\UpdateMenuRequest;
use Modules\Menu\Models\Menu;

class MenusController extends Controller
{
    public function index(): Response
    {
        $menus = Menu::query()
            ->select(['id', 'title', 'url', 'sort', 'is_active', 'parent_id', '_lft', '_rgt'])
            ->get()
            ->sortBy('sort')
            ->toTree();

        return Inertia::render('Menu::Admin/AdminMenuIndex', [
            'menus' => $menus
        ]);
    }

    public function create(): Response
    {
        $parents = Menu::query()
            ->select(['id', 'title'])
            ->roots()
            ->get();

        return Inertia::render('Menu::Admin/AdminMenuModify', [
            'parents' => $parents
        ]);
    }

    public function store(CreateMenuRequest $request): RedirectResponse
    {
        Menu::create($request->validated());
        return redirect()->route('admin.menus.index');
    }

    public function edit($id): Response
    {
        $menuItem = Menu::query()
            ->select(['id', 'title', 'url', 'parent_id', 'is_active'])
            ->withCount('children')
            ->findOrFail($id);

        $parents = Menu::query()
            ->select(['id', 'title'])
            ->roots()
            ->withoutSelf($id)
            ->get();

        return Inertia::render('Menu::Admin/AdminMenuModify', [
            'menuItem' => $menuItem,
            'parents' => $parents
        ]);
    }

    public function update(UpdateMenuRequest $request, $id): RedirectResponse
    {
        $menu = Menu::query()->findOrFail($id);
        $menu->update($request->validated());

        return redirect()->route('admin.menus.index');
    }

    public function destroy($id): RedirectResponse
    {
        $menu = Menu::query()->findOrFail($id);
        $menu->delete();

        return redirect()->route('admin.menus.index');
    }

    public function rebuild(Request $request)
    {
        Menu::query()->rebuildTree($request->menu);
        return response('Дерево перестроено.');
    }
}
