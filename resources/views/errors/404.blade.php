@extends('Front::layouts.master')
@section('content')
<!-- Start Error 404 Area -->
<section class="error-area mt-5">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="error-content">
                    <img src="/assets/img/error.png" alt="image">
                    <h3>صفحه یافت نشد</h3>
                    <p>صفحه ای که به دنبال آن هستید ممکن است در صورت تغییر نام آن حذف شده باشد یا به طور موقت در دسترس نباشد.</p>
                    <a href="/" class="default-btn">بازگشت به خانه</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Error 404 Area -->
@endsection
