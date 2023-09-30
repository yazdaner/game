@extends('Front::layouts.master')
@section('content')
<section class="contact-area ptb-100 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="contact-info">
                    <span class="sub-title">جزئیات تماس با  ما</span>
                    <h2>در تماس باشید</h2>
                    <p>{{$setting->description}}</p>

                    <ul>
                        <li>
                            <div class="icon">
                                <i class="flaticon-location"></i>
                            </div>
                            <h3>آدرس ما</h3>
                            <p>{{$setting->address}}</p>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="flaticon-24-hours"></i>
                            </div>
                            <h3>تماس بگیرید</h3>
                            <p>موبایل: <a href="tel:{{$setting->telephone}}">{{$setting->telephone}}</a></p>
                            <p>ایمیل: <a href="mailto:{{$setting->email}}">{{$setting->email}}</a></p>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="flaticon-network"></i>
                            </div>
                            <h3>اجتماعی</h3>
                            <div class="social-box">
                                @if ($setting->twitch)
                                <a href="{{$setting->twitch}}" target="_blank"><i class="bx bxl-twitch"></i></a>
                                @endif
                                @if ($setting->facebook)
                                <a href="{{$setting->facebook}}" target="_blank"><i class="bx bxl-facebook"></i></a>
                                @endif
                                @if ($setting->twitter)
                                <a href="{{$setting->twitter}}" target="_blank"><i class="bx bxl-twitter"></i></a>
                                @endif
                                @if ($setting->youtube)
                                <a href="{{$setting->youtube}}" target="_blank"><i class="bx bxl-youtube"></i></a>
                                @endif
                                @if ($setting->instagram)
                                <a href="{{$setting->instagram}}" target="_blank"><i class="bx bxl-instagram"></i></a>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            @include("Contact::front.form")
        </div>
    </div>
</section>
@endsection
