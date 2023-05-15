<?php

namespace App\Http\Middleware;

use App\Http\Resources\GenerateMenuResource;
use Menu;
use Illuminate\Http\Request;
use Inertia\Middleware;

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
            'authUser' => auth()->check() ? [
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ] : null,
        ]);
    }
}
