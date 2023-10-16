@extends('Front::layouts.master')
@section('content')
<section class="products-area ptb-100">
    <div class="container mt-5">
        @csrf
        <div class="row">
            @foreach ($coupons as $coupon)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <form action="{{ route('users.cart.add')}}" method="POST">
                    @csrf
                    <input type="hidden" name="productable_type" value="{{ \Crypt::encrypt(get_class($coupon)) }}">

                    <input type="hidden" name="productable_id" value="{{ $coupon->id }}">

                    <div class="single-products-box">
                        <div class="products-image">
                            <a href="" class="d-block"><img src="{{$coupon->getAvatar()}}" alt="image"></a>

                            <button type="submit" class="add-to-cart-btn">افزودن سبد خرید</button>
                        </div>

                        @if ($coupon->hasDiscount())
                        <span class="hot">%{{$coupon->getDiscountPercent()}}</span>
                        @endif
                        <div class="products-content price">
                            <h3><a href="">{{$coupon->title}}</a></h3>
                            <div class="products-details-desc">
                                <div class="price">
                                    @if (! $coupon->hasDiscount())
                                    <span class="d-block">{{number_format($coupon->price)}} تومان</span>
                                    @else
                                    <span class="old-price d-block">{{number_format($coupon->price)}} تومان</span>
                                    <span class="new-price d-block">{{number_format($coupon->finalPrice())}}
                                        تومان</span>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
