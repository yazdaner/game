@extends('Front::layouts.master')
@section('content')
<section class="contact-area ptb-100 mt-5">
    <div class="container">
        <div class="row px-3">
            {!! $about->body !!}
        </div>
    </div>
</section>
@endsection
