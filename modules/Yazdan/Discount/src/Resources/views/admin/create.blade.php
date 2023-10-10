<div class="col-4 bg-white">
    <p class="box__title">ایجاد تخفیف جدید</p>
    <form action="{{ route("admin.discounts.store") }}" method="post" class="padding-30">
        @csrf

        <x-input type="text" placeholder="کد تخفیف" name="code" />
        <x-input type="number" placeholder="درصد تخفیف" name="percent" />
        <x-input type="number" placeholder="محدودیت افراد" name="usage_limitation" />

        <x-input type="number" placeholder="سقف قیمت تخفیف" name="max_amount" />
        <x-input type="number" placeholder="محدودیت تعداد" name="quantity_limitation" />


        <x-input type="text" placeholder="محدودیت زمانی" name="expire_at" class="expireAt" />




        <p class="box__title margin-top-15">این تخفیف برای</p>
        <x-validation-error field="type" />
        <div class="notificationGroup">
            <input id="discounts-field-1" class="discounts-field-pn" name="type" value="all" type="radio" />
            <label for="discounts-field-1">همه آیتم ها</label>
        </div>
        <div class="notificationGroup">
            <input id="discounts-field-2" class="discounts-field-pn" name="type" value="special" type="radio" />
            <label for="discounts-field-2">آیتم خاص</label>
        </div>
        <div class="selectCourseContainer d-none">
            <span>کوپن</span>
            <select name="coupons[]" class="mySelect2" multiple>
                @foreach($coupons as $coupon)
                <option value="{{ $coupon->id }}">{{ $coupon->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="selectCourseContainer d-none">
            <span>سکه</span>
            <select name="coins[]" class="mySelect2" multiple>
                <option value="{{ $coin->id }}">{{ $coin->title }}</option>
            </select>
        </div>


        <x-input type="text" name="link" placeholder="لینک اطلاعات بیشتر" />
        <x-input type="text" name="description" placeholder="توضیحات" class="margin-bottom-15" />



        <button class="btn btn-yazdan" type="submit">اضافه کردن</button>
    </form>
</div>
