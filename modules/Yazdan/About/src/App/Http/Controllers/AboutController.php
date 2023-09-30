<?php

namespace Yazdan\About\App\Http\Controllers;

use Yazdan\About\App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yazdan\Media\Services\MediaFileService;
use Yazdan\About\Repositories\AboutRepository;
use Yazdan\About\App\Http\Requests\AboutRequest;

class AboutController extends Controller
{
    public function edit()
    {
        $this->authorize('manage', About::class);
        $about = About::first();
        if (is_null($about)) {
            abort('403');
        }
        return view('About::admin.edit', compact('about'));
    }

    public function update(About $about, Request $request)
    {
        $this->authorize('manage', About::class);

        AboutRepository::update($about->id, $request->all());
        newFeedbacks();
        return redirect()->route("admin.about.edit");
    }


    // front
    public function about()
    {
        $about = About::first();
        return view("About::front.about",compact('about'));
    }
}
