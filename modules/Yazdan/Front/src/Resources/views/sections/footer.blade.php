
    <div class="footer-area-bg-image">
        <!-- Start Footer Area -->
        <footer class="footer-style-two">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                  <a href="/" class="logo">
                    <img src="/assets/img/logo.png" alt="logo" />
                  </a>
                  <p>
                    {{$setting->description}}
                  </p>
                  <ul class="social-link">
                    @if ($setting->facebook)
                    <li>
                        <a href="{{$setting->facebook}}" class="d-block" target="_blank"
                          ><i class="bx bxl-facebook"></i
                        ></a>
                      </li>
                    @endif
                    @if ($setting->twitter)
                    <li>
                        <a href="{{$setting->twitter}}" class="d-block" target="_blank"
                          ><i class="bx bxl-twitter"></i
                        ></a>
                      </li>
                    @endif
                    @if ($setting->instagram)
                    <li>
                        <a href="{{$setting->instagram}}" class="d-block" target="_blank"
                          ><i class="bx bxl-instagram"></i
                        ></a>
                      </li>
                    @endif
                    @if ($setting->whatsapp)
                    <li>
                        <a href="{{$setting->whatsapp}}" class="d-block" target="_blank"
                          ><i class="bx bxl-whatsapp"></i
                        ></a>
                      </li>
                    @endif
                  </ul>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="single-footer-widget pl-5">
                  <h3>لینک های اصلی</h3>
                  <ul class="footer-links-list">
                    <li><a href="/">صفحه اصلی</a></li>
                    <li><a href="{{route('about')}}">درباره ما</a></li>
                    <li><a href="{{route('blogs')}}">وبلاگ ما</a></li>
                    <li><a href="{{route('contact')}}">تماس با ما</a></li>
                    <li><a href="{{route('coupons.index')}}">فروشگاه</a></li>
                  </ul>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="single-footer-widget pl-5">
                  <h3>لینک های مفید</h3>
                  <ul class="footer-links-list">
                    <li><a href="{{route('games')}}">بازی ها</a></li>
                    <li><a href="{{route('liderBoards')}}">لیدر برد فصلی</a></li>
                    <li><a href="{{route('game.users.index')}}">ارسال رکورد</a></li>
                    <li><a href="{{route('faq')}}">سوالات متداول</a></li>
                    <li><a href="{{route('regulation')}}">شرایط و قوانین </a></li>
                  </ul>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="single-footer-widget pl-3">
                  <h3>آدرس</h3>

                  <ul class="footer-contact-info">
                    <li>
                      <i class="bx bx-map"></i>
                    {{$setting->address}}
                    </li>
                    <li>
                      <i class="bx bx-phone-call"></i
                      ><a href="tel:{{$setting->telephone}}">{{$setting->telephone}}</a>
                    </li>
                    <li>
                      <i class="bx bx-envelope"></i
                      ><a href="mailto:{{$setting->email}}">{{$setting->email}}</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="footer-bottom-area">
              <div class="d-flex align-items-center justify-content-center">
                  <p>
                    {{$setting->copyright}}
                  </p>
              </div>
            </div>
          </div>

          <div class="footer-map">
            <img src="/assets/img/footer-map.png" alt="image" />
          </div>
        </footer>
        <!-- End Footer Area -->
      </div>
