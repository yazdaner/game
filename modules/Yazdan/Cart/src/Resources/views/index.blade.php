@extends('Front::layouts.master')
@section('content')
   <!-- Start Cart Area -->
   <section class="cart-area ptb-100 mt-5">
    <div class="container">
        @if(\Cart::isEmpty())
            <div class="container cart-empty-content">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <i class="sli sli-basket"></i>
                        <h2 class="font-weight-bold my-4">سبد خرید خالی است.</h2>
                        <p class="mb-40">شما هیچ کالایی در سبد خرید خود ندارید.</p>
                        <a class="btn mt-3 btn-lg btn-danger" href="{{route('coupons.index')}}"> ادامه خرید </a>
                    </div>
                </div>
            </div>
        @else
        <form action="{{ route('users.cart.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="cart-table table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">محصول</th>
                            <th scope="col">نام کالا</th>
                            <th scope="col">قیمت واحد</th>
                            <th scope="col">تعداد کالا</th>
                            <th scope="col">مجموع قیمت</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach (\Cart::getContent() as $item)
                            <tr>
                                <td class="product-thumbnail">
                                    <a href="#">
                                        <img src="{{ $item->associatedModel->getAvatar()}}" alt="item">
                                    </a>
                                </td>

                                <td class="product-name">
                                    <a href="#">{{$item->name}}</a>
                                </td>

                                <td class="product-price">
                                    <span class="unit-amount">{{$item->price}} تومان</span>
                                    @if($item->associatedModel->hasDiscount())
                                    <p class="text-error">
                                        {{ $item->associatedModel->getDiscountPercent() }}%
                                        تخفیف
                                    </p>
                                    @endif
                                </td>

                                <td class="product-quantity">
                                    <div class="input-counter">
                                        <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                        <input type="text" min="1" value="{{$item->quantity}}" name="qtybutton[{{ $item->id }}]">
                                        <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                    </div>
                                </td>

                                <td class="product-subtotal">
                                    <span class="subtotal-amount">{{$item->price * $item->quantity}} تومان</span>
                                    <a href="{{ route('users.cart.remove' , ['rowId' => $item->id]) }}" class="remove"><i class='bx bx-trash'></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="cart-buttons">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="shopping-coupon-code">
                            <input type="text" class="form-control" placeholder="کد تخفیف" name="coupon-code" id="coupon-code">
                            <button onclick="checkDiscountCode(event)">اعمال کد</button>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 text-right d-flex align-items-center">
                        <button type="submit" class="default-btn ml-4"> به روز رسانی سبد خرید </button>
                        <a href="{{ route('users.cart.clear') }}" class="default-btn">پاک کردن سبد خرید</a>
                    </div>
                </div>
            </div>

            <div class="cart-totals">
                <h3>مجموع خرید</h3>
                <ul>
                    <li>زیرمجموعه خرید <span>800000 تومان</span></li>
                    <li>کرایه حمل <span>30000 تومان</span></li>
                    <li>مجموع خرید <span>{{\Cart::getTotal()}} تومان</span></li>
                </ul>
                <a href="{{route('users.cart.buy')}}" class="default-btn">ادامه خرید</a>
            </div>
        </form>
        @endif
    </div>
</section>
{{-- <form action="{{route('discounts.check')}}" id="form-check">
    <input type="hidden" name="code" id="codeInput">
</form> --}}
<!-- End Cart Area -->

@endsection
@section('script')
<script>
    // function checkDiscountCode(event){
    //     event.preventDefault();
    //     let value = $("#coupon-code").val();
    //     $("#codeInput").val(value);
    //     $("#form-check").submit();
    // }

        function checkDiscountCode(event){
        event.preventDefault();

        const code =  $("#coupon-code").val();
        const url = "{{ route("discounts.check","code") }}";
        // $("#loading").addClass("d-none")
        // $("#response").text("")
        $.get(url.replace("code", code))
            .done(function (data) {
                console.log('success');
                //     $("#discountPercent").text( parseInt($("#discountPercent").attr("data-value")) +  data.discountPercent)
                //     $("#discountAmount").text(parseInt($("#discountAmount").attr("data-value")) + data.discountAmount)
                //     $("#payableAmount").text(parseInt($("#payableAmount").attr("data-value")) - data.discountAmount)
                // $("#response").text("کد تخفیف با موفقیت اعمال شد.").removeClass("text-red").addClass("text-green")
            })
            .fail(function (data) {
                console.log('error');
                // $("#response").text("کد وارده شده برای این آیتم معتبر نیست.").removeClass("text-green").addClass("text-red")
            })
            .always(function () {
                // $("#loading").addClass("d-none")
            });
    }
</script>
@endsection
