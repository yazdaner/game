@extends('Front::layouts.master')
@section('content')
<section class="products-area ptb-100">
    <div class="container mt-5">
        @csrf
        <div class="row">
            @foreach ($coupons as $coupon)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <form
                    action="{{ route('users.cart.add',['productModel' => get_class($coupon),'productId' => $coupon->id]) }}"
                    method="POST">
                    @csrf
                    <div class="single-products-box">
                        <div class="products-image">
                            <a href="single-products.html" class="d-block"><img src="{{$coupon->getAvatar()}}"
                                    alt="image"></a>

                            <button type="submit"class="add-to-cart-btn">افزودن سبد خرید</button>
                        </div>

                        <div class="products-content">
                            <h3><a href="single-products.html">{{$coupon->title}}</a></h3>
                            <span class="price">{{number_format($coupon->price)}} تومان</span>
                        </div>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
