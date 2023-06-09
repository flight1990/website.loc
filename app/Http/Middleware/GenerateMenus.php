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
                $menu->add('Cтраницы', route('admin.pages.index'))->active('admin/pages/*')->nickname('pages');
                $menu->add('Промо', route('admin.promos.index'))->active('admin/promos/*');
                $menu->add('Вопрос-ответ', route('admin.faq.index'))->active('admin/faq/*');
                $menu->add('Отзывы', route('admin.reviews.index'))->active('admin/reviews/*');
                $menu->add('Галерея', route('admin.gallery.index'))->active('admin/gallery/*');
                $menu->add('Меню', route('admin.menus.index'))->active('admin/menus/*');
                $menu->add('Пользователи', route('admin.users.index'))->active('admin/users/*');
                $menu->add('Настройки', route('admin.settings.index'))->active('admin/settings/*');
            }
        });
    }

    public function buildGuestMenu(): void
    {
        Menu::make('menu', function ($menu) {
            $menu->add('Главная', route('guest.pages.index'));
            app(BuildMenusFromDataBaseAction::class)->run($menu);
            $menu->add('Галерея', route('guest.gallery.index'))->active('gallery/*');
            $menu->add('Контакты', route('guest.pages.index').'#contact');
        });
    }

    public function handle(Request $request, Closure $next)
    {
        $request->routeIs('admin.*') ? $this->buildAdminMenu() : $this->buildGuestMenu();
        return $next($request);
    }
}
