@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="#" title="سوالات متداول">سوالات متداول</a></li>
@endsection
@section('content')
<div class="main-content padding-0">
    <div class="row no-gutters  ">
        <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
            <p class="box__title">سوالات متداول</p>
            <div class="table__box">
                <table class="table">
                    <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>سوال</th>
                            <th>پاسخ</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $key => $faq)
                            <tr role="row" class="">
                                <td><a href="">{{$faqs->firstItem() + $key}}</a></td>
                                <td>{{$faq->question}}</td>
                                <td>{{$faq->answer}}</td>
                                <td>
                                    <a href="" onclick="deleteItem(event,'{{route('admin.faqs.destroy',$faq->id)}}')" class="item-delete mlg-15" title="حذف"></a>
                                    <a href="{{route('admin.faqs.edit',$faq->id)}}" class="item-edit" title="ویرایش"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $faqs->links('pagination.admin') }}
        </div>
        @include('Faq::create')
    </div>
</div>
@endsection
