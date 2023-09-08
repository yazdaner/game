@extends('Front::layouts.master')
@section('content')

@include('Front::sections.mainBanner')

    @include('Front::sections.games')

    @include('Front::sections.CTA')

    @include('Front::sections.products')

    @include('Front::sections.blog')
    
    @include('Front::sections.social')


@endsection
