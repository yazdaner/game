@extends('Home::master')
@section('content')
<div class="d-flex mb-5 align-items-center">
    <h3 class="mb-0">
        خرید
        {{$coin->name}}
    </h3>
    <img src="{{$coin->getAvatar(300)}}" width="100" alt="">
</div>
<form action="{{ route('users.cart.add',['productModel' => get_class($coin),'productId' => $coin->id]) }}" method="POST" class="row g-3 align-items-center mt-3">
    @csrf

        <div class="col-auto">
            <x-inputHome name="count" id="count" type="number" min="1" value="1" onchange="setTotalPrice()" label="تعداد سکه" />
        </div>

        <div class="col-auto">
            <div class="form-group">
                <label>قیمت کل (تومان)</label>
                <input type="number" id="TotalPrice" class="form-control" value="{{$coin->price}}" disabled >
            </div>
        </div>



    <div class="col-auto mt-3">
        <button type="submit" class="btn btn-primary">خرید</button>
    </div>
</form>
@endsection
@section('script')
<script>
    function setTotalPrice(){
        $('#TotalPrice').val($('#count').val() * {{$coin->price}});
    }
</script>
@endsection

