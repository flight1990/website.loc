<?php

namespace Modules\Promos\Http\Controllers\Admin;

use App\Traits\FileTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Promos\Actions\AdminCreatePromoAction;
use Modules\Promos\Actions\AdminDeletePromoAction;
use Modules\Promos\Actions\AdminFindPromoByIDAction;
use Modules\Promos\Actions\AdminGetAllPromosAction;
use Modules\Promos\Actions\AdminUpdatePromoAction;
use Modules\Promos\Http\Requests\CreatePromoRequest;
use Modules\Promos\Http\Requests\UpdatePromoRequest;

class PromosController extends Controller
{

    use FileTrait;
    public function index(Request $request)
    {
        if ($request->ajax() && !$request->inertia()) {
            return app(AdminGetAllPromosAction::class)->run();
        }

        return Inertia::render('Promos::Admin/AdminPromosIndex');
    }

    public function create(): Response
    {
        return Inertia::render('Promos::Admin/AdminPromosModify');
    }

    public function store(CreatePromoRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (!empty($request->file('file'))) {
            $img = $this->upload($request->file('file'));
            $data['img'] = $img['location'];
        }

        app(AdminCreatePromoAction::class)->run($data);
        return redirect()->route('admin.promos.index');
    }

    public function edit($id): Response
    {
        $promo = app(AdminFindPromoByIDAction::class)->run($id);
        return Inertia::render('Promos::Admin/AdminPromosModify', compact('promo'));
    }

    public function update(UpdatePromoRequest $request, $id): RedirectResponse
    {
        $data = $request->validated();

        if (!empty($request->file('file'))) {
            $img = $this->upload($request->file('file'));
            $data['img'] = $img['location'];
        }

        app(AdminUpdatePromoAction::class)->run($data, $id);
        return redirect()->route('admin.promos.index');
    }

    public function destroy($id): RedirectResponse
    {
        app(AdminDeletePromoAction::class)->run($id);
        return redirect()->route('admin.promos.index');
    }

}
