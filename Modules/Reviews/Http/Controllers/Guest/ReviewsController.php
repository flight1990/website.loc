<?php

namespace Modules\Reviews\Http\Controllers\Guest;

use Illuminate\Routing\Controller;
use Modules\Reviews\Http\Requests\CreateReviewRequest;
use Modules\Reviews\Models\Review;

class ReviewsController extends Controller
{
    public function store(CreateReviewRequest $request)
    {
        Review::create($request->validated());
        return redirect()->route('guest.pages.index');
    }
}
