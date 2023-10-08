@extends('Home::master')
@section('content')
<div class="d-md-flex mb-3 align-items-center justify-content-between">
  <div>
    <h3 class="">
        خرید
        {{$coin->title}}
    </h3>
  </div>
    <div class="d-flex align-items-center">
        <h5 class="">
            {{$coin->title}} های موجود :
            {{auth()->user()->coin}}
        </h5>
        <img src="{{$coin->getAvatar(300)}}" width="100" alt="">
    </div>
</div>
<form class="row g-3 align-items-center mt-3"
action="{{ route('users.cart.add')}}"
method="POST">
@csrf
<input type="hidden" name="productable_type" value="{{ \Crypt::encrypt(get_class($coin)) }}">
<input type="hidden" name="productable_id" value="{{ $coin->id }}">

        <div class="col-md-auto col-12">
            <x-inputHome name="count" id="count" type="number" min="1" value="1" onchange="setTotalPrice()" label="تعداد سکه" />
        </div>

        <div class="col-md-auto col-12">
            <div class="form-group">
                <label>قیمت کل (تومان)</label>
                <input type="text" id="TotalPrice" class="form-control" value="{{number_format($coin->price)}}" disabled >
            </div>
        </div>



    <div class="col-auto mt-3">
        <button type="submit" class="btn btn-primary">خرید</button>
    </div>
</form>
@endsection
@section('script')
<script>
    function number_format (number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}
    function setTotalPrice(){
        $('#TotalPrice').val(number_format($('#count').val() * {{$coin->price}}));
    }
</script>
@endsection

