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

                <x-input name="title" type="text" placeholder="عنوان" value="{{$game->title}}" />
                   <div class="w-100 ml-15">

                    <input type="text" placeholder="تاریخ پایان بازی" class="text deadline">
                    @error('deadline')
                    <div class="invalidFeedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <input name="deadline" type="hidden" class="deadline2" />

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
      $('.deadline').persianDatepicker({
        initialValue: false,
        observer: true,
        format: 'hh:mm:ss YYYY-MM-DD',
        altField: '.deadline2',
        timePicker: {
        enabled: true,
        meridiem: {
            enabled: true
        }
    }
      });
});

</script>
@endsection
