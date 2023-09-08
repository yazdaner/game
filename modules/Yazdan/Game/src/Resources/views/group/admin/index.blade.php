<div class="col-12 bg-white margin-bottom-15 border-radius-3">
    <p class="box__title">گروه ها</p>
    @include('Group::admin.create')
    <div class="table__box padding-30">
        <table class="table">
            <thead role="rowgroup">
            <tr role="row" class="title-row">
                <th>عنوان گروه</th>
                <th>ظرفیت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($game->groups as $group)
                <tr>
                    <td><a href="">{{$group->title}}</a></td>
                    <td><a href="">{{$group->capacity}}</a></td>
                    <td>
                        <a href="" onclick="deleteItem(event,'{{route('admin.groups.destroy',$group->id)}}')" class="item-delete mlg-10" title="حذف"></a>
                        <a href="{{route('admin.groups.edit',$group->id)}}" class="item-edit mlg-10" title="ویرایش"></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>
