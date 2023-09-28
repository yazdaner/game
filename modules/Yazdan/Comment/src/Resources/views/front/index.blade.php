{{-- <div class="container">
    <div class="comments">
        @auth()
        @include("Front::comments.create", ["commentable" => $course])
        @else
        <div class="comment-main">
            <div class="ct-header">
                <p>برای ثبت دیدگاه باید ابتدا <a href="{{ route(" login") }}">وارد سایت</a> شوید</p>
            </div>
        </div>
        @endauth
        <div class="comments-list">
            @auth()
            @include("Front::comments.reply", ["commentable" => $course])
            @endauth
            @foreach($commentable->approvedComments()->latest()->get() as $comment)
            <ul class="comment-list-ul">
                @auth
                <div class="div-btn-answer">
                    <button class="btn-answer" onclick="setCommentId({{ $comment->id }})">پاسخ به دیدگاه</button>
                </div>
                @endauth
                <li class="is-comment">
                    <div class="comment-header">
                        <div class="comment-header-avatar">
                            <img src="{{ $comment->user->thumb }}" alt="{{ $comment->user->name }}">
                        </div>
                        <div class="comment-header-detail">
                            <div class="comment-header-name">کاربر : {{ $comment->user->name }}</div>
                            <div class="comment-header-date">{{ $comment->created_at }}</div>
                        </div>
                    </div>
                    <div class="comment-content">
                        <p>
                            {{ $comment->body }}
                        </p>
                    </div>
                </li>
                @foreach($comment->comments as $reply)
                <li class="is-answer">
                    <div class="comment-header">
                        <div class="comment-header-avatar">
                            <img src="{{ $reply->user->thumb }}">
                        </div>
                        <div class="comment-header-detail">
                            <div class="comment-header-name">{{ $reply->user->name }}</div>
                            <div class="comment-header-date">10 روز پیش</div>
                        </div>
                    </div>
                    <div class="comment-content">
                        <p>
                            {{ $reply->body }}
                        </p>
                    </div>
                </li>
                @endforeach
            </ul>
            @endforeach
        </div>
    </div>
</div> --}}

































<div class="comments-area">


    @include('Comment::front.create', ["commentable" => $blog])
    @auth()
    @include("Comment::front.reply", ["commentable" => $blog])
    @endauth
    @foreach($blog->approvedComments()->latest()->get() as $comment)
    <ol class="comment-list">
        <li class="comment">
            <article class="comment-body">
                <footer class="comment-meta">
                    <div class="comment-author vcard">
                        <img src="{{ $comment->user->getAvatar(60) }}" class="avatar" alt="image">
                        <b class="fn">{{ $comment->user->name }}</b>
                        <span class="says">می گوید:</span>
                    </div>

                    <div class="comment-metadata">
                        <a href="#">
                            <span>{{$comment->created_at->diffForHumans()}}</span>
                        </a>
                    </div>
                </footer>

                <div class="comment-content">
                    <p>{{ $comment->body }}</p>
                </div>

                <div class="reply">
                    <a href="#" class="comment-reply-link btn-answer"
                        onclick="setCommentId(event,{{ $comment->id }})">پاسخ دادن</a>
                </div>
            </article>
            @foreach($comment->comments as $reply)
            <ol class="children">
                <li class="comment">
                    <article class="comment-body">
                        <footer class="comment-meta">
                            <div class="comment-author vcard">
                                <img src="{{ $reply->user->getAvatar(60) }}" class="avatar" alt="image">
                                <b class="fn">{{ $reply->user->name }}</b>
                                <span class="says">می گوید:</span>
                            </div>

                            <div class="comment-metadata">
                                <a href="#">
                                    <span>{{$reply->created_at->diffForHumans()}}</span>
                                </a>
                            </div>
                        </footer>

                        <div class="comment-content">
                            <p>{{ $reply->body }}</p>
                        </div>

                    </article>
                </li>
            </ol>
            @endforeach

        </li>
    </ol>
    @endforeach
</div>
@section('script')
<script>
    function setCommentId(e,commentableId) {
    e.preventDefault();
    $("#comment_id").val(commentableId)
}
</script>
@endsection
