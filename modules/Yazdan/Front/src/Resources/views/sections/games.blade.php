<!-- Start Games -->
<section class="matches-area bg-image ptb-100 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="section-title">
            <span class="sub-title">بازی ها</span>
            <h2>بازی های پرطرفدار</h2>
        </div>

        <div class="matches-tabs p-5">


            <div class="tab-content p-5" id="myTabContent">
                <div class="single-matches-box">
                    <div class="row align-items-center justify-content-between ">

                        @foreach ($games as $game)

                        @if($loop->iteration % 2 != 0)
                        <div class="col-lg-6 col-md-12 mb-5">
                            <x-game title="{{$game->title}}" img="{{$game->media->thumb(300)}}" link="{{route('games.show',$game->id)}}" />
                        </div>
                        @else
                        <div class="col-lg-6 col-md-12 mb-5">
                            <x-game title="{{$game->title}}" img="{{$game->media->thumb(300)}}" link="{{route('games.show',$game->id)}}" class="right-image" />
                        </div>
                        @endif



                        @endforeach

                    </div>
                </div>

                <div class="tab-pane fade" id="upcoming-matches" role="tabpanel">
                    <!-- todo -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Games -->
