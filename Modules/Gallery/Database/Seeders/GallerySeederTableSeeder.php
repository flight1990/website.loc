<?php

namespace Modules\Gallery\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GallerySeederTableSeeder extends Seeder
{
    public function run(): void
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
