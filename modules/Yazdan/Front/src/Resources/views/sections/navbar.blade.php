<!-- Start Navbar Area -->
<div class="navbar-area navbar-style-two">
    <div class="zelda-responsive-nav">
        <div class="container">
            <div class="zelda-responsive-menu">
                <div class="logo">
                    <a href="/">
                        <img src="/assets/img/logo.png" alt="logo" />
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="zelda-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="/">
                    <img src="/assets/img/logo.png" alt="logo" />
                </a>

                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">خانه</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">مسابقات <i class="flaticon-down-arrow"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a href="{{route('games')}}" class="nav-link">بازی ها</a></li>

                                <li class="nav-item"><a href="#" class="nav-link">لیدر برد فصلی</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('coupons.index')}}" class="nav-link">فروشگاه</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('blogs')}}" class="nav-link">مجله</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('contact')}}" class="nav-link">تماس با ما</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('about')}}" class="nav-link">درباره ما</a>
                        </li>
                    </ul>

                    <div class="others-option d-flex align-items-center">
                        @auth

                        <div class="option-item">
                            <a href="{{route('user.coin.index')}}">
                                <div class="d-flex align-items-center">
                                    <img src="{{$coin->getAvatar(60)}}" width="40" alt="">
                                    <p class="mb-0">
                                        {{auth()->user()->coin}}
                                    </p>
                                </div>
                            </a>
                        </div>
                        @endauth

                        <div class="option-item">
                            <div class="cart-btn">
                                <a href="{{route('users.cart.index')}}">
                                    <i class="flaticon-null-5"></i>
                                    @if (! \Cart::isEmpty())
                                    <span>{{ \Cart::getContent()->count() }}</span>
                                    @endif
                                </a>
                            </div>
                        </div>

                        <div class="option-item">
                            <div class="search-box">
                                <i class="flaticon-search-1"></i>
                            </div>
                        </div>

                        @auth
                        <div class="option-item">
                            <div class="d-flex align-items-center">
                                <a href="{{route('users.profile')}}">
                                    <img src="{{auth()->user()->getAvatar(60)}}" class="profile_sm">
                                </a>
                                <div class="mr-3">
                                    <a href="{{route('logout')}}">خروج</a>
                                </div>
                            </div>
                        </div>

                        @else
                        <div class="option-item d-flex">
                            <div class="ml-3">
                                <a href="{{route('login')}}">ورود</a>
                            </div>
                            <div class="">
                                <a href="{{route('register')}}">ثبت نام</a>
                            </div>
                        </div>
                        @endauth

                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>

            <div class="container">
                <div class="option-inner">

                    <div class="others-option">
                        @auth

                        <div class="option-item">
                            <a href="{{route('user.coin.index')}}">
                                <div class="d-flex align-items-center">
                                    <img src="{{$coin->getAvatar(60)}}" width="40" alt="">
                                    <p class="mb-0">
                                        {{auth()->user()->coin}}
                                    </p>
                                </div>
                            </a>
                        </div>
                        @endauth

                        <div class="option-item">
                            <div class="cart-btn">
                                <a href="{{route('users.cart.index')}}">
                                    <i class="flaticon-null-5"></i>
                                    @if (! \Cart::isEmpty())
                                    <span>{{ \Cart::getContent()->count() }}</span>
                                    @endif
                                </a>
                            </div>
                        </div>

                        <div class="option-item">
                            <div class="search-box">
                                <i class="flaticon-search-1"></i>
                            </div>
                        </div>

                        @auth
                        <div class="option-item">
                            <div class="d-flex align-items-center">
                                <a href="{{route('users.profile')}}">
                                    <img src="{{auth()->user()->getAvatar(60)}}" class="profile_sm">
                                </a>

                            </div>
                        </div>

                        @else
                        <div class="option-item d-flex align-items-center">
                            <div class="ml-3">
                                <a href="{{route('login')}}">ورود</a>
                            </div>
                            <div class="">
                                <a href="{{route('register')}}">ثبت نام</a>
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
