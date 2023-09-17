@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="{{route('admin.games.index')}}" title="بازی ها">بازی ها</a></li>
<li><a href="#" title="ویرایش">ویرایش</a></li>
@endsection
@section('content')
<div class="main-content users">
    <div class="row no-gutters bg-white">
        <div class="col-12">
            <p class="box__title">ویرایش بازی</p>
            <form action="{{route('admin.games.update',$game->id)}}" method="post" class="padding-30" enctype="multipart/form-data">
                @csrf
                @method('put')



                <x-input type="text" class="expireAt" id="expire_at" placeholder="تاریخ پایان بازی" name="deadline"
                value="{{ $discount->deadline ? fromCarbon($discount->deadline) : '' }}" />



                <x-text-area name="description" placeholder="توضیحات بازی (اختیاری)" value="{{$game->description}}"/>

                <x-file-upload name="media" placeholder="تصویر بازی" :value="$game->media" />


                <x-button title="ویرایش" />
            </form>
        </div>
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
@endsection
