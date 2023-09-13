@extends('Home::master')
@section('content')
@if ($records->isNotEmpty())
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">رکورد ادعایی</th>
            <th scope="col">عنوان مرحله</th>
            <th scope="col">وضعیت</th>
        </tr>
    </thead>
    <tbody>
        @foreach (collect($records)->sortByDesc('created_at') as $key => $record)
        <tr>
            <th scope="row">{{++$loop->index}}</th>
            <td>{{$record->claimRecord}}</td>
            <td>{{$record->level->title}}</td>
            <td class="{{$record->status()}}" >@lang($record->status)</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endif
@if ($level)

<h3>
    ثبت رکورد
</h3>
<div class="d-flex mt-5">
    <h4>{{$level->title}} : </h4>
    <p class="text-danger mr-3"> ( حداقل امتیاز {{$level->minScore}} )</p>
</div>
<form action="{{route('home.records.send')}}" method="POST" enctype="multipart/form-data"
    class="row g-3 align-items-center mt-3">
    @csrf

    <input type="hidden" value="{{$level->id}}" name="level">

    <div class="col-auto">
        <x-inputHome name="claimRecord" type="number" label="امتیاز شما" />
    </div>

    <div class="col-auto">
        <x-file-home name="media" type="text" label="فایل سند" />
    </div>

    <div class="col-auto mt-3">
        <button type="submit" class="btn btn-primary">ارسال</button>
    </div>
</form>
@endif
@endsection
