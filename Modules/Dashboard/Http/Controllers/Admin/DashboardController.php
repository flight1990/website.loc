<?php

namespace Modules\Dashboard\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Dashboard::Admin/AdminDashboardIndex');
    }
}
