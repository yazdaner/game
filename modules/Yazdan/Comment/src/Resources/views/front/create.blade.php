<div class="comment-main mt-5">
    <div>
        <h3>نظرات</h3>
    </div>
    <form action="{{ route("admin.comments.store") }}" method="post">
        @csrf
        <input type="hidden" name="commentable_type" value="{{ get_class($commentable) }}">
        <input type="hidden" name="commentable_id" value="{{ $commentable->id }}">
        <div class="my-5">
            <div class="ct-textarea">
                <div class="form-group">
                    <label for="commentArea">نظر خود را در مورد این مقاله مطرح کنید</label>
                    <textarea name="body" class="form-control" id="commentArea" placeholder="ارسال نظر..."
                        rows="5"></textarea>
                </div>
            </div>
            <div>
                <div class="send-comment">
                    <button type="submit" class="btn btn-danger btn-lg">ثبت نظر</button>
                </div>
            </div>
        </div>
    </form>
</div>
