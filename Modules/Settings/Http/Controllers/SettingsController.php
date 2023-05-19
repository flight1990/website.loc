<?php

namespace Modules\Settings\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Modules\Settings\Models\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::query()
            ->select(['name', 'key', 'value'])
            ->get();

        return Inertia::render('Settings::SettingsModify', [
            'settings' => $settings
        ]);
    }

    public function update(Request $request)
    {
        DB::transaction(function () use ($request) {
            foreach ($request->settings as $setting) {
                Setting::query()
                    ->where('key', $setting['key'])
                    ->update(['value' => $setting['value']]);

                Config::set('settings.'.$setting['key'], $setting['value']);
            }
        });

        return redirect()->route('admin.settings.index');
    }

}
