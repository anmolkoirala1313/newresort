{{--<section class="faq-area" style="    padding: 60px 0 96px;">--}}
{{--    <div class="overview-shape" data-aos="fade-left" data-aos-delay="200" data-background="{{ asset('assets/frontend/img/images/overview_shape.png') }}"></div>--}}

{{--    <div class="container">--}}
{{--        <div class="row align-items-end justify-content-center">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="faq-content">--}}
{{--                    <div class="section-title mb-30 tg-heading-subheading animation-style2">--}}
{{--                        <span class="sub-title tg-element-title">Our FAQ's</span>--}}
{{--                        <h2 class="title tg-element-title">{{ $element->first()->title ?? '' }}</h2>--}}
{{--                    </div>--}}
{{--                    <div class="accordion-wrap">--}}
{{--                        <div class="accordion" id="accordionExample">--}}
{{--                            @foreach($element as $index=>$row)--}}
{{--                                <div class="accordion-item">--}}
{{--                                <h2 class="accordion-header">--}}
{{--                                    <button class="{{ $row->list_description ? 'accordion-button':'accordion-button-2' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{$loop->first ? 'true':'false'}}" aria-controls="collapse{{ $index }}">--}}
{{--                                        {{ $row->list_title ?? '' }}--}}
{{--                                    </button>--}}
{{--                                </h2>--}}
{{--                                @if($row->list_description)--}}
{{--                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse {{$loop->first ? 'show':''}}" data-bs-parent="#accordionExample">--}}
{{--                                        <div class="accordion-body">--}}
{{--                                            <p>{{ $row->list_description ?? '' }}</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<section class="section-padding bg-cream">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle">{{ $element->first()->subtitle ?? '' }}</div>
                <div class="section-title">{{ $element->first()->title ?? '' }}</div>
            </div>
            <div class="col-md-12">
                <ul class="accordion-box clearfix">
                    @foreach($element as $index=>$row)
                        <li class="accordion block">
                            <div class="acc-btn"> {{ $row->list_title ?? '' }}</div>
                            @if($row->list_description)
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">
                                            {{ $row->list_description ?? '' }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
