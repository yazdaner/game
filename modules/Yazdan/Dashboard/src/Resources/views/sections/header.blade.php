<div class="header d-flex item-center bg-white width-100 border-bottom padding-12-30">
    <div class="header__right d-flex flex-grow-1 item-center">
        <span class="bars"></span>
        <a class="header__logo" href=""></a>
    </div>
    <div class="header__left d-flex flex-end item-center margin-top-2">
        <form action="{{route('logout')}}" method="post">
            @csrf
            <a href="/" onclick="event.preventDefault(); this.parentElement.submit();" class="logout" title="خروج"></a>
        </form>
    </div>
</div>
