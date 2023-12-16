{{--<section class="blog-details-area pb-120">--}}
{{--    <div class="container">--}}
{{--        @if($element->first()->subtitle)--}}
{{--            <div class="row align-items-end">--}}
{{--                <div class="col-lg-6">--}}
{{--                    <div class="section-title mb-40 tg-heading-subheading animation-style2">--}}
{{--                        <h2 class="title tg-element-title">{{ $element->first()->subtitle ?? '' }}</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <div class="blog-details-wrap">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-100">--}}
{{--                    <div class="blog-details-content">--}}
{{--                        <div class="text-align-justify custom-description">--}}
{{--                            {!! $element->first()->description ?? '' !!}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<section class="section-padding">
    <div class="container">
        @if($element->first()->title)
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle">{{ $element->first()->subtitle ?? '' }}</div>
                    <div class="section-title">{{ $element->first()->title ?? '' }}</div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="text-align-justify custom-description">
                    {!! $element->first()->description ?? '' !!}
                </div>
            </div>
        </div>
    </div>
</section>
