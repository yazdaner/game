@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="{{route('admin.liderBoards.index')}}" title="لیدر برد">لیدر برد</a></li>
    <li><a href="#" title="ویرایش">ویرایش</a></li>
@endsection
@section('content')
    <div class="col-4 bg-white margin-top-30 margin-auto">
        <p class="box__title">ویرایش گیمر</p>
        <form action="{{route('admin.liderBoards.update',$liderBoard->id)}}" method="post" class="padding-30">
            @csrf
            @method('put')
            <x-input value="{{$liderBoard->user->key}}" name="userKey" type="number" placeholder="شناسه کاربر" />

            <x-input value="{{$liderBoard->score}}" name="score" type="number" placeholder="امتیاز" />

            <button type="submit" class="btn btn-yazdan">ویرایش</button>
        </form>
    </div>
@endsection
