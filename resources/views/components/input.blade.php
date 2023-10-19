<div class="w-100 ml-15">

<label>{{$placeholder}}</label>
<input type="{{$type}}" name="{{$name}}"  autocomplete="{{$name}}" placeholder="{{$placeholder}}" {{ $attributes->merge(['class' => 'text']) }}
value="{{old($name)}}">
<x-validation-error field="{{$name}}" />

</div>
