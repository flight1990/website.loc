<?php

namespace Modules\Reviews\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\Reviews\Http\Requests\CreateReviewRequest;
use Modules\Reviews\Http\Requests\UpdateReviewRequest;
use Modules\Reviews\Repositories\ReviewRepository;

class ReviewsController extends Controller
{
    protected ReviewRepository $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax() && !$request->inertia()) {
            return $this->reviewRepository->getAll(['id', 'title', 'client', 'is_active']);
        }

        return Inertia::render('Reviews::Admin/AdminReviewsIndex');
    }

    public function create()
    {
        return Inertia::render('Reviews::Admin/AdminReviewsModify');
    }

    public function store(CreateReviewRequest $request)
    {
        $this->reviewRepository->create($request->validated());

        return redirect()->route('admin.reviews.index');
    }

    public function edit($id)
    {
        $review = $this->reviewRepository->findByID($id);

        return Inertia::render('Reviews::Admin/AdminReviewsModify', [
            'review' => $review
        ]);
    }

    public function update(UpdateReviewRequest $request, $id)
    {
        $this->reviewRepository->update($request->validated(), $id);

        return redirect()->route('admin.reviews.index');
    }

    public function destroy($id)
    {
        $this->reviewRepository->delete($id);

        return redirect()->route('admin.reviews.index');
    }
}
