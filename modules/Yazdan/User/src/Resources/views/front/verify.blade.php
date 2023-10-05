@extends('User::front.master')
@section('content')

    <div class="col-lg-5 col-md-7 col-sm-9 col-12 my-5 mx-auto">
        <div class="login-form">
            <h2 class="text-center">فعال سازی حساب</h2>

            <form action="{{ route('verification.verify') }}" method="post">

                @csrf

                @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification code has been sent to your email address.') }}
                </div>
                @endif

                <div class="mb-4">
                    <p class="">کد فرستاده شده به ایمیل <span>{{auth()->user()->email}}</span>
                        را وارد کنید . ممکن است ایمیل به پوشه spam فرستاده شده باشد
                    </p>
                </div>

                <x-inputHome type="text" name="verify_code" label="کد فعال سازی" />




                <button type="submit">فعال سازی</button>
                <div class="mt-4 d-flex justify-content-between">

                <a href="#" onclick="
                event.preventDefault();
                document.getElementById('resend-code').submit();
                ">ارسال مجدد</a>

                    <a href="" class="lost-your-password"
                    onclick="
                    event.preventDefault();
                    document.getElementById('logout').submit();
                    ">خروج</a>
                </div>
            </form>
            <form id="resend-code" action="{{route('verification.resend')}}" method="post">@csrf</form>
            <form id="logout" action="{{route('logout')}}" method="post">@csrf</form>

    </div>
</div>

@endsection
