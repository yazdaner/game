@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="#" title="لیدر برد">لیدر برد</a></li>
@endsection
@section('content')
<div class="main-content padding-0 liderBoards">
    <div class="row no-gutters  ">
        <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
            <p class="box__title">لیدر برد</p>
            <div class="table__box">
                <table class="table">
                    <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>کاربر</th>
                            <th>امتیاز</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($liderBoards as $key => $liderBoard)
                            <tr role="row" class="">
                                <td><a href="">{{$liderBoards->firstItem() + $key}}</a></td>
                                <td><a href="">{{$liderBoard->user->username}}</a></td>
                                <td>{{$liderBoard->score}}</td>
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
        @include('LiderBoard::create')
    </div>
</div>
@endsection
