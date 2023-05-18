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
                'name' => 'Телефон',
                'key' => 'phone',
                'value' => '+375295230681'
            ],
            [
                'name' => 'Электронная почта',
                'key' => 'email',
                'value' => 'vladimirborisiuk@gmail.com'
            ],
            [
                'name' => 'Адрес',
                'key' => 'address',
                'value' => 'Янки Купалы 15 а'
            ],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
