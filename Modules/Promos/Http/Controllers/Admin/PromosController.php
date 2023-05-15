<?php

namespace Modules\Promos\Http\Controllers\Admin;

use App\Traits\FileTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Promos\Http\Requests\CreatePromoRequest;
use Modules\Promos\Http\Requests\UpdatePromoRequest;
use Modules\Promos\Repositories\PromoRepository;

class PromosController extends Controller
{
    use FileTrait;

    protected PromoRepository $promoRepository;

    public function __construct(PromoRepository $promoRepository)
    {
        $this->promoRepository = $promoRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax() && !$request->inertia()) {
            return $this->promoRepository->getAll(['id', 'title', 'url', 'is_active', 'img']);
        }

        return Inertia::render('Promos::Admin/AdminPromosIndex');
    }

    public function create(): Response
    {
        return Inertia::render('Promos::Admin/AdminPromosModify');
    }

    public function store(CreatePromoRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        if (!empty($request->file('file'))) {
            $img = $this->upload($request->file('file'));
            $payload['img'] = $img['location'];
        }

        $this->promoRepository->create($payload);

        return redirect()->route('admin.promos.index');
    }

    public function edit($id): Response
    {
        $promo = $this->promoRepository->findByID($id);

        return Inertia::render('Promos::Admin/AdminPromosModify', [
            'promo' => $promo
        ]);
    }

    public function update(UpdatePromoRequest $request, $id): RedirectResponse
    {
        $payload = $request->validated();

        if (!empty($request->file('file'))) {
            $img = $this->upload($request->file('file'));
            $payload['img'] = $img['location'];
        }

        $this->promoRepository->update($payload, $id);

        return redirect()->route('admin.promos.index');
    }

    public function destroy($id): RedirectResponse
    {
        $this->promoRepository->delete($id);

        return redirect()->route('admin.promos.index');
    }

}
