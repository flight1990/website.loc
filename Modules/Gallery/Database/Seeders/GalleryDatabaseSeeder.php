<?php

namespace Modules\Gallery\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Gallery\Models\Album;
use Modules\Gallery\Models\Photo;

class GalleryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Album::factory(3)->create();
        Photo::factory(20)->create();
    }
}
