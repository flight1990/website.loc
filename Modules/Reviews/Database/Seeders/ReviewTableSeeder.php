<?php

namespace Modules\Reviews\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Reviews\Models\Review;

class ReviewTableSeeder extends Seeder
{
    public function run(): void
    {
        Model::unguard();

        Review::factory(10)->create();
    }
}
