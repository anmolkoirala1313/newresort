<section class="about-area-two pt-110 pb-120">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-5 col-md-9 order-0 order-lg-1">
                <div class="about-content-two">
                    <div class="section-title mb-10 tg-heading-subheading animation-style2">
                        <span class="sub-title tg-element-title">{{ $element->first()->subtitle ?? '' }}</span>
                        <h2 class="title tg-element-title">{{ $element->first()->title ?? '' }}</h2>
                    </div>
                    <p class="text-align-justify">
                        {!!  $element->first()->description ?? ''  !!}
                    </p>
                    @if($element->first()->button_link)
                        <a href="{{$element->first()->button_link}}" class="btn transparent-btn">{{ $element->first()->button ?? 'Explore more' }}</a>
                    @endif
                </div>
            </div>
            <div class="col-lg-7">
                <div class="map" style="padding-left: 0">
                    <div class="main-img">
                        @if($setting_data && $setting_data->google_map)
                            <iframe src="{{ $setting_data->google_map }}" style="border:0;width: 625px;height: 620px;" allowfullscreen="" loading="lazy"></iframe>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-shape-wrap">
        <img src="{{ asset('assets/frontend/img/images/about_shape02.png') }}" alt="">
    </div>
</section>


