<?php

namespace Modules\Promos\Http\Controllers\Admin;

use DataTables;
use App\Traits\FileTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Promos\Http\Requests\CreatePromoRequest;
use Modules\Promos\Http\Requests\UpdatePromoRequest;
use Modules\Promos\Models\Promo;

class PromosController extends Controller
{
    use FileTrait;

    public function index(Request $request)
    {
        if ($request->ajax() && !$request->inertia()) {

            $query = Promo::query()->select(['id', 'title', 'url', 'is_active', 'img']);

            return DataTables::eloquent($query)
                ->editColumn('img', function ($item) {
                    return "<img src='{$item->img['thumbnail']}'  alt='{$item->title}' width='200'>";
                })
                ->editColumn('is_active', function ($item) {
                    return $item->is_active ? 'Активна' : 'Не активна';
                })
                ->addColumn('actions', function ($item) {

                    $editLink = '<a href="/admin/promos/'.$item->id.'/edit" class="soft-icon-button-amber-sm">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                </a>';
                    $deleteLink = '<a href="/admin/promos/'.$item->id.'" data-method="delete" class="soft-icon-button-rose-sm">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M3 6h18"></path>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                          <path d="M10 11v6"></path>
                                          <path d="M14 11v6"></path>
                                        </svg>
                                   </a>';

                    return $editLink.' '.$deleteLink;
                })
                ->rawColumns(['actions', 'img'])
                ->toJson();
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

        Promo::create($payload);

        return redirect()->route('admin.promos.index');
    }

    public function edit($id): Response
    {
        $promo = Promo::query()
            ->select(['id', 'title', 'content', 'url', 'is_active', 'img'])
            ->findOrFail($id);

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

        $promo = Promo::query()->findOrFail($id);
        $promo->update($payload);

        return redirect()->route('admin.promos.index');
    }

    public function destroy($id): RedirectResponse
    {
        $promo = Promo::query()->findOrFail($id);
        $promo->delete();

        return redirect()->route('admin.promos.index');
    }

}
