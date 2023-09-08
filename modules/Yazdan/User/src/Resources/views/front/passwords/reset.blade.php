@extends('User::front.master')

@section('content')
<div class="row mt-5">
    <div class="col-lg-5 col-md-7 col-sm-9 col-10 mx-auto">
        <div class="login-form">
            <h2 class="text-center">تغییر گذرواژه</h2>

            <form action="{{ route('password.update') }}" method="post">

                @csrf

                <x-inputHome type="password" name="password" label="رمز عبور جدید" />
                <x-inputHome type="password" name="password_confirmation" label="تایید رمز عبور جدید" />

                <button type="submit">بروزرسانی رمز عبور</button>
                <div class="mt-4">
                    <a href="{{route('login')}}">ورود</a>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
