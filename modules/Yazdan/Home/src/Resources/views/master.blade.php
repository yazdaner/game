
<!DOCTYPE html>
<html lang="fa">

@include('Front::sections.head')

  <body>

    @include('Front::sections.navbar')

    @include('Front::sections.search')

<!-- my account wrapper start -->
<div class="my-account-wrapper pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <div class="row text-right" style="direction: rtl;">
                      @include('Home::sections.sidebar')
                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8">
                            <div class="tab-content" id="myaccountContent">

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <div class="myaccount-content">
                                        <div class="account-details-form">
                                           @yield('content')
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->


                            </div>
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div> <!-- My Account Page End -->
            </div>
        </div>
    </div>
</div>
<!-- my account wrapper end -->

    @include('Front::sections.footer')

    @include('Front::sections.js')

    @include('Common::layouts.feedbacks')

  </body>
</html>



