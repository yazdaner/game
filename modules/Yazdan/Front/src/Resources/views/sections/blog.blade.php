@if ($blogs->isNotEmpty())
<!-- Start Blog Area -->
<section class="live-stream-area ptb-100 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="section-title">
            <span class="sub-title">وبلاگ</span>
            <h2>اخرین خبر ها</h2>
            <a href="{{route('blogs')}}" class="optional-btn mt-4">مشاهده همه</a>
        </div>
        <div class="live-stream-tabs">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="twitch" role="tabpanel">
                    <div class="row">
                        @if (isset($blogs[0]))
                        <div class="col-lg-7 col-md-7">
                            <div class="single-live-stream-box">
                                <img class="blog-a" src="{{$blogs[0]->getAvatar(600)}}" alt="image" />

                                <div class="content">
                                    <h3>{{$blogs[0]->title}}</h3>
                                </div>
                                <a href="{{route('blog.show',$blogs[0]->slug)}}" class="link-btn"></a>
                            </div>
                        </div>
                        @endif
                        @if (isset($blogs[1]))

                        <div class="col-lg-5 col-md-5">
                            <div class="single-live-stream-box">
                                <img class="blog-a" src="{{$blogs[1]->getAvatar(600)}}" alt="image" />

                                <div class="content">
                                    <h3>{{$blogs[1]->title}}</h3>
                                </div>

                                <a href="{{route('blog.show',$blogs[1]->slug)}}" class="link-btn"></a>

                            </div>
                        </div>
                        @endif
                        @if (isset($blogs[2]))

                        <div class="col-lg-4 col-md-6">
                            <div class="single-live-stream-box">
                                <img class="blog-b" src="{{$blogs[2]->getAvatar(600)}}" alt="image" />

                                <div class="content">
                                    <h3>{{$blogs[2]->title}}</h3>
                                </div>

                                <a href="{{route('blog.show',$blogs[2]->slug)}}" class="link-btn"></a>

                            </div>
                        </div>
                        @endif
                        @if (isset($blogs[3]))
                        <div class="col-lg-4 col-md-6">
                            <div class="single-live-stream-box">
                                <img class="blog-b" src="{{$blogs[3]->getAvatar(600)}}" alt="image" />

                                <div class="content">
                                    <h3>{{$blogs[3]->title}}</h3>
                                </div>

                                <a href="{{route('blog.show',$blogs[3]->slug)}}" class="link-btn"></a>

                            </div>
                        </div>
                        @endif
                        @if (isset($blogs[4]))
                        <div class="col-lg-4 col-md-6">
                            <div class="single-live-stream-box">
                                <img class="blog-b" src="{{$blogs[4]->getAvatar(600)}}" alt="image" />

                                <div class="content">
                                    <h3>{{$blogs[4]->title}}</h3>
                                </div>

                                <a href="{{route('blog.show',$blogs[4]->slug)}}" class="link-btn"></a>

                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog Area -->
@endif
