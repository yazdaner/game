@extends('Front::layouts.master')
@section('content')
<section class="products-area ptb-100">
    <div class="container mt-5">

        <div class="row">
            @foreach ($coupons as $coupon)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-products-box">
                    <div class="products-image">
                        <a href="single-products.html" class="d-block"><img src="{{$coupon->getAvatar()}}" alt="image"></a>

                        <a href="#" class="add-to-cart-btn">افزودن سبد خرید</a>
                    </div>


                    <div class="products-content">
                        <h3><a href="single-products.html">{{$coupon->title}}</a></h3>
                        <span class="price">{{number_format($coupon->price)}} تومان</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

