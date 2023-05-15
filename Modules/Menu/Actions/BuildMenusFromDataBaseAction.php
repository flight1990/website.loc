<?php

namespace Modules\Menu\Actions;

use Modules\Menu\Repositories\MenuRepository;

class BuildMenusFromDataBaseAction
{
    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function run($menu)
    {
        $node = $this->menuRepository->getNodeTreeMenus(['id', 'title', 'url', 'parent_id', '_lft', '_rgt', 'sort']);

        $menuBuilder = function ($menus, $parent = null) use (&$menuBuilder, &$menu) {

            foreach ($menus as $item) {

                $nickName = 'menu_'.$item->id;
                $url = empty($item->url) ? ['disableActivationByURL' => 'true'] : $item->url;

                if (empty($parent)) {
                    $menu->add($item->title, $url)->nickname($nickName);
                }
                else {
                    $menu->item($parent)->add($item->title, $url)->nickname($nickName);
                }

                $menuBuilder($item->children, $nickName);
            }
        };

        $menuBuilder($node);

        return $menu;
    }
}
