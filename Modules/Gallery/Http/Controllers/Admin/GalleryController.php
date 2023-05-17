<?php

namespace Modules\Gallery\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;

class GalleryController extends Controller
{
    public function index()
    {
        return Inertia::render('Gallery::Admin/AdminGalleryIndex');
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {

    }
    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
