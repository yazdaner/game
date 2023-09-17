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
                        <a class="btn mt-3 btn-lg btn-danger" href="/"> صفحه اصلی </a>
                    </div>
                </div>
            </div>
        @else
        <form>
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
                        @dd($item)
                            <tr>
                                <td class="product-thumbnail">
                                    <a href="#">
                                        <img src="assets/img/products-img1.jpg" alt="item">
                                    </a>
                                </td>

                                <td class="product-name">
                                    <a href="#">هدفون بازی</a>
                                </td>

                                <td class="product-price">
                                    <span class="unit-amount">99000 تومان</span>
                                </td>

                                <td class="product-quantity">
                                    <div class="input-counter">
                                        <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                        <input type="text" min="1" value="1">
                                        <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                    </div>
                                </td>

                                <td class="product-subtotal">
                                    <span class="subtotal-amount">99000 تومان</span>
                                    <a href="#" class="remove"><i class='bx bx-trash'></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="cart-buttons">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-sm-7 col-md-7">
                        <div class="shopping-coupon-code">
                            <input type="text" class="form-control" placeholder="کد تخفیف" name="coupon-code" id="coupon-code">
                            <button type="submit">اعمال کد</button>
                        </div>
                    </div>

                    <div class="col-lg-5 col-sm-5 col-md-5 text-right">
                        <a href="#" class="default-btn">بروزرسانی سبد خرید</a>
                    </div>
                </div>
            </div>

            <div class="cart-totals">
                <h3>مجموع خرید</h3>
                <ul>
                    <li>زیرمجموعه خرید <span>800000 تومان</span></li>
                    <li>کرایه حمل <span>30000 تومان</span></li>
                    <li>مجموع خرید <span>830000 تومان</span></li>
                </ul>
                <a href="#" class="default-btn">ادامه خرید</a>
            </div>
        </form>
        @endif
    </div>
</section>
<!-- End Cart Area -->

@endsection
@section('script')
