@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="{{route('admin.coupons.index')}}" title="کوپن">کوپن</a></li>
    <li><a href="#" title="ویرایش">ویرایش</a></li>
@endsection
@section('content')
<div class="main-content users">
    <div class="row no-gutters bg-white">
        <div class="col-12">
        <p class="box__title">ویرایش کوپن</p>
        <form action="{{route('admin.coupons.update',$coupon->id)}}" method="post" class="padding-30" enctype="multipart/form-data">
            @csrf
            @method('put')

            <x-input type="text" name="title" placeholder="عنوان" value="{{$coupon->title}}" />
            <x-input type="number" name="price" placeholder="قیمت"  value="{{$coupon->price}}"/>
            <x-input type="text" name="coefficient" placeholder="ضریب (1.3)" value="{{$coupon->coefficient}}"/>
            <x-text-area name="description" placeholder="توضیحات" value="{{$coupon->description}}"/>
            <x-file-upload name="media" placeholder="تصویر کوپن" :value="$coupon->media"/>

            <button type="submit" class="btn btn-yazdan">ویرایش</button>
        </form>
    </div>
    </div>
</div>
@endsection
