<div class="col-4 bg-white">
    <p class="box__title">اضافه کردن گیمر به لیست</p>
    <form action="{{route('admin.liderBoards.store')}}" method="post" class="padding-30">
        @csrf
        <x-input name="userKey" type="number" placeholder="شناسه کاربر" />
        <x-input name="score" type="number" placeholder="امتیاز" />

        <button type="submit" class="btn btn-yazdan">اضافه کردن</button>
    </form>
</div>
