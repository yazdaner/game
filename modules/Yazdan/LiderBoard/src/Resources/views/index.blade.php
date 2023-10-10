@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="#" title="دسته بندی ها">دسته بندی ها</a></li>
@endsection
@section('content')
<div class="main-content padding-0 liderBoards">
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
                        @foreach ($liderBoards as $key => $liderBoard)
                            <tr role="row" class="">
                                <td><a href="">{{$liderBoards->firstItem() + $key}}</a></td>
                                <td><a href="">{{$liderBoard->title}}</a></td>
                                <td>{{$liderBoard->slug}}</td>
                                <td>{{$liderBoard->parent}}</td>
                                <td>
                                    <a href="" onclick="deleteItem(event,'{{route('admin.liderBoards.destroy',$liderBoard->id)}}')" class="item-delete mlg-15" title="حذف"></a>
                                    <a href="{{route('admin.liderBoards.edit',$liderBoard->id)}}" class="item-edit" title="ویرایش"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $liderBoards->links('pagination.admin') }}
        </div>
        @include('liderBoard::create')
    </div>
</div>
@endsection
