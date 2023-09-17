@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="#" title="کوپن">کوپن</a></li>
@endsection
@section('content')
<div class="main-content padding-0 categories">
    <div class="row no-gutters  ">
        <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
            <p class="box__title">کوپن</p>
            <div class="table__box">
                <table class="table">
                    <thead coupon="rowgroup">
                        <tr coupon="row" class="title-row">
                            <th>شناسه</th>
                            <th>تصویر</th>
                            <th>نام</th>
                            <th>قیمت</th>
                            <th>ضریب</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $key => $coupon)
                            <tr class="">
                                <td>{{$coupons->firstItem() + $key}}</td>
                                <td><img width="50" src="{{$coupon->getAvatar()}}"></td>
                                <td>{{$coupon->title}}</td>
                                <td>{{$coupon->price}}</td>
                                <td>{{$coupon->coefficient}}</td>

                                <td>
                                    <a href="" onclick="deleteItem(event,'{{route('admin.coupons.destroy',$coupon->id)}}')" class="item-delete ml-15" title="حذف"></a>
                                    <a href="{{route('admin.coupons.edit',$coupon->id)}}" class="item-edit" title="ویرایش"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $coupons->links('pagination.admin') }}
        </div>
        @include('Coupon::admin.create')
    </div>
</div>
@endsection

