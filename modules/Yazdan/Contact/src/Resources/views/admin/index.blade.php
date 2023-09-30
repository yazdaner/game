@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="{{ route('admin.contacts.index') }}" title="پیام ها">پیام ها</a></li>
@endsection
@section('content')
<div class="row no-gutters">
    <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
        <p class="box__title">پیام ها</p>
        <div class="table__box">
            <table class="table">
                <thead role="rowgroup">
                    <tr role="row" class="title-row">
                        <th>شناسه</th>
                        <th>نام</th>
                        <th>ایمیل</th>
                        <th>شماره تلفن</th>
                        <th>پیام</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr role="row" class="">
                        <td><a href="">{{ $contact->id }}</a></td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->msg }}</td>
                        <td>
                            <a href="" onclick="deleteItem(event, '{{ route('admin.contacts.destroy', $contact->id) }}')" class="item-delete mlg-15" title="حذف"></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
