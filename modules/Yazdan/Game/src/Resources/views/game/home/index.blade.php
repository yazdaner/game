@extends('Home::master')
@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <h3 class="mb-0">
        ارسال رکورد
    </h3>
    <a href="{{route('games')}}" class="btn btn-primary btn-lg">عضویت در بازی ها</a>
</div>
@foreach ($games as $game)

<div class="single-matches-box col-md-12 mb-5">
    <x-game title="{{$game->title}}" img="{{$game->media->thumb(300)}}" link="{{route('home.records.index',$game->id)}}" class=""/>
</div>
@endforeach
@endsection

