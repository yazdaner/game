<form action="{{route('admin.groups.store',$game->id)}}" method="post" class="padding-30">
    @csrf
    <x-input type="text" name="title" placeholder="عنوان گروه" />
    <x-input type="number" name="capacity" placeholder="ظرفیت گروه" class="text-left" />
    <x-button title="اضافه کردن" />
</form>
