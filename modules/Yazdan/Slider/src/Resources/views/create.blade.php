<p class="box__title">ایجاد اسلاید جدید</p>
<form action="{{ route('admin.sliders.store') }}" method="post" class="padding-30" enctype="multipart/form-data">
    @csrf
    <x-file-upload type="file" name="media" required placeholder="تصویر"/>
    <x-input type="number" name="priority" placeholder="الویت"/>
    <x-input type="text" name="link"  placeholder="لینک"/>
    <x-input type="text" name="title"  placeholder="عنوان"/>
    <x-text-area name="description" placeholder="توضیحات" />

    <p class="box__title margin-bottom-15">نوع اسلاید</p>
    <select name="type">
        @foreach ($types as $type)
            <option value="{{$type}}">@lang($type)</option>
        @endforeach
    </select>

    <p class="box__title margin-bottom-15">وضعیت نمایش</p>
    <select name="status" id="status">
        <option value="1" selected>فعال</option>
        <option value="0" >غیرفعال</option>
    </select>
    <button class="btn btn-webamooz_net">اضافه کردن</button>
</form>
