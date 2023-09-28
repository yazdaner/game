@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="{{ route('admin.comments.index') }}" title="نظرات">نظرات</a></li>
@endsection
@section('content')
    <div class="main-content">
        {{-- <div class="show-comment"> --}}
            <div class="ct__header">
                <div class="comment-info">
                    <a class="back" href="{{ route("admin.comments.index") }}"></a>
                    <div>
                        <p class="comment-name"><a href="">{{ $comment->commentable->title }}</a></p>
                    </div>
                </div>
            </div>
            @include("Comment::comment", ["comment" => $comment, "isAnswer" => false])
            @foreach($comment->comments as $reply)
                @include("Comment::comment", ["comment" => $reply, "isAnswer" => true])
            @endforeach
        </div>
        <div class="answer-comment">
            <p class="p-answer-comment">ارسال پاسخ</p>
            @if($comment->status == \Yazdan\Comment\Repositories\CommentRepository::STATUS_APPROVED)
            <form action="{{ route("admin.comments.store") }}" method="post">
                @csrf
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <input type="hidden" name="commentable_type" value="{{ get_class($comment->commentable) }}">
                <input type="hidden" name="commentable_id" value="{{ $comment->commentable->id }}">
                <x-textarea name="body" placeholder="ارسال نظر..."/>
                <button type="submit" class="btn btn-webamooz_net">ارسال پاسخ</button>
            </form>
            @else
                <p class="text-error">جهت ارسال پاسخ به این دیدگاه لطفا ابتدا آن را تایید کنید.</p>
            @endif
        </div>
    </div>
@endsection
