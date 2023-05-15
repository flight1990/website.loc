<?php

namespace App\Http\Middleware;

use Menu;
use Closure;
use Illuminate\Http\Request;
use Modules\Menu\Actions\BuildMenusFromDataBaseAction;

class GenerateMenus
{
    public function buildAdminMenu(): void
    {
        Menu::make('menu', function ($menu) {
            if (auth()->check()) {
                $menu->add('Панель управления', route('admin.index'))->nickname('dashboard');
                $menu->item('dashboard')->add('Управление cтраницами сайта', route('admin.pages.index'))->active('admin/pages/*');
                $menu->item('dashboard')->add('Управление навигацией сайта', route('admin.menus.index'))->active('admin/menus/*');
                $menu->item('dashboard')->add('Управление промо-блоками сайта', route('admin.promos.index'))->active('admin/promos/*');
                $menu->item('dashboard')->add('Управление пользователями сайта', route('admin.users.index'))->active('admin/users/*');
                $menu->add('Вернуться к сайту', route('guest.pages.index'));
            }
        });
    }

    public function buildGuestMenu(): void
    {
        Menu::make('menu', function ($menu) {
            $menu->add('Главаня', route('guest.pages.index'));
            app(BuildMenusFromDataBaseAction::class)->run($menu);
            $menu->add('Панель управления', route('admin.index'));
        });
    }

    public function handle(Request $request, Closure $next)
    {
        $request->routeIs('admin.*') ? $this->buildAdminMenu() : $this->buildGuestMenu();
        return $next($request);
    }
}
