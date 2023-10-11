<?php

namespace Yazdan\Faq\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Faq\App\Http\Requests\FaqRequest;
use Yazdan\Faq\App\Models\Faq;
use Yazdan\Faq\Repositories\FaqRepository;
use Yazdan\Common\Responses\AjaxResponses;

class FaqController extends Controller
{

    public function index()
    {
        $this->authorize('manage', Faq::class);
        $faqs = FaqRepository::getAllPaginate(10);
        return view('Faq::admin.index', compact('faqs'));
    }

    public function store(FaqRequest $request)
    {
        $this->authorize('manage', Faq::class);
        FaqRepository::create($request);
        newFeedbacks();
        return back();
    }

    public function edit($FaqId)
    {
        $this->authorize('manage', Faq::class);
        $faq = FaqRepository::findById($FaqId);
        return view('Faq::admin.edit', compact('faq'));
    }

    public function update($FaqId, FaqRequest $request)
    {
        $this->authorize('manage', Faq::class);
        FaqRepository::updating($FaqId, $request);
        newFeedbacks();
        return redirect(route('admin.faqs.index'));
    }

    public function destroy($FaqId)
    {
        $this->authorize('manage', Faq::class);
        FaqRepository::delete($FaqId);
        return AjaxResponses::SuccessResponses();
    }

    // front

    public function show()
    {
        $faqs = FaqRepository::getAll();
        return view('Faq::front.index', compact('faqs'));
    }
}
