<section class="services-area-five inner-services-bg" data-background="{{ asset('assets/frontend/img/bg/inner_services_bg.jpg') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title section-title-three text-center mb-20 tg-heading-subheading animation-style1">
                    <span class="sub-title tg-element-title">{{ $element->first()->subtitle ?? '' }}</span>
                    <h2 class="title tg-element-title">{{ $element->first()->title ?? '' }}</h2>
                </div>
            </div>
        </div>
            @if( $data['slider_list_type'] == 'normal')
                <div class="row justify-content-center">
                    @include($base_route.'includes.slider_list_detail')
                </div>
            @else
            <div class="row services-active">
                @include($base_route.'includes.slider_list_detail')
            </div>
         @endif

        </div>
    </div>
</section>
