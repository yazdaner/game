<link rel="stylesheet" href="/panel/css/jquery.toast.min.css">

<script src="/panel/js/jquery.toast.min.js"></script>

<script>
    @if (session()->has('feedbacks'))
       @foreach (session()->get('feedbacks') as $item)
            $.toast({
                    heading: "{{$item['title']}}",
                    text: "{{$item['body']}}",
                    showHideTransition: "slide",
                    icon: "{{$item['type']}}",
                    position : 'top-left',
                });
       @endforeach
    @endif
</script>
