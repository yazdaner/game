<div class="col-4 bg-white">
    <p class="box__title">ایجاد دسته بندی جدید</p>
    <form action="{{route('admin.liderBoards.store')}}" method="post" class="padding-30">
        @csrf
        <input name="title" type="text" placeholder="نام دسته بندی" class="text">
        @error('title')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
        <input name="slug" type="text" placeholder="نام انگلیسی دسته بندی" class="text">
        @error('slug')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
        <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
        <select name="parent_id" id="parent_id">
            <option value="">ندارد</option>
            @foreach ($liderBoards as $liderBoard)
            <option value="{{$liderBoard->id}}">{{$liderBoard->title}}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-yazdan">اضافه کردن</button>
    </form>
</div>
