<?php

namespace Yazdan\Coupon\App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Yazdan\Coupon\App\Models\Coupon;


class HomeCouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::latest()->paginate();
        return view('Coupon::front.index',compact('coupons'));
    }

    public function assetCoupon()
    {
        $coupons = auth()->user()->coupons()->get();
        return view('Coupon::home.index',compact('coupons'));
    }
}
