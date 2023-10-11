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
                <div class="single-matches-box">
                    <div class="row align-items-center justify-content-between">
                        @foreach ($gamers as $gamer)
                            {{$gamer}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

