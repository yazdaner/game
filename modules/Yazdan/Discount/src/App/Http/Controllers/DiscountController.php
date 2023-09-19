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
use Yazdan\Discount\Repositories\DiscountRepository;
use Yazdan\Discount\App\Http\Requests\DiscountRequest;

class DiscountController extends Controller
{
    public function index()
    {
        $this->authorize('manage',Discount::class);
        $discounts = DiscountRepository::paginateAll();
        $coupons = Coupon::all();
        return view('Discount::admin.index',compact('coupons','discounts'));
    }

    public function store(DiscountRequest $request)
    {
        $this->authorize('manage',Discount::class);

        DiscountRepository::store($request->all());

        newFeedbacks();

        return back();
    }

    public function edit(Discount $discount)
    {
        $this->authorize('manage',Discount::class);
        $coupons = Coupon::all();
        return view("Discount::admin.edit", compact("discount", "coupons"));
    }

    public function update(Discount $discount, DiscountRequest $request)
    {
        $this->authorize('manage',Discount::class);
        DiscountRepository::update($discount->id, $request->all());
        newFeedbacks();
        return redirect()->route("admin.discounts.index");


    }

    public function destroy(Discount $discount)
    {
        $this->authorize('manage',Discount::class);

        $discount->delete();
        return AjaxResponses::SuccessResponses();
    }

    public function check($code)
    {

        $coupons = [];
        foreach (\Cart::getContent() as $item){

            $model = get_class($item->associatedModel);
            $id = $item->associatedModel->id;
            if($model == "Yazdan\Coupon\App\Models\Coupon"){
                $coupons[] = $model::find($id);
            }
        }


        $couponsWithDiscount = [];
        foreach($coupons as $coupon){
            $discount = DiscountRepository::getValidDiscountByCode($code, $coupon->id);

            if(! is_null($discount)){
                $couponsWithDiscount[] = [
                    'coupon' => $coupon,
                    'discountPercent' => $discount->percent
                ];

            Session::put('code', $code);
            // dd(Session::get('code', $code));
            }

        }



        if($couponsWithDiscount == []){
            return response()->json([
                "status" => "invalid"
            ])->setStatusCode(422);
        }

        $responses = [];
        foreach ($couponsWithDiscount as $item){
            $discountPercent = $item['discountPercent'];
            $discountAmount = DiscountService::calculateDiscountAmount($item['coupon']->finalPrice(), $discountPercent);
             $responses[]= [
                "status" => "valid",
                "coupon" => $item['coupon']->id,
                "payableAmount" => $item['coupon']->finalPrice() - $discountAmount,
                "discountAmount" => $discountAmount,
                "discountPercent" => $discountPercent
            ];
        }
        return response()->json($responses);


    }
}
