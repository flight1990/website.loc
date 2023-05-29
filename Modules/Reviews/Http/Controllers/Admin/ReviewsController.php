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

                    $editLink = '<a href="/admin/reviews/'.$item->id.'/edit" class="soft-icon-button-amber-sm">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                 </a>';
                    $deleteLink = '<a href="/admin/reviews/'.$item->id.'" data-method="delete" class="soft-icon-button-rose-sm">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M3 6h18"></path>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                          <path d="M10 11v6"></path>
                                          <path d="M14 11v6"></path>
                                        </svg>
                                   </a>';

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
