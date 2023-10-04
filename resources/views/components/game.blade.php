<div {{ $attributes->merge(['class' => 'matches-team']) }}>
    <a href="{{$link ?? ''}}">
        <img src="{{$img}}" class="wow fadeInLeft gameImg" data-wow-delay="00ms"
        data-wow-duration="1500ms" alt="image">
    </a>

    <div class="content">
        <h3><a href="{{$link ?? ''}}">{{$title}}</a></h3>
    </div>

</div>
