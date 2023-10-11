@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="{{route('admin.categories.index')}}" title="سوالات متداول">سوالات متداول</a></li>
<li><a href="#" title="ویرایش">ویرایش</a></li>
@endsection
@section('content')
<div class="col-4 bg-white margin-top-30 margin-auto">
    <p class="box__title">ویرایش سوال متداول</p>
    <form action="{{route('admin.faqs.update',$faq->id)}}" method="post" class="padding-30">
        @csrf
        @method('put')

        <x-text-area name="question" placeholder="سوال" value="{{$faq->question}}" />
        <x-text-area name="answer" placeholder="پاسخ" value="{{$faq->answer}}" />

        <button type="submit" class="btn btn-yazdan">ویرایش</button>
    </form>
</div>
@endsection
