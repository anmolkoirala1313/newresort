<section class="request-area request-bg" data-background="{{ asset('assets/frontend/img/bg/request_bg.jpg') }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="request-content tg-heading-subheading animation-style2">
                    <h2 class="title tg-element-title">{{ $element->first()->title ?? '' }}</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="request-content-right">
                    <div class="request-contact">
                        <div class="icon">
                            <i class="flaticon-phone-call"></i>
                        </div>
                        <div class="content">
                            <a href="tel:{{ $setting_data->phone ?? $setting_data->mobile ?? '' }}">{{ $setting_data->phone ?? $setting_data->mobile ?? '' }}</a>
                        </div>
                    </div>
                    @if($element->first()->button_link)
                        <div class="request-btn">
                            <a href="{{ $element->first()->button_link }}" class="btn">{{ $element->first()->button ?? 'Learn More' }}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="request-shape">
        <img src="{{ asset('assets/frontend/img/images/request_shape.png') }}" alt="">
    </div>
</section>
