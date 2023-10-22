@extends('Dashboard::master')
@section('breadcrumb')
<li><a href="{{route('admin.users.index')}}" title="کاربران">کاربران</a></li>
<li><a href="#" title="نمایش کاربر">نمایش کاربر</a></li>
@endsection
@section('content')
<div class="main-content padding-0 users">
    <div class="row no-gutters">
        <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
            <p class="box__title">کاربر : {{$user->username}}</p>


            <div class="bg-white padding-20 d-flex justify-content-between">
                <table class="table">
                    <tbody>
                        @foreach ($coupons as $coupon)

                        <tr>
                          <td>
                              <img width="60" src="{{$coupon->getAvatar()}}" alt="{{$coupon->title}}">
                          </td>
                          <td>
                              {{$coupon->title}}
                          </td>
                          <td>
                              موجودی :
                              {{$coupon->pivot->count}}
                          </td>
                        </tr>
                        @endforeach

                      </tbody>
                  </table>
            </div>

        </div>
    </div>
</div>
@endsection

