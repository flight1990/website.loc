<?php

namespace App\Http\Middleware;

use App\Http\Resources\GenerateMenuResource;
use Illuminate\Support\Facades\Config;
use Menu;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Modules\Settings\Models\Setting;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'menu' => GenerateMenuResource::collection(Menu::get('menu')->roots()),
            'site_settings' => Config::get('settings'),
            'app_name' => Config::get('app.name'),
            'authUser' => auth()->check() ? [
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ] : null,
        ]);
    }
}
