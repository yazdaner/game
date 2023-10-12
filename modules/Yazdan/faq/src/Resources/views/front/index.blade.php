@extends('Front::layouts.master')
@section('content')
<section class="faq-area ptb-100">
    <div class="container mt-5">
        <h2 class="text-center "><strong>سوالات متداول</strong></h2>
        <div class="tab faq-accordion-tab mt-5">
            <div class="tab-content">
                <div class="tabs-item">
                    <div class="faq-accordion">
                        <ul class="accordion">
                            @foreach ($faqs as $faq)
                            <li class="accordion-item">
                                <a class="accordion-title @if($loop->first) active @endif" href="javascript:void(0)">
                                    <i class="bx bx-chevron-down"></i>
                                    <p>{{$faq->question}}</p>
                                </a>

                                <div class="accordion-content @if($loop->first) show @endif">
                                    <p>
                                        {{$faq->answer}}
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                </ul>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection
