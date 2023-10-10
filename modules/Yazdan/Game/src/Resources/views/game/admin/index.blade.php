@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="#" title="بازی ها">بازی ها</a></li>
@endsection
@section('content')
<div class="main-content padding-0 games">
    <div class="row no-gutters">
        <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
            <div class="justify-content-between box__title pb-4">
                <h3 class="btn">بازی ها</h3>
                <a class="btn btn-yazdan" href="{{route('admin.games.create')}}">ایجاد بازی</a>
            </div>
            <div class="table__box">
                <table class="table">
                    <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>تصویر</th>
                            <th>عنوان</th>
                            <th>تاریخ پایان بازی</th>
                            <th>تاریخ ثبت</th>
                            <th>جزییات</th>
                            <th>رکورد ها</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $key => $game)
                        <tr role="row" class="">
                            <td>{{$games->firstItem() + $key}}</td>

                            <td>
                                <a href="{{$game->media->thumb()}}" target="_blank"><img
                                        src="{{$game->media->thumb(60)}}" class="profile_sm"></a>
                            </td>
                            <td>{{$game->title}}</td>
                            <td>{{($game->deadline)->diffForHumans()}}</td>
                            <td>{{verta($game->created_at)->format('H:i Y/n/j')}}</td>
                            <td>
                                <a href="{{route('admin.games.details',$game->id)}}" class="btn btn-yazdan">مشاهده</a>
                            </td>
                            <td>
                                <a href="{{route('admin.games.records',$game->id)}}" class="btn btn-yazdan">مشاهده</a>
                            </td>
                            <td>
                                @can(\Yazdan\RolePermissions\Repositories\PermissionRepository::PERMISSION_MANAGE_GAMES)
                                <a href="" onclick="deleteItem(event,'{{route('admin.games.destroy',$game->id)}}')"
                                    class="item-delete mlg-10" title="حذف"></a>
                                <a href="{{route('admin.games.edit',$game->id)}}" class="item-edit" title="ویرایش"></a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
            {{ $games->links('pagination.admin') }}
        </div>
    </div>
</div>
@endsection
