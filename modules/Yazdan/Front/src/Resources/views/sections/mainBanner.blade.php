@if ($mainBanners->isNotEmpty())
<!-- Start Main Banner Area -->
<div class="home-slides owl-carousel owl-theme">
    @foreach ($mainBanners as $banner)
    <div class="single-banner-item banner-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12">
                    <div class="main-banner-content">
                        <h1 class="text-break">
                            {{$banner->title}}
                        </h1>
                        <p class="text-break mt-5">{{$banner->description}}</p>
                        <div class="btn-box">
                            <a href="{{$banner->link}}" class="optional-btn">مشاهده</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-md-12">
                    <div class="main-banner-image">
                        <img src="{{$banner->getAvatar(600)}}" alt="image" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- End Main Banner Area -->
@endif
