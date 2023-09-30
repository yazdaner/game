@extends("Dashboard::master")
@section('breadcrumb')
<li><a href="#" title="ویرایش درباره ما">ویرایش درباره ما</a></li>
@endsection
@section("content")
  <div class="main-content">
    <div class="col-12 bg-white">
        <p class="box__title">ویرایش درباره ما</p>
        <form action="{{ route("admin.about.update", $about->id) }}" method="post" class="padding-30">
            @csrf
            @method("put")

            <x-text-area placeholder="" name="body" id="body" value="{{$about->body ?? ''}}" />

            <button type="submit" class="btn btn-webamooz_net">بروزرسانی</button>
        </form>
    </div>
  </div>
@endsection
@section('script')
<script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body', {
        language: 'fa',
        filebrowserUploadUrl: '{{ route('admin.editor-upload', ['_token' => csrf_token()]) }}',
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
