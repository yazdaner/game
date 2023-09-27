@extends('Front::layouts.master')
@section('content')
<!-- Start Blog Area -->
<section class="blog-area ptb-100 mt-5">
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post-box">
                        <div class="post-image">
                            <a href="{{route('blog.show',$blog->slug)}}">
                                <img src="{{$blog->getAvatar(300)}}" alt="image">
                            </a>
                        </div>

                        <div class="post-content">
                            <ul class="post-meta">
                                <li>{{verta($blog->created_at)->format('Y/n/j')}}</li>
                                <li><a href="{{route('blog.show',$blog->slug)}}">{{$blog->category->title}}</a></li>
                            </ul>
                            <h3><a href="{{route('blog.show',$blog->slug)}}">{{$blog->title}}</a></h3>
                            <a href="{{route('blog.show',$blog->slug)}}" class="read-more-btn">ادامه خواندن <i
                                    class="flaticon-left"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-lg-12 col-md-12">
                <div class="d-flex justify-content-center mt-5">
                    {{ $blogs->links('pagination.front') }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog Area -->
@endsection
