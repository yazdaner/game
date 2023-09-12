@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="{{ route('admin.games.index') }}" title="بازی ها">بازی ها</a></li>
<li><a href="#" title="رکورد های بازی">رکورد های بازی</a></li>
@endsection
@section('content')
<div class="main-content padding-0 games">
    <div class="row no-gutters">
        <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
            <div class="justify-content-between box__title pb-4">
                <h3 class="btn">{{$game->title}}</h3>
            </div>
            <div class="table__box">
                <table class="table">
                    <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>کاربر</th>
                            <th>عنوان مرحله</th>
                            <th>رکورد ادعایی</th>
                            <th>حداقل رکورد مرحله</th>
                            <th>تاریخ</th>
                            <th>وضعیت</th>
                            <th>سند</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $key => $record)
                        <tr role="row">
                            <td>{{$records->firstItem() + $key}}</td>
                            <td>{{$record->user->name}}</td>
                            <td>{{$record->level->title}}</td>
                            <td>{{$record->claimRecord}}</td>
                            <td>{{$record->level->minScore}}</td>
                            <td>{{$record->created_at->diffForHumans()}}</td>
                            <td class="confirmation_status"><span
                                class="{{$record->status()}}">{{__($record->status)}}</span></td>
                            <td>
                                <a class="btn btn-yazdan" href="{{$record->media->thumb()}}" target="_blank">فایل ضمیمه</a>
                            </td>
                            <td>
                                @can(\Yazdan\RolePermissions\Repositories\PermissionRepository::PERMISSION_MANAGE_RECORD)
                                <a href="" onclick="deleteItem(event,'{{route('admin.records.destroy',$record->id)}}')"
                                    class="item-delete mlg-10" title="حذف"></a>
                                <a href=""
                                    onclick="UpdateConfirmationStatus(event,'{{route('admin.records.rejected',$record->id)}}','رد شده','آیا از رد این آیتم اطمینان دارید ؟')"
                                    class="item-reject mlg-10" title="رد"></a>
                                <a href=""
                                    onclick="UpdateConfirmationStatus(event,'{{route('admin.records.accepted',$record->id)}}','تایید شده','آیا از تایید این آیتم اطمینان دارید ؟')"
                                    class="item-confirm mlg-10" title="تایید"></a>
                                @endcan

                            </td>

                        </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>
            {{ $records->links('pagination.admin') }}
        </div>
    </div>
</div>
@endsection
