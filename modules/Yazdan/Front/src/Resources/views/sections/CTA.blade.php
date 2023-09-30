@if($cta)
<!-- Start CTA -->
<section class="featured-games-area ptb-100">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">ویترین</span>
            <h2>بازی های برجسته ما</h2>
        </div>

        <div class="featured-games-inner">
            <div class="row m-0 align-items-center">
                <div class="col-lg-7 col-md-12 p-0">
                    <div class="featured-games-image text-center">
                        <img class="w-100" src="{{$cta->getAvatar(300)}}" alt="image" />
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 p-0">
                    <div class="featured-games-content">
                        <div class="content">
                            <h2>
                                <a class="text-break" href="{{$cta->link}}">{{$cta->title}}</a>
                            </h2>
                            <p class="text-break">{{$cta->description}}</p>
                            <a href="{{$cta->link}}" class="read-more-btn">مشاهده <i class="flaticon-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End CTA -->
@endif
