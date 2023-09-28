@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="{{ route('admin.sliders.index') }}" title="اسلاید ها">اسلاید ها</a></li>
<li><a href="#" title="ویرایش اسلاید">ویرایش اسلاید</a></li>
@endsection
@section('content')
<div class="row no-gutters">
    <div class="col-12 bg-white">
        <p class="box__title">بروزرسانی اسلاید</p>
        <form action="{{ route('admin.sliders.update', $slider->id) }}" method="post" class="padding-30"
            enctype="multipart/form-data">
            @csrf
            @method('patch')
            <img src="{{ $slider->getAvatar(60) }}" alt="" width="80">
            <x-file-upload type="file" name="media" placeholder="تصویر" />
            <x-input type="number" name="priority" placeholder="الویت" value="{{ $slider->priority }}" />
            <x-input type="text" name="link" placeholder="لینک" value="{{ $slider->link }}" />
            <x-input type="text" name="title" placeholder="عنوان" value="{{ $slider->title }}" />
            <x-text-area name="description" placeholder="توضیحات" value="{{ $slider->description }}" />


            <p class="box__title margin-bottom-15">نوع اسلاید</p>
            <select name="type">
                @foreach ($types as $type)
                <option value="{{$type}}" {{ $slider->type == $type ? "selected" : "" }}>@lang($type)</option>
                @endforeach
            </select>

            <p class="box__title margin-bottom-15">وضعیت نمایش</p>
            <select name="status" id="status">
                <option value="1" {{ $slider->status==1 ? "selected" : "" }}>فعال</option>
                <option value="0" {{ $slider->status==0 ? "selected" : "" }}>غیرفعال</option>
            </select>

            <button class="btn btn-webamooz_net">بروزرسانی</button>
        </form>
    </div>
</div>
@endsection
