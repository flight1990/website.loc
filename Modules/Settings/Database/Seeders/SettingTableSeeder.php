<?php

namespace Modules\Settings\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Settings\Models\Setting;

class SettingTableSeeder extends Seeder
{
    public function run(): void
    {
        Model::unguard();

        $settings = [
            [
                'name' => 'Название сайта',
                'key' => 'site_name',
                'value' => 'Site Name'
            ]
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
