<div class="col-lg-6 col-md-12">
    <div class="contact-form">
        <h2>برای شروع آماده هستید؟</h2>
        <p>آدرس ایمیل شما منتشر نخواهد شد. قسمتهای مورد نیاز علامت گذاری شده اند *</p>
        <form action="{{route('contact.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="form-group has-error">
                        <input type="text" name="name" id="name" required="" placeholder="نام شما">
                        @error('name')
                        <div class="help-block with-errors"><ul class="list-unstyled"><li>{{$message}}</li></ul></div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12 col-md-6">
                    <div class="form-group has-error">
                        <input type="email" name="email" id="email" required="" placeholder="ایمیل شما">
                        @error('email')
                        <div class="help-block with-errors"><ul class="list-unstyled"><li>{{$message}}</li></ul></div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="form-group has-error">
                        <input type="text" name="phone" id="phone_number" required="" placeholder="شماره تلفن شما">
                        @error('phone')
                        <div class="help-block with-errors"><ul class="list-unstyled"><li>{{$message}}</li></ul></div>
                        @enderror

                    </div>
                </div>


                <div class="col-lg-12 col-md-12">
                    <div class="form-group has-error">
                        <textarea name="msg" id="message" cols="30" rows="5" required="" placeholder="پیام خود را بنویسید ..."></textarea>
                        @error('msg')
                        <div class="help-block with-errors"><ul class="list-unstyled"><li>{{$message}}</li></ul></div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <button type="submit" class="default-btn disabled" style="pointer-events: all; cursor: pointer;">ارسال پیام</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </form>
    </div>
</div>
