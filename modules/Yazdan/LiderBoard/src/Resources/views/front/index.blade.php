@extends('Front::layouts.master')
@section('content')
<section class="matches-area bg-image ptb-100 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="section-title mt-5">
            <span class="sub-title">لیدر برد فصلی</span>
            <h2>بهترین گیمر های فصل</h2>
        </div>

        <div class="matches-tabs p-3">

            <div class="tab-content" id="myTabContent">
                {{-- <div class="single-matches-box">
                    <div class="row align-items-center justify-content-between">
                        @foreach ($gamers as $gamer)
                            {{$gamer}}
                        @endforeach --}}

                <div id="lider-board" role="tabpane2">
                    <section class="match-details-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-md-12 p-2 m-auto">
                                    <aside class="widget-area p-0">
                                        <section class="widget widget_match_list">

                                            <div class="single-match-list p-3 d-flex justify-content-between align-items-center"
                                                style="background: #160e1c;">
                                                <div class="">
                                                    <h5>بهترین گیمر های فصل : <h5>
                                                </div>
                                            </div>
                                            @foreach ($liderBoards as $liderBoard)
                                            <div class="single-match-list">
                                                <span class="mr-5 text-danger">{{++$loop->index}}#</span>
                                                <img src="{{$liderBoard->user->getAvatar(60)}}"
                                                    class="team-1 profile_sm mr-3" alt="image">
                                                <span class="mr-2">نام : {{$liderBoard->user->username}}</span>
                                                <span> | </span>
                                                <span class="mr-2">مجموع امتیازات : {{$liderBoard->score}}</span>
                                            </div>
                                            @endforeach
                                        </section>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
