@extends('Front::layouts.master')
@section('content')
<section class="blog-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-details-desc">
                    <div class="article-image mt-5 d-flex justify-content-center">
                        <img src="{{$blog->getAvatar(600)}}" alt="image" class="blogBanner">
                    </div>

                    <div class="article-content">
                        <div class="entry-meta">
                            <ul>
                                <li>
                                    <i class='bx bx-folder-open'></i>
                                    <span>دسته</span>
                                    <a href="#">{{$blog->category->title}}</a>
                                </li>

                                <li>
                                    <i class='bx bx-calendar'></i>
                                    <span>ارسال در</span>
                                    <a href="#">{{verta($blog->created_at)->format('Y/n/j')}}</a>
                                </li>
                            </ul>
                        </div>

                       <div class="content my-5">
                            {!! $blog->content !!}
                       </div>

                </div>
            </div>

        </div>
    </div>
    <div class="mt-5">
        @include('Comment::front.index')
    </div>

</section>
@endsection
