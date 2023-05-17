<?php

namespace Modules\FAQ\Http\Controllers\Admin;

use DataTables;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\FAQ\Http\Requests\CreateFAQRequest;
use Modules\FAQ\Http\Requests\UpdateFAQRequest;
use Modules\FAQ\Models\Faq;

class FAQController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax() && !$request->inertia()) {

            $query = Faq::query()
                ->select(['id', 'question', 'is_active']);

            return DataTables::eloquent($query)
                ->editColumn('is_active', function ($item) {
                    return $item->is_active ? 'Активен' : 'Не активен';
                })
                ->addColumn('actions', function ($item) {

                    $editLink = '<a href="/admin/faq/'.$item->id.'/edit">Редактировать</a>';
                    $deleteLink = '<a href="/admin/faq/'.$item->id.'" data-method="delete">Удалить</a>';

                    return $editLink.' '.$deleteLink;
                })
                ->rawColumns(['actions'])
                ->toJson();
        }

        return Inertia::render('FAQ::Admin/AdminFAQIndex');
    }

    public function create(): Response
    {
        return Inertia::render('FAQ::Admin/AdminFAQModify');
    }

    public function store(CreateFAQRequest $request)
    {
        Faq::create($request->validated());

        return redirect()->route('admin.faq.index');
    }

    public function edit($id): Response
    {
        $faq = Faq::query()
            ->select(['id', 'question', 'answer', 'is_active'])
            ->findOrFail($id);

        return Inertia::render('FAQ::Admin/AdminFAQModify', [
            'faq' => $faq
        ]);
    }

    public function update(UpdateFAQRequest $request, $id)
    {
        $faq = Faq::query()->findOrFail($id);
        $faq->update($request->validated());

        return redirect()->route('admin.faq.index');
    }

    public function destroy($id)
    {
        $faq = Faq::query()->findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faq.index');
    }
}
