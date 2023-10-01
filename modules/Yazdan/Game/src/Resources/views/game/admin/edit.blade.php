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
            <form action="{{route('admin.games.update',$game->id)}}" method="post" class="padding-30"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <x-input name="title" type="text" placeholder="عنوان" value="{{$game->title}}" />

                <x-input type="text" class="expireAt" id="expire_at" placeholder="تاریخ پایان بازی" name="deadline"
                    value="{{ $game->deadline ? fromCarbon($game->deadline) : '' }}" />

                <br>
                <x-text-area placeholder="توضیحات بازی (اختیاری)" name="description" id="description"
                    value="{{$game->description}}" />
                <br>
                <x-file-upload name="media" placeholder="تصویر بازی" :value="$game->media" />

                <br>

                <x-select name="status" placeholder="وضعیت بازی">
                    @foreach ($statuses as $status)
                    <option value="{{$status}}" @if ($game->status == $status) selected @endif>@lang($status)</option>
                    @endforeach
                </x-select>

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
<script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        language: 'fa',
        filebrowserUploadUrl: '{{ route('admin.editor-upload', ['_token' => csrf_token()]) }}',
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
