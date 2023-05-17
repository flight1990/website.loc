<?php

namespace Modules\Menu\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Menu\Models\Menu;
use Modules\Pages\Models\Page;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $pages = Page::query()
            ->select(['title', 'slug'])
            ->whereIsActive(1)
            ->get();

        foreach ($pages as $page) {
            Menu::create([
                'title' => $page->title,
                'url' => $page->slug,
                'is_active' => true
            ]);
        }
    }
}
