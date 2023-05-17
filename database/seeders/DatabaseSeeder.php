<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\FAQ\Database\Seeders\FaqTableSeeder;
use Modules\Gallery\Database\Seeders\GalleryDatabaseSeeder;
use Modules\Menu\Database\Seeders\MenuTableSeeder;
use Modules\Pages\Database\Seeders\PagesTableSeeder;
use Modules\Promos\Database\Seeders\PromosTableSeeder;
use Modules\Reviews\Database\Seeders\ReviewTableSeeder;
use Modules\Users\Database\Seeders\UsersTableSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PagesTableSeeder::class,
            MenuTableSeeder::class,
            FaqTableSeeder::class,
            ReviewTableSeeder::class,
            PromosTableSeeder::class,
            UsersTableSeeder::class,
            GalleryDatabaseSeeder::class
        ]);
    }
}
