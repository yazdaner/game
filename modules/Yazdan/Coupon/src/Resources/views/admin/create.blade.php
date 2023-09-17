<div class="col-4 bg-white">
    <p class="box__title">کوپن جدید</p>
    <form action="{{route('admin.coupons.store')}}" method="post" class="padding-30" enctype="multipart/form-data">
        @csrf
        <x-input type="text" name="title" placeholder="عنوان"/>
        <x-input type="number" name="price" placeholder="قیمت"/>
        <x-input type="text" name="coefficient" placeholder="ضریب (1.3)"/>
        <x-text-area name="description" placeholder="توضیحات"/>
        <x-file-upload name="media" placeholder="تصویر کوپن" />

        <button type="submit" class="btn btn-yazdan d-block">اضافه کردن</button>
    </form>
</div>
