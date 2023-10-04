@extends('User::front.master')
@section('content')
<div class="row my-5">
    <div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
        <div class="login-form">
            <h2 class="text-center">ثبت نام کاربران</h2>

            <form action="{{ route('register') }}" method="post">

                @csrf

                <x-inputHome type="text" name="name" label="نام و نام خانوادگی *" />
                <x-inputHome type="text" name="email" label="ایمیل *" />
                <x-inputHome type="text" name="mobile" label="موبایل" />
                <x-inputHome type="password" name="password" label="گذرواژه *" />
                <x-inputHome type="password" name="password_confirmation" label="تایید رمز عبور *" />

                <span class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای
                    غیر الفبا مانند !@#$%^&*() باشد.</span>

                <button type="submit">ثبت نام</button>

                <div class="mt-4">
                    <a href="{{ route('login') }}" class="lost-your-password">صفحه ورود</a>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
