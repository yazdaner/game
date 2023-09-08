<div class="file-upload margin-top-10">
    <div class="i-file-upload">
        <span>{{$placeholder}}</span>
        <input type="file" class="file-upload" id="files" name="{{$name}}"/>
    </div>
    <span class="filesize"></span>
    @if (isset($value))
        <a href="{{$value->thumb()}}" target="_blank">
            <img class="img-thumbnail" width="100" src="{{$value->thumb()}}">
        </a>
        {{$value->filename}}
        @else
            <span class="selectedFiles">فایلی انتخاب نشده است</span>
        @endif
</div>
<x-validation-error field="{{$name}}" />
