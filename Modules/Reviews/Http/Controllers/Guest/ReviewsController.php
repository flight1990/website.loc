<?php

namespace Modules\Reviews\Http\Controllers\Guest;

use Illuminate\Routing\Controller;
use Modules\Reviews\Http\Requests\CreateReviewRequest;
use Modules\Reviews\Repositories\ReviewRepository;

class ReviewsController extends Controller
{
    protected ReviewRepository $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function store(CreateReviewRequest $request)
    {
        $this->reviewRepository->create($request->validated());

        return redirect()->route('guest.pages.index');
    }
}
