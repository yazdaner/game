@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="{{route('admin.categories.index')}}" title="دسته بندی ها">دسته بندی ها</a></li>
    <li><a href="#" title="ویرایش">ویرایش</a></li>
@endsection
@section('content')
    <div class="col-4 bg-white margin-top-30 margin-auto">
        <p class="box__title">ویرایش دسته بندی</p>
        <form action="{{route('admin.categories.update',$category->id)}}" method="post" class="padding-30">
            @csrf
            @method('put')
            <x-input value="{{$category->title}}" name="title" type="text" placeholder="نام دسته بندی" />


            <x-input value="{{$category->slug}}" name="slug" type="text" placeholder="نام انگلیسی دسته بندی" />


            <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
            <select name="parent_id" id="parent_id">
                <option value="">ندارد</option>
                @foreach ($parentCategories as $item)
                    <option {{$category->parent_id == $item->id ? 'selected' : '' ;}} value="{{$item->id}}">{{$item->title}}</option>
                @endforeach
            </select>

            @error('parent_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror

            <button type="submit" class="btn btn-yazdan">ویرایش</button>
        </form>
    </div>
@endsection
