@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="#" title="بلاگ ها">بلاگ ها</a></li>
@endsection
@section('content')
<div class="main-content padding-0">
    <div class="row no-gutters">
        <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
            <div class="justify-content-between box__title pb-4">
                <h3 class="btn">بلاگ ها</h3>
                <a class="btn btn-yazdan" href="{{route('admin.blogs.create')}}">ایجاد بلاگ</a>
            </div>
            <div class="table__box">
                <table class="table">
                    <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام بلاگ</th>
                            <th>نام انگلیسی بلاگ</th>
                            <th>دسته پدر</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $key => $blog)
                            <tr role="row" class="">
                                <td><a href="">{{$blogs->firstItem() + $key}}</a></td>
                                <td><a href="">{{$blog->title}}</a></td>
                                <td>{{$blog->slug}}</td>
                                <td>{{$blog->parent}}</td>
                                <td>
                                    <a href="" onclick="deleteItem(event,'{{route('admin.blogs.destroy',$blog->id)}}')" class="item-delete mlg-15" title="حذف"></a>
                                    <a href="{{route('admin.blogs.edit',$blog->id)}}" class="item-edit" title="ویرایش"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $blogs->links('pagination.admin') }}
        </div>
    </div>
</div>
@endsection
