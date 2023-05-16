<?php

namespace Modules\FAQ\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\FAQ\Http\Requests\CreateFAQRequest;
use Modules\FAQ\Http\Requests\UpdateFAQRequest;
use Modules\FAQ\Repositories\FAQRepository;

class FAQController extends Controller
{
    protected FAQRepository $FAQRepository;

    public function __construct(FAQRepository $FAQRepository)
    {
        $this->FAQRepository = $FAQRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax() && !$request->inertia()) {
            return $this->FAQRepository->getAll(['id', 'question', 'is_active']);
        }

        return Inertia::render('FAQ::FAQIndex');
    }

    public function create(): Response
    {
        return Inertia::render('FAQ::FAQModify');
    }

    public function store(CreateFAQRequest $request)
    {
        $this->FAQRepository->create($request->validated());

        return redirect()->route('admin.faq.index');
    }

    public function edit($id): Response
    {
        $faq = $this->FAQRepository->findByID($id);

        return Inertia::render('FAQ::FAQModify', [
            'faq' => $faq
        ]);
    }

    public function update(UpdateFAQRequest $request, $id)
    {
        $this->FAQRepository->update($request->validated(), $id);

        return redirect()->route('admin.faq.index');
    }

    public function destroy($id)
    {
        $this->FAQRepository->delete($id);

        return redirect()->route('admin.faq.index');
    }
}
