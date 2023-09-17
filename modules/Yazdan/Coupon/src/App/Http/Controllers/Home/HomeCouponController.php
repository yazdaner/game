<?php

namespace Yazdan\Coupon\App\Http\Controllers\Home;

use Yazdan\Coupon\App\Models\Coupon;
use App\Http\Controllers\Controller;


class HomeCouponController extends Controller
{
    public function index()
    {
        $coupon = Coupon::first();
        return view('Coupon::home.index',compact('coupon'));
    }
}
