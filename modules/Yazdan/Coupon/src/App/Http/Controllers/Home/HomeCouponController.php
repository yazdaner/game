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
}
