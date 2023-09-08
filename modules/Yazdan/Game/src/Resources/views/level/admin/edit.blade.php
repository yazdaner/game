@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="{{ route('admin.games.index') }}" title="بازی ها">بازی ها</a></li>
<li><a href="{{ route('admin.games.details',$level->game->id) }}" title="جزِییات بازی">جزِییات بازی</a></li>
<li><a href="#" title="ایجاد مرحله">ویراش مرحله</a></li>
@endsection
@section('content')
<div class="main-content padding-0 game__detial">
    <p class="box__title">ویراش مرحله</p>
    <div class="row no-gutters">
        <div class="col-12 bg-white">
            <form action="{{ route('admin.levels.update',$level->id) }}" class="padding-30" method="post">
                @csrf
                @method('put')
                <x-input type="text" name="title" placeholder="عنوان مرحله" value="{{$level->title}}" />

                <x-input type="number" name="priority" placeholder="سطح مرحله" value="{{$level->priority}}" />

                <x-input type="number" name="minScore" placeholder="حداقل امتیاز" value="{{$level->minScore}}" />

                <x-button title="ویراش مرحله" />
            </form>
        </div>
    </div>
</div>
@endsection

