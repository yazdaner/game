<!-- Start Social Area -->
<section class="social-area pt-100 pb-70 ">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">رسمی</span>
            <h2>در ارتباط باشید</h2>
        </div>

        <div class="row">
            @if ($setting->twitch)
            <div class="col-lg-2 col-sm-4 col-md-4 col-6">
                <div class="single-social-box">
                    <div class="content">
                        <i class="bx bxl-twitch"></i>
                        توییچ
                    </div>
                    <div class="shape">
                        <img src="/assets/img/social-shape1.png" alt="image" />
                        <img src="/assets/img/social-shape2.png" alt="image" />
                    </div>
                    <a href="{{$setting->twitch}}" target="_blank" class="link-btn"></a>
                </div>
            </div>
            @endif
            @if ($setting->facebook)

            <div class="col-lg-2 col-sm-4 col-md-4 col-6">
                <div class="single-social-box">
                    <div class="content">
                        <i class="bx bxl-facebook"></i>
                        فیسبوک
                    </div>
                    <div class="shape">
                        <img src="/assets/img/social-shape1.png" alt="image" />
                        <img src="/assets/img/social-shape3.png" alt="image" />
                    </div>
                    <a href="{{$setting->facebook}}" target="_blank" class="link-btn"></a>
                </div>
            </div>
            @endif
            @if ($setting->twitter)

            <div class="col-lg-2 col-sm-4 col-md-4 col-6">
                <div class="single-social-box">
                    <div class="content">
                        <i class="bx bxl-twitter"></i>
                        توئیتر
                    </div>
                    <div class="shape">
                        <img src="/assets/img/social-shape1.png" alt="image" />
                        <img src="/assets/img/social-shape4.png" alt="image" />
                    </div>
                    <a href="{{$setting->twitter}}" target="_blank" class="link-btn"></a>
                </div>
            </div>
            @endif
            @if ($setting->youtube)

            <div class="col-lg-2 col-sm-4 col-md-4 col-6">
                <div class="single-social-box">
                    <div class="content">
                        <i class="bx bxl-youtube"></i>
                        یوتیوب
                    </div>
                    <div class="shape">
                        <img src="/assets/img/social-shape1.png" alt="image" />
                        <img src="/assets/img/social-shape5.png" alt="image" />
                    </div>
                    <a href="{{$setting->youtube}}" target="_blank" class="link-btn"></a>
                </div>
            </div>
            @endif
            @if ($setting->instagram)

            <div class="col-lg-2 col-sm-4 col-md-4 col-6">
                <div class="single-social-box">
                    <div class="content">
                        <i class="bx bxl-instagram"></i>
                        اینستاگرام
                    </div>
                    <div class="shape">
                        <img src="/assets/img/social-shape1.png" alt="image" />
                        <img src="/assets/img/social-shape6.png" alt="image" />
                    </div>
                    <a href="{{$setting->instagram}}" target="_blank" class="link-btn"></a>
                </div>
            </div>
            @endif
            @if ($setting->telegram)
            <div class="col-lg-2 col-sm-4 col-md-4 col-6">
                <div class="single-social-box">
                    <div class="content">
                        <i class="bx bxl-telegram"></i>
                        تلگرام
                    </div>
                    <div class="shape">
                        <img src="/assets/img/social-shape1.png" alt="image" />
                        <img src="/assets/img/social-shape7.png" alt="image" />
                    </div>
                    <a href="{{$setting->instagram}}" target="_blank" class="link-btn"></a>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
<!-- End Social Area -->
