<!-- Start Products Area -->
<section class="products-area ptb-100 mt-5">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">فروشگاه</span>
            <h2>خرید کوپن</h2>
        </div>

        <div class="products-slides owl-carousel owl-theme">

            @foreach ($coupons as $coupon)

            <form action="{{ route('users.cart.add')}}" method="POST">
                @csrf
                <input type="hidden" name="productable_type" value="{{ \Crypt::encrypt(get_class($coupon)) }}">

                <input type="hidden" name="productable_id" value="{{ $coupon->id }}">

                <div class="single-products-item">
                    <div class="products-image">
                        <div class="bg-image">
                            <img src="/assets/img/products-shape.png" alt="image" />
                        </div>

                        <img src="{{$coupon->getAvatar()}}" alt="image" class="main-image" />

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
                                <span class="new-price d-block">{{number_format($coupon->finalPrice())}} تومان</span>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach



        </div>
    </div>
</section>
<!-- End Products Area -->
