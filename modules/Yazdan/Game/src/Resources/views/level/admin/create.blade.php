@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="{{ route('admin.games.index') }}" title="بازی ها">بازی ها</a></li>
<li><a href="{{ route('admin.games.details',$game->id) }}" title="جزِییات بازی">جزِییات بازی</a></li>
<li><a href="#" title="ایجاد مرحله جدید">ایجاد مرحله جدید</a></li>
@endsection
@section('content')
<div class="main-content padding-0">
    <p class="box__title">ایجاد مرحله جدید</p>
    <div class="row no-gutters">
        <div class="col-12 bg-white">
            <form action="{{ route('admin.levels.store',$game->id) }}" class="padding-30" method="post">
                @csrf

                <x-input type="text" name="title" placeholder="عنوان مرحله" />

                <x-input type="number" name="priority" placeholder="سطح مرحله" />

                <x-input type="number" name="minScore" placeholder="حداقل امتیاز" />

                <x-input type="number" name="coin" placeholder="سکه مورد نیاز برای رد کردن مرحله (اختیاری)" />


                <div class="margin-top-30">
                    <p class="margin-bottom-15">کوپن های قابل اعمال (اختیاری)</p>

                    <div class="selectCourseContainer">
                        <select name="coupons[]" class="mySelect2" multiple>
                            @foreach($coupons as $coupon)
                            <option value="{{ $coupon->id }}">{{ $coupon->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('coupons')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>



                <x-button title="ایجاد مرحله" />


            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('.mySelect2').select2({
        placeholder: "یک یا چند آیتم را انتخاب کنید...",
        dir: "rtl",
    });
</script>
@endsection
