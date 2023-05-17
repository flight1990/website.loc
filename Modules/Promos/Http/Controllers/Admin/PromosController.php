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
                    return "<img src='{$item->img}'  alt='{$item->title}' width='200'>";
                })
                ->editColumn('is_active', function ($item) {
                    return $item->is_active ? 'Активна' : 'Не активна';
                })
                ->addColumn('actions', function ($item) {

                    $editLink = '<a href="/admin/promos/'.$item->id.'/edit">Редактировать</a>';
                    $deleteLink = '<a href="/admin/promos/'.$item->id.'" data-method="delete">Удалить</a>';

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
