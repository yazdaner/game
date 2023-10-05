@extends('User::front.master')

@section('content')
    <div class="col-lg-5 col-md-7 col-sm-9 col-12 my-5 mx-auto">
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
@endsection
