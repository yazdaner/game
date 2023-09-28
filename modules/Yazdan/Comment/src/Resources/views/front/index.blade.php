<div class="comments-area">
    @include('Comment::front.create', ["commentable" => $blog])
    @include("Comment::front.reply", ["commentable" => $blog])
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
    function setCommentId(e,commentableId){
        e.preventDefault();
        $("#comment_id").val(commentableId)
    }
</script>
@endsection
