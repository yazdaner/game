@extends("Dashboard::master")
@section('breadcrumb')
<li><a href="#" title="ویرایش تنظیمات">ویرایش تنظیمات</a></li>
@endsection
@section("content")
  <div class="main-content">
    <div class="col-12 bg-white">
        <p class="box__title">ویرایش تنظیمات</p>
        <form action="{{ route("admin.setting.update", $setting->id) }}" method="post" class="padding-30" enctype="multipart/form-data">
            @csrf
            @method("put")
            <x-input type="text" placeholder="تلفن" name="telephone" value="{{ $setting->telephone }}"/>
            <x-input type="text" placeholder="ایمیل" name="email" value="{{ $setting->email }}"/>
            <x-input type="text" placeholder="آدرس" name="address" value="{{ $setting->address }}"/>
            <x-input type="text" placeholder="توضیحات" name="description" value="{{ $setting->description }}"/>
            <x-input type="text" placeholder="کپی رایت" name="copyright" value="{{ $setting->copyright }}"/>
            <x-input type="text" placeholder="اینستاگرام" name="instagram" value="{{ $setting->instagram }}"/>
            <x-input type="text" placeholder="تلگرام" name="telegram" value="{{ $setting->telegram }}"/>
            <x-input type="text" placeholder="فیسبوک" name="facebook" value="{{ $setting->facebook }}"/>
            <x-input type="text" placeholder="واتساپ" name="whatsapp" value="{{ $setting->whatsapp }}"/>
            <x-input type="text" placeholder="یوتیوب" name="youtube" value="{{ $setting->youtube }}"/>
            <x-input type="text" placeholder="توییتر" name="twitter" value="{{ $setting->twitter }}"/>
            <x-input type="text" placeholder="توییچ" name="twitch" value="{{ $setting->twitch }}"/>
            <button type="submit" class="btn btn-webamooz_net">بروزرسانی</button>
        </form>
    </div>
  </div>
@endsection
