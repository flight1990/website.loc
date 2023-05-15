<?php

namespace Modules\Menu\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Menu\Actions\AdminCreateMenuAction;
use Modules\Menu\Actions\AdminDeleteMenuAction;
use Modules\Menu\Actions\AdminFindMenuByIDAction;
use Modules\Menu\Actions\AdminGetNodeTreeMenusAction;
use Modules\Menu\Actions\AdminGetRootMenusForComboboxAction;
use Modules\Menu\Actions\AdminRebuildMenusAction;
use Modules\Menu\Actions\AdminUpdateMenuAction;
use Modules\Menu\Http\Requests\CreateMenuRequest;
use Modules\Menu\Http\Requests\UpdateMenuRequest;

class MenusController extends Controller
{
    public function index(): Response
    {
        $menus = app(AdminGetNodeTreeMenusAction::class)->run();
        return Inertia::render('Menu::MenuIndex', compact('menus'));
    }

    public function create(): Response
    {
        $parents = app(AdminGetRootMenusForComboboxAction::class)->run();

        return Inertia::render('Menu::MenuModify', compact('parents'));
    }

    public function store(CreateMenuRequest $request): RedirectResponse
    {
        app(AdminCreateMenuAction::class)->run($request->validated());
        return redirect()->route('admin.menus.index');
    }

    public function edit($id): Response
    {
        $menuItem = app(AdminFindMenuByIDAction::class)->run($id);
        $parents = app(AdminGetRootMenusForComboboxAction::class)->run($id);

        return Inertia::render('Menu::MenuModify', compact('menuItem', 'parents'));
    }

    public function update(UpdateMenuRequest $request, $id): RedirectResponse
    {
        app(AdminUpdateMenuAction::class)->run($request->validated(), $id);
        return redirect()->route('admin.menus.index');
    }

    public function destroy($id): RedirectResponse
    {
        app(AdminDeleteMenuAction::class)->run($id);
        return redirect()->route('admin.menus.index');
    }

    public function rebuild(Request $request): \Illuminate\Http\Response|Application|ResponseFactory
    {
        app(AdminRebuildMenusAction::class)->run($request->menu);
        return response('Дерево перестроено.');
    }
}
