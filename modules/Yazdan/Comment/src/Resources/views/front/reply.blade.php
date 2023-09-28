<div id="Modal2" class="modal">
    <div class="modal-content bg-dark">
        <div class="modal-header">
            <p>ارسال پاسخ</p>
            <div class="close">&times;</div>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route("admin.comments.store") }}">
                @csrf
                <input type="hidden" id="comment_id" name="comment_id" value="">
                <input type="hidden" name="commentable_type" value="{{ get_class($commentable) }}">
                <input type="hidden" name="commentable_id" value="{{ $commentable->id }}">
                <div class="ct-textarea">
                    <div class="form-group">
                        <label for="commentArea">نظر خود را در مورد این مقاله مطرح کنید</label>
                        <textarea name="body" class="form-control" id="commentArea" placeholder="ارسال نظر..."
                            rows="5"></textarea>
                    </div>
                </div>
                <div class="send-comment">
                    <button type="submit" class="btn btn-danger btn-lg">ثبت پاسخ</button>
                </div>
            </form>
        </div>
    </div>
</div>
