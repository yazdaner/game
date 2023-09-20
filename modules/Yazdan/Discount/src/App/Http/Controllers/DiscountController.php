<?php

namespace Yazdan\Discount\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yazdan\Coupon\App\Models\Coupon;
use Yazdan\Course\App\Models\Course;
use Illuminate\Support\Facades\Session;
use Yazdan\Discount\App\Models\Discount;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Discount\Services\DiscountService;
use Yazdan\Coupon\Repositories\CouponRepository;
use Yazdan\Course\Repositories\CourseRepository;
use Yazdan\Discount\App\Http\Requests\CodeRequest;
use Yazdan\Discount\Repositories\DiscountRepository;
use Yazdan\Discount\App\Http\Requests\DiscountRequest;

class DiscountController extends Controller
{
    public function index()
    {
        $this->authorize('manage', Discount::class);
        $discounts = DiscountRepository::paginateAll();
        $coupons = Coupon::all();
        return view('Discount::admin.index', compact('coupons', 'discounts'));
    }

    public function store(DiscountRequest $request)
    {
        $this->authorize('manage', Discount::class);

        DiscountRepository::store($request->all());

        newFeedbacks();

        return back();
    }

    public function edit(Discount $discount)
    {
        $this->authorize('manage', Discount::class);
        $coupons = Coupon::all();
        return view("Discount::admin.edit", compact("discount", "coupons"));
    }

    public function update(Discount $discount, DiscountRequest $request)
    {
        $this->authorize('manage', Discount::class);
        DiscountRepository::update($discount->id, $request->all());
        newFeedbacks();
        return redirect()->route("admin.discounts.index");
    }

    public function destroy(Discount $discount)
    {
        $this->authorize('manage', Discount::class);

        $discount->delete();
        return AjaxResponses::SuccessResponses();
    }

    public function check(CodeRequest $request)
    {
        $coupons = [];

        foreach (\Cart::getContent() as $item) {

            $model = get_class($item->associatedModel);
            $id = $item->associatedModel->id;
            if ($model == "Yazdan\Coupon\App\Models\Coupon") {
                $coupons[] = $model::find($id);
            }
        }

        $couponsWithDiscount = [];
        foreach ($coupons as $coupon) {
            $discount = DiscountRepository::getValidDiscountByCode($request->code, $coupon->id);

            if (!is_null($discount)) {
                $couponsWithDiscount[] = [
                    'coupon' => $coupon,
                    'discountPercent' => $discount->percent
                ];
            }
        }

        if ($couponsWithDiscount == []) {
            newFeedbacks('ناموفق', 'کد تخفیف وارد شده نامعتبر می باشد', 'error');
            return back();
        }

        if (session()->has('code')) {
            session()->forget('code');
        }

        session()->put('code', $request->code);

        foreach ($couponsWithDiscount as $item) {
            $discountAmount = DiscountService::calculateDiscountAmount($item['coupon']->finalPrice(), $item['discountPercent']);
            \Cart::update("Yazdan\Coupon\App\Models\Coupon" . '-' .  $item['coupon']->id, [
                'price' => $item['coupon']->finalPrice() - $discountAmount
            ]);
        }

        newFeedbacks();
        return back();

    }
}
