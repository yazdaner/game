@extends('User::front.master')

@section('content')

<div class="row mt-5">
    <div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
        <div class="login-form">
            <h2 class="text-center">بازیابی حساب</h2>

            <form action="{{ route('password.checkVerifyCode') }}" method="post">

                @csrf
                <input type="hidden" name="email" value="{{$email}}">


                @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification code has been sent to your email address.') }}
            </div>
            @endif

                <div class="mb-4">
                    <p class="">کد فرستاده شده به ایمیل <span>{{$email}}</span>
                        را وارد کنید . ممکن است ایمیل به پوشه spam فرستاده شده باشد
                    </p>
                </div>

                <x-inputHome type="text" name="verify_code" label="کد بازیابی" />

                <button type="submit">بازیابی</button>
                <div class="mt-4 d-flex justify-content-between">

                <a href="#" onclick="
                event.preventDefault();
                document.getElementById('resend-code').submit();
                ">ارسال مجدد</a>

                    <a href="{{route('login')}}">ورود</a>
                </div>
            </form>
            <form id="resend-code" action="{{route('password.sendVerifyCode.resend',$email)}}" method="get">@csrf</form>

        </div>
    </div>
</div>


@endsection
