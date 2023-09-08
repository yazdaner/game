@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="{{ route('admin.games.index') }}" title="بازی ها">بازی ها</a></li>
<li><a href="{{ route('admin.games.details',$game->id) }}" title="جزِییات بازی">جزِییات بازی</a></li>
<li><a href="#" title="ایجاد مرحله جدید">ایجاد مرحله جدید</a></li>
@endsection
@section('content')
<div class="main-content padding-0">
    <p class="box__title">ایجاد مرحله جدید</p>
    <div class="row no-gutters">
        <div class="col-12 bg-white">
            <form action="{{ route('admin.levels.store',$game->id) }}" class="padding-30" method="post">
                @csrf

                <x-input type="text" name="title" placeholder="عنوان مرحله" />

                <x-input type="number" name="priority" placeholder="سطح مرحله" />

                <x-input type="number" name="minScore" placeholder="حداقل امتیاز" />


                <x-button title="ایجاد مرحله" />

            </form>
        </div>
    </div>
</div>
@endsection
