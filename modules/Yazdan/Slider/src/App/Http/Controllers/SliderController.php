<?php

namespace Yazdan\Slider\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Slider\App\Models\Slider;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Media\Services\MediaFileService;
use Yazdan\Slider\Repositories\SliderRepository;
use Yazdan\Slider\App\Http\Requests\SliderRequest;

class SliderController extends Controller
{
    public function index()
    {
        $this->authorize('manage', Slider::class);
        $sliders = SliderRepository::all();
        $types = SliderRepository::$types;
        return view("Slider::index", compact('sliders','types'));
    }

    public function store(SliderRequest $request)
    {
        $this->authorize('manage', Slider::class);
        $request->request->add(['media_id' => MediaFileService::publicUpload($request->file('media'))->id]);
        SliderRepository::store($request);
        newFeedbacks();
        return redirect()->route('admin.sliders.index');
    }

    public function edit(Slider $slider)
    {
        $this->authorize('manage', Slider::class);
        $types = SliderRepository::$types;
        return view("Slider::edit", compact('slider','types'));

    }

    public function update(Slider $slider, SliderRequest $request)
    {
        $this->authorize('manage', Slider::class);

        if ($request->hasFile('media')) {
            $request->request->add(['media_id' => MediaFileService::publicUpload($request->file('media'))->id]);
            if ($slider->media)
                $slider->media->delete();
        } else {
            $request->request->add(['media_id' => $slider->media_id]);
        }

        SliderRepository::update($slider->id, $request);
        newFeedbacks();
        return redirect()->route('admin.sliders.index');
    }

    public function destroy(Slider $slider)
    {
        $this->authorize('manage', Slider::class);
        if ($slider->media) {
            $slider->media->delete();
        }
        $slider->delete();

        return AjaxResponses::SuccessResponses();
    }
}
