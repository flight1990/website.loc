<?php

namespace Modules\Reviews\Http\Controllers\Admin;

use DataTables;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\Reviews\Http\Requests\CreateReviewRequest;
use Modules\Reviews\Http\Requests\UpdateReviewRequest;
use Modules\Reviews\Models\Review;

class ReviewsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax() && !$request->inertia()) {

            $query = Review::query()
                ->select(['id', 'title', 'client', 'is_active']);

            return DataTables::eloquent($query)
                ->editColumn('is_active', function ($item) {
                    return $item->is_active ? 'Активен' : 'Не активен';
                })
                ->addColumn('actions', function ($item) {

                    $editLink = '<a href="/admin/reviews/'.$item->id.'/edit">Редактировать</a>';
                    $deleteLink = '<a href="/admin/reviews/'.$item->id.'" data-method="delete">Удалить</a>';

                    return $editLink.' '.$deleteLink;
                })
                ->rawColumns(['actions'])
                ->toJson();
        }

        return Inertia::render('Reviews::Admin/AdminReviewsIndex');
    }

    public function create()
    {
        return Inertia::render('Reviews::Admin/AdminReviewsModify');
    }

    public function store(CreateReviewRequest $request)
    {
        Review::create($request->validated());
        return redirect()->route('admin.reviews.index');
    }

    public function edit($id)
    {
        $review =  Review::query()
            ->select(['id', 'title', 'content', 'is_active', 'client'])
            ->findOrFail($id);

        return Inertia::render('Reviews::Admin/AdminReviewsModify', [
            'review' => $review
        ]);
    }

    public function update(UpdateReviewRequest $request, $id)
    {
        $review = Review::query()->findOrFail($id);
        $review->update($request->validated());

        return redirect()->route('admin.reviews.index');
    }

    public function destroy($id)
    {
        $review = Review::query()->findOrFail($id);
        $review->delete();

        return redirect()->route('admin.reviews.index');
    }
}
