@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="#" title="دسته بندی ها">دسته بندی ها</a></li>
@endsection
@section('content')
<div class="main-content padding-0 blogs">
    <div class="row no-gutters  ">
        <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
            <p class="box__title">دسته بندی ها</p>
            <div class="table__box">
                <table class="table">
                    <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام دسته بندی</th>
                            <th>نام انگلیسی دسته بندی</th>
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
