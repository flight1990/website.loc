<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Modules\Settings\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (!\App::runningInConsole() && count(Schema::getColumnListing('settings'))) {
            $settings = Setting::all();
            foreach ($settings as $key => $setting)
            {
                Config::set('settings.'.$setting->key, $setting->value);
            }
        }
    }
}
