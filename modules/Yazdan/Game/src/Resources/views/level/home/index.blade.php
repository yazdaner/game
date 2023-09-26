@extends('Home::master')
@section('content')
@if ($records->isNotEmpty())
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">عنوان مرحله</th>
            <th scope="col">رکورد ادعایی</th>
            <th scope="col">سکه استفاده شده</th>
            <th scope="col">وضعیت</th>
        </tr>
    </thead>
    <tbody>
        @foreach (collect($records)->sortByDesc('created_at') as $key => $record)
        <tr>
            <th scope="row">{{++$loop->index}}</th>
            <td>{{$record->level->title}}</td>
            <td>{{$record->claimRecord ?? '-' }}</td>
            <td>{{$record->level->coin ?? '0' }}</td>
            <td class="{{$record->status()}}">@lang($record->status)</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@if ($level)

<h3>
    ثبت رکورد
</h3>
<div class="d-flex mt-5">
    <h4>{{$level->title}} : </h4>
    <p class="text-danger mr-3"> ( حداقل امتیاز {{$level->minScore}} )</p>
</div>
<form action="{{route('home.records.send')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row g-3 align-items-center mt-3">
        <input type="hidden" value="{{$level->id}}" name="level">

        <div class="col-auto">
            <x-inputHome name="claimRecord" type="number" label="امتیاز شما" />
        </div>

        <div class="col-auto">
            <x-file-home name="media" type="text" label="فایل سند" />
        </div>
        @if ($level->coupons->isNotEmpty())

        <div class="home">
            <div class="col-auto">
                <div class="form-group">
                    <label>کوپن</label>

                    <div class="select-box">
                        <select name="coupon">
                            <option value="">انتخاب کوپن ... </option>
                            @foreach ($level->coupons as $coupon)
                            <option value="{{$coupon->id}}">{{$coupon->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('coupon')
                    <div class="invalidFeedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        @endif


    </div>
    <div class="row">
        @if (isset($level->coin))
        <div class="col-auto mt-3">
            <button onclick="recordWithCoin(event)" class="btn btn-primary">اعمال سکه : {{$level->coin}}</button>
        </div>
        @endif


        <div class="col-auto mt-3">
            <button type="submit" class="btn btn-primary">ارسال</button>
        </div>
    </div>
</form>

@if (isset($level->coin))
<form id="CoinForm" action="{{route('home.records.coinRecord',$level->id)}}" method="POST">@csrf</form>
@endif

@endif
@endsection
@section('script')
@if (isset($level->coin))
<script>
    function recordWithCoin(e){
        e.preventDefault();
        $('#CoinForm').submit()
    }
</script>
@endif
@endsection
