@extends('Home::master')
@section('content')
<div class="">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h3 class="mb-0">
            کوپن ها
        </h3>
        <a href="{{route('coupons.index')}}" class="btn btn-primary btn-lg">خرید کوپن</a>
    </div>

    <table class="table table-dark table-striped">

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
@endsection
