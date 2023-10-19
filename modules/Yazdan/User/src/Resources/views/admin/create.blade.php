@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="{{ route('admin.users.index') }}" title="کاربران">کاربران</a></li>
<li><a href="#" title="ایجاد کاربر">ایجاد کاربر</a></li>
@endsection
@section('content')
<div class="row no-gutters">
    <div class="col-12 bg-white">
        <p class="box__title">ایجاد کاربر</p>
        <form action="{{ route('admin.users.store') }}" class="padding-30" method="post" enctype="multipart/form-data">
            @csrf
            <x-input type="number" name="key" placeholder="کد عضویت"/>

            <x-input type="text" name="name" placeholder="نام"/>

            <x-input type="email" name="email" placeholder="ایمیل"/>

            <x-input type="text" name="username" placeholder="نام کاربری"/>

            <x-input type="text" name="mobile" placeholder="شماره موبایل"/>

            <x-input type="text" name="password" placeholder="پسورد"/>

            <br>
            <x-file-upload name="media" placeholder="آپلود عکس کاربر" />

            <x-select name="status" placeholder="وضعیت کاربر">
                @foreach ($statuses as $status)
                    <option value="{{$status}}">@lang($status)</option>
                @endforeach
            </x-select>
            <button class="btn btn-yazdan">ایجاد کاربر</button>
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="/panel/js/tagsInput.js"></script>
@include('Common::layouts.feedbacks')
@endsection
