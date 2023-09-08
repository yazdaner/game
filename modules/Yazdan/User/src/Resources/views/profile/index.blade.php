@extends('Home::master')
@section('content')
<h3>پروفایل</h3>
<div class="user-info padding-30 font-size-13">
    <x-user-photo />
    <form action="{{route('users.profile')}}" method="POST">
        @csrf
        @method('patch')

        <x-inputHome name="name" type="text" label="نام کاربری" value="{{auth()->user()->name}}"/>
        <x-inputHome name="email" type="text" label="ایمیل" value="{{auth()->user()->email}}" class="text-left" disabled/>

        <x-inputHome name="mobile" type="text" label="شماره موبایل" value="{{auth()->user()->mobile}}" class="text-left"/>

        <x-inputHome name="username" type="text" label="نام کاربری" value="{{auth()->user()->username}}" class="text-left"/>


        <br>
        <button class="btn">ذخیره تغییرات</button>
    </form>
</div>

@endsection

