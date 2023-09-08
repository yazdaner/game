<div class="col-8 bg-white padding-30 margin-left-10 margin-bottom-15 border-radius-3">
    <div class="margin-bottom-20 flex-wrap flex-space-between font-size-14 d-flex bg-white padding-0">
        <h3 class="mlg-15">{{$game->title}}</h3>
        <a class="btn btn-yazdan" href="{{route('admin.levels.create',$game->id)}}">ایجاد مرحله جدید</a>
    </div>


    <div class="table__box">
        <table class="table">
            <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>سطح مرحله</th>
                    <th>عنوان مرحله</th>
                    <th>حداقل امتیاز</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($levels as $level)
                <tr role="row">
                    <td><a href="">{{$level->priority}}</a></td>
                    <td><a href="">{{$level->title}}</a></td>
                    <td><a href="">{{$level->minScore}}</a></td>
                    <td>
                        <a href="" onclick="deleteItem(event,'{{route('admin.levels.destroy',$level->id)}}')"
                            class="item-delete mlg-10" title="حذف"></a>

                        <a href="{{route('admin.levels.edit',$level->id)}}" class="item-edit" title="ویرایش"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$levels->links('pagination.admin')}}
</div>
