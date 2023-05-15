<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Pages\Database\Seeders\PagesTableSeeder;
use Modules\Users\Database\Seeders\UsersTableSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PagesTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
