@extends('Home::master')
@section('content')
<h3>
    بازی ها
</h3>
@foreach ($games as $game)
    <a href="{{route('home.records.index',$game->id)}}">{{$game->title}}</a><br>
@endforeach
@endsection

