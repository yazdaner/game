<?php

namespace Yazdan\Coupon\App\Http\Controllers\Home;

use Yazdan\Coupon\App\Models\Coupon;
use App\Http\Controllers\Controller;


class HomeCouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::latest()->paginate();
        return view('Coupon::front.index',compact('coupons'));
    }

    public function assetCoupon()
    {
        // $coupons = auth()->user()->coupons()->first()->pivot->count;
        $coupons = auth()->user()->coupons()->get();
        return view('Coupon::home.index',compact('coupons'));
    }
}
