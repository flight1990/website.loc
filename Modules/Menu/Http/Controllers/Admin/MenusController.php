<?php

namespace Modules\Menu\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Menu\Http\Requests\CreateMenuRequest;
use Modules\Menu\Http\Requests\UpdateMenuRequest;
use Modules\Menu\Repositories\MenuRepository;

class MenusController extends Controller
{

    protected MenuRepository $menuRepository;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function index(): Response
    {
        $menus = $this->menuRepository->getNodeTreeMenus(['id', 'title', 'url', 'sort', 'is_active', 'parent_id', '_lft', '_rgt']);

        return Inertia::render('Menu::Admin/AdminMenuIndex', [
            'menus' => $menus
        ]);
    }

    public function create(): Response
    {
        $parents = $this->menuRepository->getRootMenusForCombobox();

        return Inertia::render('Menu::Admin/AdminMenuModify', [
            'parents' => $parents
        ]);
    }

    public function store(CreateMenuRequest $request): RedirectResponse
    {
        $this->menuRepository->create($request->validated());

        return redirect()->route('admin.menus.index');
    }

    public function edit($id): Response
    {
        $menuItem = $this->menuRepository->findByID($id);
        $parents = $this->menuRepository->getRootMenusForCombobox($id);

        return Inertia::render('Menu::Admin/AdminMenuModify', [
            'menuItem' => $menuItem,
            'parents' => $parents
        ]);
    }

    public function update(UpdateMenuRequest $request, $id): RedirectResponse
    {
        $this->menuRepository->update($request->validated(), $id);

        return redirect()->route('admin.menus.index');
    }

    public function destroy($id): RedirectResponse
    {
        $this->menuRepository->delete($id);

        return redirect()->route('admin.menus.index');
    }

    public function rebuild(Request $request)
    {
        $this->menuRepository->rebuildTree($request->menu);

        return response('Дерево перестроено.');
    }
}
