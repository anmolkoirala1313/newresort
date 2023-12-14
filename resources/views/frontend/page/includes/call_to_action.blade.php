<section class="video-wrapper video section-padding bg-img bg-fixed" data-overlay-dark="3" data-background="{{asset('assets/frontend/img/slider/2.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <span><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></span>
                <div class="section-subtitle"><span>{{ $element->first()->subtitle ?? '' }}</span></div>
                <div class="section-title"><span>{{ $element->first()->title ?? '' }}</span></div>
            </div>
        </div>
        <div class="row">
            <div class="text-center col-md-12 d-flex justify-content-center align-items-center">
                @if($element->first()->button_link)
                    <div class="butn-dark mr-3" style="margin: 10px 20px 0px 0px;">
                        <a href="{{ $element->first()->button_link }}"><span>{{ $element->first()->button ?? 'Learn More' }}</span></a>
                    </div>
                @endif
                @if($element->first()->list_title)
                    <a class="vid" style="margin-top:10px" href="{{ $element->first()->list_title }}">
                        <div class="vid-butn">
                            <span class="icon">
                                <i class="ti-control-play" style="position: relative;top: 28px;left: 5px;"></i>
                            </span>
                        </div>
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>
