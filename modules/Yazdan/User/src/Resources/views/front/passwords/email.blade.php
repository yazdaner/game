@extends('User::front.master')

@section('content')
{{-- <form method="get" action="{{ route('password.sendVerifyCode') }}" class="form">
    <a class="account-logo" href="/">
        <img src="/img/weblogo.png" alt="">
    </a>
    <div class="form-content form-account">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <input id="email" type="email" class="txt-l txt @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="ایمیل">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <br>
        <button class="btn btn-recoverpass">بازیابی</button>
    </div>
    <div class="form-footer">
        <a href="{{route('login')}}">صفحه ورود</a>
    </div>
</form> --}}

<div class="row mt-5">
    <div class="col-lg-5 col-md-7 col-sm-9 col-10 mx-auto">
        <div class="login-form">
            <h2 class="text-center">بازیابی گذرواژه</h2>

            <form action="{{ route('password.sendVerifyCode') }}" method="get">

                @csrf
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <x-inputHome type="text" name="email" label="ایمیل" />


                <button type="submit">بازیابی</button>
                <div class="mt-4">
                    <a href="{{ route('login') }}" class="lost-your-password">صفحه ورود</a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
