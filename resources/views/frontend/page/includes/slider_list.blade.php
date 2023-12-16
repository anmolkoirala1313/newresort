<section class="pricing section-padding" style="background: #343232fa;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle"><span>{{ $element->first()->subtitle ?? '' }}</span></div>
                <div class="section-title"><span>{{ $element->first()->title ?? '' }}</span></div>
            </div>
            <div class="col-md-12">
                @if( $data['slider_list_type'] == 'normal')
                    <div class="row">
                        @include($base_route.'includes.slider_list_detail')
                    </div>

                @else
                    <div class="owl-carousel owl-theme">
                        @include($base_route.'includes.slider_list_detail')
                    </div>
                @endif

            </div>
        </div>
    </div>
</section>
