
    <div class="footer-area-bg-image">
        <!-- Start Footer Area -->
        <footer class="footer-style-two">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                  <a href="index-3.html" class="logo">
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

              <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget pl-5">
                  <h3>کاوش کنید</h3>

                  <ul class="footer-links-list">
                    <li><a href="#">صفحه اصلی</a></li>
                    <li><a href="#">درباره ما</a></li>
                    <li><a href="#">مطالعات موردی</a></li>
                    <li><a href="#">وبلاگ ما</a></li>
                    <li><a href="#">تماس با ما</a></li>
                  </ul>
                </div>
              </div>

              <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget pl-3">
                  <h3>منابع</h3>

                  <ul class="footer-links-list">
                    <li><a href="#">صفحه اصلی</a></li>
                    <li><a href="#">درباره ما</a></li>
                    <li><a href="#">مطالعات موردی</a></li>
                    <li><a href="#">وبلاگ ما</a></li>
                    <li><a href="#">تماس با ما</a></li>
                  </ul>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 col-sm-6">
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
