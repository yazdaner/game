@extends('Front::layouts.master')
@section('content')
<section class="blog-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-details-desc">
                    <div class="article-image mt-5 d-flex justify-content-center">
                        <img src="{{$blog->getAvatar()}}" alt="image" class="blogBanner">
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

                    {{-- <div class="comments-area">
                        <h3 class="comments-title">2 نظر:</h3>

                        <ol class="comment-list">
                            <li class="comment">
                                <article class="comment-body">
                                    <footer class="comment-meta">
                                        <div class="comment-author vcard">
                                            <img src="assets/img/user1.jpg" class="avatar" alt="image">
                                            <b class="fn">جان جونز</b>
                                            <span class="says">می گوید:</span>
                                        </div>

                                        <div class="comment-metadata">
                                            <a href="#">
                                                <span>24 دی 1398 در 10:59 صبح</span>
                                            </a>
                                        </div>
                                    </footer>

                                    <div class="comment-content">
                                        <p>لورم ایپسوم ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم استاندارد صنعت بوده است. لورم ایپسوم ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم استاندارد صنعت بوده است.</p>
                                    </div>

                                    <div class="reply">
                                        <a href="#" class="comment-reply-link">پاسخ دادن</a>
                                    </div>
                                </article>

                                <ol class="children">
                                    <li class="comment">
                                        <article class="comment-body">
                                            <footer class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <img src="assets/img/user2.jpg" class="avatar" alt="image">
                                                    <b class="fn">جان جونز</b>
                                            <span class="says">می گوید:</span>
                                        </div>

                                        <div class="comment-metadata">
                                            <a href="#">
                                                <span>24 دی 1398 در 10:59 صبح</span>
                                            </a>
                                        </div>
                                    </footer>

                                    <div class="comment-content">
                                        <p>لورم ایپسوم ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم استاندارد صنعت بوده است. لورم ایپسوم ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم استاندارد صنعت بوده است.</p>
                                    </div>

                                    <div class="reply">
                                        <a href="#" class="comment-reply-link">پاسخ دادن</a>
                                            </div>
                                        </article>

                                        <ol class="children">
                                            <li class="comment">
                                                <article class="comment-body">
                                                    <footer class="comment-meta">
                                                        <div class="comment-author vcard">
                                                            <img src="assets/img/user3.jpg" class="avatar" alt="image">
                                                            <b class="fn">جان جونز</b>
                                            <span class="says">می گوید:</span>
                                        </div>

                                        <div class="comment-metadata">
                                            <a href="#">
                                                <span>24 دی 1398 در 10:59 صبح</span>
                                            </a>
                                        </div>
                                    </footer>

                                    <div class="comment-content">
                                        <p>لورم ایپسوم ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم استاندارد صنعت بوده است. لورم ایپسوم ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم استاندارد صنعت بوده است.</p>
                                    </div>

                                    <div class="reply">
                                        <a href="#" class="comment-reply-link">پاسخ دادن</a>
                                                    </div>
                                                </article>
                                            </li>
                                        </ol>
                                    </li>
                                </ol>
                            </li>

                            <li class="comment">
                                <article class="comment-body">
                                    <footer class="comment-meta">
                                        <div class="comment-author vcard">
                                            <img src="assets/img/user4.jpg" class="avatar" alt="image">
                                            <b class="fn">جان جونز</b>
                                            <span class="says">می گوید:</span>
                                        </div>

                                        <div class="comment-metadata">
                                            <a href="#">
                                                <span>24 دی 1398 در 10:59 صبح</span>
                                            </a>
                                        </div>
                                    </footer>

                                    <div class="comment-content">
                                        <p>لورم ایپسوم ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم استاندارد صنعت بوده است. لورم ایپسوم ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم استاندارد صنعت بوده است.</p>
                                    </div>

                                    <div class="reply">
                                        <a href="#" class="comment-reply-link">پاسخ دادن</a>
                                    </div>
                                </article>

                                <ol class="children">
                                    <li class="comment">
                                        <article class="comment-body">
                                            <footer class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <img src="assets/img/user1.jpg" class="avatar" alt="image">
                                                    <b class="fn">جان جونز</b>
                                            <span class="says">می گوید:</span>
                                        </div>

                                        <div class="comment-metadata">
                                            <a href="#">
                                                <span>24 دی 1398 در 10:59 صبح</span>
                                            </a>
                                        </div>
                                    </footer>

                                    <div class="comment-content">
                                        <p>لورم ایپسوم ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم استاندارد صنعت بوده است. لورم ایپسوم ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم استاندارد صنعت بوده است.</p>
                                    </div>

                                    <div class="reply">
                                        <a href="#" class="comment-reply-link">پاسخ دادن</a>
                                            </div>
                                        </article>
                                    </li>
                                </ol>
                            </li>
                        </ol>

                        <div class="comment-respond">
                            <h3 class="comment-reply-title">نظر بدهید</h3>

                            <form class="comment-form">
                                <p class="comment-notes">
                                    <span id="email-notes">آدرس ایمیل شما منتشر نخواهد شد.</span>
                                    قسمتهای مورد نیاز علامت گذاری شده اند
                                    <span class="required">*</span>
                                </p>
                                <p class="comment-form-author">
                                    <label>نام <span class="required">*</span></label>
                                    <input type="text" id="author" placeholder="نام شما*" name="author" required="required">
                                </p>
                                <p class="comment-form-email">
                                    <label>ایمیل <span class="required">*</span></label>
                                    <input type="email" id="email" placeholder="ایمیل شما*" name="email" required="required">
                                </p>
                                <p class="comment-form-url">
                                    <label>وبسایت</label>
                                    <input type="url" id="url" placeholder="وبسایت" name="url">
                                </p>
                                <p class="comment-form-comment">
                                    <label>نظر</label>
                                    <textarea name="comment" id="comment" cols="45" placeholder="نظر شما ..." rows="5" maxlength="65525" required="required"></textarea>
                                </p>
                                <p class="comment-form-cookies-consent">
                                    <input type="checkbox" value="yes" name="wp-comment-cookies-consent" id="wp-comment-cookies-consent">
                                    <label for="wp-comment-cookies-consent">نام ، ایمیل و وب سایت من را برای دفعه بعدی که نظر می دهم در این مرورگر ذخیره کنید.</label>
                                </p>
                                <p class="form-submit">
                                    <input type="submit" name="submit" id="submit" class="submit" value="ارسال نظر">
                                </p>
                            </form>
                        </div>
                    </div> --}}
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
