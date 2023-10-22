<?php

namespace Yazdan\Coupon\App\Http\Controllers;

use Yazdan\User\App\Models\User;
use App\Http\Controllers\Controller;
use Yazdan\Coupon\App\Models\Coupon;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Media\Services\MediaFileService;
use Yazdan\Coupon\Repositories\CouponRepository;
use Yazdan\Coupon\App\Http\Requests\CouponRequest;

class CouponController extends Controller
{

    public function index()
    {
        $this->authorize('manage', Coupon::class);
        $coupons = Coupon::latest()->paginate();
        return view('Coupon::admin.index', compact('coupons'));
    }

    public function store(CouponRequest $request)
    {
        $this->authorize('manage', Coupon::class);

        if (isset($request->media)) {
            $images = MediaFileService::publicUpload($request->media);
            if ($images == false) {
                newFeedbacks('نا موفق', 'فرمت فایل نامعتبر میباشد', 'error');
                return back();
            }
            $request->request->add(['media_id' => $images->id]);
        }
        CouponRepository::store($request);

        newFeedbacks();
        return redirect(route('admin.coupons.index'));
    }

    public function edit($id)
    {
        $this->authorize('manage', Coupon::class);
        $coupon = CouponRepository::findById($id);
        return view('Coupon::admin.edit', compact('coupon'));
    }

    public function update(Coupon $coupon, CouponRequest $request)
    {
        $this->authorize('manage', Coupon::class);

        if ($request->hasFile('media')) {
            $images = MediaFileService::publicUpload($request->media);
            if ($images == false) {
                newFeedbacks('نا موفق', 'فرمت فایل نامعتبر میباشد', 'error');
                return back();
            }
            if ($coupon->media) {
                $coupon->media->delete();
            }
            $request->request->add(['media_id' => $images->id]);
        } else {
            if ($coupon->media && $coupon->media->id) {
                $request->request->add(['media_id' => $coupon->media->id]);
            }
        }
        CouponRepository::update($coupon->id, $request->all());
        newFeedbacks();
        return redirect()->route("admin.coupons.index");
    }


    public function destroy($id)
    {
        $this->authorize('manage', Coupon::class);
        $coupon = CouponRepository::findById($id);
        if ($coupon->media) {
            $coupon->media->delete();
        }
        $coupon->delete();
        return AjaxResponses::SuccessResponses();
    }
}
