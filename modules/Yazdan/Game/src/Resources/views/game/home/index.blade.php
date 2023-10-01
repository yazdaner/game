@extends('Home::master')
@section('content')
<h3 class="mb-5">
    بازی ها
</h3>
@foreach ($games as $game)

<div class="single-matches-box col-md-12 mb-5">
    <x-game title="{{$game->title}}" img="{{$game->media->thumb(300)}}" link="{{route('home.records.index',$game->id)}}" class=""/>
</div>
@endforeach
@endsection

