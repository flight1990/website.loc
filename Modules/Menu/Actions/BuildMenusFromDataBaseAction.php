<?php

namespace Modules\Menu\Actions;

class BuildMenusFromDataBaseAction extends BaseAction
{
    public function run($menu)
    {
        $node = $this->model->query()
            ->select(['id', 'title', 'url', 'parent_id', '_lft', '_rgt', 'sort'])
            ->where('is_active', 1)
            ->get()
            ->sortBy('sort')
            ->toTree();

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
