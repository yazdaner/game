@extends('User::front.master')
@section('content')
@include('Front::sections.navbar')

        <div class="col-lg-5 col-md-7 col-12 mx-auto my-5 mt-6">
            <div class="login-form">
                <h2 class="text-center">ورود کاربران</h2>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <x-inputHome type="text" name="email" label="نام کاربری یا ایمیل" />
                    <x-inputHome type="password" name="password" label="گذرواژه" />



                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-6 remember-me-wrap">
                            <p>
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : ''
                                    }}>
                                <label for="remember">مرا بخاطر بسپار</label>
                            </p>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 lost-your-password-wrap">
                            <a href="{{ route('password.request') }}" class="lost-your-password">فراموشی گذرواژه؟</a>
                        </div>

                    </div>

                    <button type="submit">وارد شوید</button>

                    <div class="mt-4">
                        <a href="{{ route('register') }}" class="lost-your-password">صفحه ثبت نام</a>
                    </div>
                </form>

            </div>
        </div>
@include('Front::sections.footer')

@endsection
