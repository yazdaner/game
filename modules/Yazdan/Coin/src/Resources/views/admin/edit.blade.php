@extends("Dashboard::master")
@section('breadcrumb')
<li><a href="#" title="ویرایش سکه">ویرایش سکه</a></li>
@endsection
@section("content")
  <div class="main-content">
    <div class="col-12 bg-white">
        <p class="box__title">ویرایش سکه</p>
        <form action="{{ route("admin.coin.update", $coin->id) }}" method="post" class="padding-30" enctype="multipart/form-data">
            @csrf
            @method("put")
            <x-input type="text" placeholder="نام" name="title" value="{{ $coin->title }}"/>
            <x-input type="number" placeholder="قیمت" name="price" value="{{ $coin->price }}"/>

            <br>

            <x-file-upload name="media" placeholder="تصویر سکه" :value="$coin->media" />

            <button type="submit" class="btn btn-yazdan">بروزرسانی</button>
        </form>
    </div>
  </div>
@endsection
