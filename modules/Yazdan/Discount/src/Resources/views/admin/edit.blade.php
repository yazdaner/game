@extends("Dashboard::master")
@section('breadcrumb')
<li><a href="{{ route('admin.discounts.index') }}" title="تخفیف ها">تخفیف ها</a></li>
<li><a href="#" title="ویرایش تخفیف">ویرایش تخفیف</a></li>
@endsection
@section("content")
  <div class="main-content">
    <div class="col-12 bg-white">
        <p class="box__title">ویرایش کد تخفیف</p>
        <form action="{{ route("admin.discounts.update", $discount->id) }}" method="post" class="padding-30">
            @csrf
            @method("put")
            <x-input type="text" placeholder="کد تخفیف" name="code" value="{{ $discount->code }}"/>
            <x-input type="number" placeholder="درصد تخفیف" name="percent" required value="{{ $discount->percent }}" />
            <x-input type="number" placeholder="محدودیت افراد" name="usage_limitation" value="{{ $discount->usage_limitation }}" />

            <x-input type="number" placeholder="سقف قیمت تخفیف" name="max_amount" value="{{ $discount->max_amount }}"/>
            <x-input type="number" placeholder="محدودیت تعداد" name="quantity_limitation" value="{{ $discount->quantity_limitation }}" />


            <x-input type="text" class="expireAt" id="expire_at" placeholder="محدودیت زمانی" name="expire_at"
                value="{{ $discount->expire_at ? fromCarbon($discount->expire_at) : '' }}" />

           <p class="box__title">این تخفیف برای</p>
           <x-validation-error field="type"/>
            <div class="notificationGroup">
                <input id="discounts-field-1" class="discounts-field-pn" name="type" value="all" type="radio" {{ $discount->type == \Yazdan\Discount\Repositories\DiscountRepository::TYPE_ALL ? "checked" : "" }}/>
                <label for="discounts-field-1">همه دوره ها</label>
            </div>

            <div class="notificationGroup">
                <input id="discounts-field-2" class="discounts-field-pn" name="type" value="special" type="radio" {{ $discount->type == \Yazdan\Discount\Repositories\DiscountRepository::TYPE_SPECIAL ? "checked" : "" }}/>
                <label for="discounts-field-2">دوره خاص</label>
            </div>
            <div class="selectCourseContainer {{ $discount->type == \Yazdan\Discount\Repositories\DiscountRepository::TYPE_ALL ? "d-none" : "" }}">
            <span>کوپن</span>

                <select name="coupons[]" class="mySelect2" multiple>
                    @foreach($coupons as $coupon)
                        <option value="{{ $coupon->id }}" {{ $discount->coupons->contains($coupon->id) ? "selected" : "" }}>{{ $coupon->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="selectCourseContainer {{ $discount->type == \Yazdan\Discount\Repositories\DiscountRepository::TYPE_ALL ? "d-none" : "" }}">
            <span>سکه</span>
                <select name="coins[]" class="mySelect2" multiple>
                    <option value="{{ $coin->id }}" {{ $discount->coins->contains($coin->id) ? "selected" : "" }}>{{ $coin->title }}</option>
                </select>
            </div>
            <x-input type="text" name="link" placeholder="لینک اطلاعات بیشتر" value="{{ $discount->link }}" />
            <x-input type="text" name="description" placeholder="توضیحات" class="margin-bottom-15" value="{{ $discount->description }}"/>

            <button type="submit" class="btn btn-yazdan">بروزرسانی</button>
        </form>
    </div>
  </div>
@endsection

@section('style')
<link rel="stylesheet" href="/panel/css/persian-datepicker.min.css" />
@endsection

@section('script')
<script src="/panel/js/persian-date.min.js"></script>
<script src="/panel/js/persian-datepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('.expireAt').persianDatepicker({
        initialValue: false,
        observer: true,
        format: 'YYYY/MM/DD hh:mm',
        timePicker: {
        enabled: true,
        meridiem: {
            enabled: true
        }
    },
    onSelect: function (params) {
            valOf = $(this.model.inputElement).val();
            $(this.model.inputElement).val(valOf.toEnglishDigits());
        }
    });
});
</script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('.mySelect2').select2({
        placeholder: "یک یا چند آیتم را انتخاب کنید...",
        dir: "rtl",
    });
</script>
@endsection
