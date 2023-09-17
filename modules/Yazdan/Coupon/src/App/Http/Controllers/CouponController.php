<?php

namespace Yazdan\Coupon\App\Http\Controllers;

use Yazdan\Coupon\App\Models\Coupon;
use App\Http\Controllers\Controller;
use Yazdan\Media\Services\MediaFileService;
use Yazdan\Coupon\Repositories\CouponRepository;
use Yazdan\Coupon\App\Http\Requests\CouponRequest;

class CouponController extends Controller
{
    public function edit()
    {
        $this->authorize('manage', Coupon::class);
        $coupon = Coupon::first();
        if (is_null($coupon)) {
            abort('403');
        }
        return view('Coupon::admin.edit', compact('coupon'));
    }

    public function update(Coupon $coupon, CouponRequest $request)
    {
        $this->authorize('manage', Coupon::class);

        if ($request->hasFile('media')) {

            if ($coupon->media) {
                $coupon->media->delete();
            }
            $images = MediaFileService::publicUpload($request->media);
            $request->request->add(['media_id' => $images->id]);
        } else {
            if ($coupon->media) {
                $request->request->add(['media_id' => $coupon->media->id]);
            }
        }
        CouponRepository::update($coupon->id, $request->all());
        newFeedbacks();
        return redirect()->route("admin.coupon.edit");
    }
}
