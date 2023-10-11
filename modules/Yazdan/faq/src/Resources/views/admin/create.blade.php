<div class="col-4 bg-white">
    <p class="box__title">ایجاد سوال متداول جدید</p>
    <form action="{{route('admin.faqs.store')}}" method="post" class="padding-30">
        @csrf
        <x-text-area name="question" placeholder="سوال" />
        <x-text-area name="answer" placeholder="پاسخ" />

        <button type="submit" class="btn btn-yazdan">اضافه کردن</button>
    </form>
</div>
