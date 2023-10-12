@extends('Front::layouts.master')
@section('content')
<section class="page-title-area page-title-bg1">
    <div class="container">
        <div class="page-title-content">
            <div class="single-matches-box">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-5 col-md-12">
                        <x-game title="{{$game->title}}" img="{{$game->media->thumb(300)}}" />
                    </div>
                    <div class="col-lg-6 col-md-12 p-2">
                        <aside class="widget-area p-0">
                            <section class="widget widget_match_list">

                                <div class="single-match-list p-3 d-flex justify-content-between align-items-center"
                                    style="
                            background: #160e1c;
                        ">
                                    <h5 class="mb-0">توضیحات</h5>
                                    <h5 class="mb-0">تاریخ پایان بازی : {{($game->deadline)->diffForHumans()}}</h5>
                                </div>
                                <div class="single-match-list p-3 text-right">
                                    <span class="mr-2 text-right text-break">{!! $game->description !!}</span>
                                </div>
                            </section>

                        </aside>
                    </div>
                </div>
            </div>

        </div>
</section>
<!-- End Page Title Area -->

<section class="matches-area  ptb-100 jarallax" data-jarallax='{"speed": 0.3}' style="
background: #978e8e0f;
">
    <div class="container">
        <div class="section-title">
            <h2>گروه های بازی</h2>
        </div>
        <div class="matches-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="all-matches-tab" data-toggle="tab" href="#all-matches" role="tab"
                        aria-controls="all-matches" aria-selected="true">گروه های بازی</a>
                </li>
                @if ($records->isNotEmpty())
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="all-matches-tab" data-toggle="tab" href="#lider-board" role="tab"
                        aria-controls="all-matches" aria-selected="true">لیدر برد</a>
                </li>
                @endif
            </ul>
            <div class="tab-content p-3" id="myTabContent">
                <div class="tab-pane fade show active" id="all-matches" role="tabpanel">
                    <section class="match-details-area">
                        <div class="container">
                            <div class="row">
                                @foreach ($game->groups as $group)

                                <div class="col-lg-4 col-md-12 p-2">
                                    <aside class="widget-area p-0">
                                        <section class="widget widget_match_list">

                                            <div class="single-match-list p-3 d-flex justify-content-between align-items-center"
                                                style="background: #160e1c;">
                                                <div class="">
                                                    <h5>گروه {{$group->title}}</h5>
                                                    <p>ظرفیت : {{$group->users->count()}} / {{$group->capacity}}</p>
                                                </div>
                                                <form action="{{route('groups.subscribe',$group->id)}}" method="post">
                                                    @csrf
                                                    <button class="optional-btn px-3 py-2">عضویت</button>
                                                </form>
                                            </div>

                                            @foreach ($group->users as $user)
                                            <div class="single-match-list">
                                                <img src="{{$user->getAvatar(60)}}" class="team-1 profile_sm mr-3"
                                                    alt="image">
                                                <span class="mr-5 text-danger">{{++$loop->index}}#</span>
                                                <span class="mr-2">{{$user->username}}</span>

                                            </div>
                                            @endforeach
                                        </section>
                                    </aside>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </section>

                </div>
                @if ($records->isNotEmpty())
                <div class="tab-pane fade show" id="lider-board" role="tabpane2">
                    <section class="match-details-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 p-2 m-auto">
                                    <aside class="widget-area p-0">
                                        <section class="widget widget_match_list">

                                            <div class="single-match-list p-3 d-flex justify-content-between align-items-center"
                                                style="background: #160e1c;">
                                                <div class="">
                                                    <h5>بازی : {{$game->title}}<h5>
                                                </div>
                                            </div>

                                            @foreach ($records as $record)
                                            <div class="single-match-list">
                                                <span class="mr-5 text-danger">{{++$loop->index}}#</span>
                                                <img src="{{$record->user->getAvatar(60)}}"
                                                    class="team-1 profile_sm mr-3" alt="image">
                                                <span class="mr-2">نام : {{$record->user->name}}</span>
                                                <span> | </span>
                                                <span class="mr-2">رکورد : {{$record->claimRecord}}</span>
                                            </div>
                                            @endforeach
                                        </section>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                @endif
            </div>
        </div>
</section>
</div>
</div>
</div>
</div>
</section>

<!-- End Matches Area -->

@endsection
