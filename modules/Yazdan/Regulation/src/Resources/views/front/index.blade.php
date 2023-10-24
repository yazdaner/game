@extends('Front::layouts.master')
@section('content')
<section class="contact-area ptb-100 mt-5">
    <div class="container">
        <div class="row px-3">
            {!! $regulation->body !!}
        </div>
    </div>
</section>
@endsection
