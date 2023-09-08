@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="{{ route('admin.games.index') }}" title="بازی ها">بازی ها</a></li>
    <li><a href="#" title="جزِییات بازی">جزِییات بازی</a></li>
@endsection
@section('content')
<div class="main-content padding-0 course__detial">
    <div class="row no-gutters">

        @include('Level::admin.index')

        <div class="col-4">

            @include('Group::admin.index')

        </div>
    </div>
</div>
@endsection

