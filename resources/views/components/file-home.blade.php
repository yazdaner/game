<div class="form-group">

    <label>{{$label}}</label>

    <input type="file" id="files" name="{{$name}}" {{ $attributes->merge(['class' =>
    'form-control'])}} value="{{old($name)}}">

    <x-validation-error field="{{$name}}" />

</div>
