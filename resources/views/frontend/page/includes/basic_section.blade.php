<section class="about section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-md-5 animate-box" data-animate-effect="fadeInUp">
                <img class="lazy" data-src="{{ asset(imagePath($element->first()->image)) }}" alt="">
                @if($element->first()->list_title)
                    <a class="video-gallery-button vid" href="{{ $element->first()->list_title }}">
                        <span class="video-gallery-polygon">
                                <i class="ti-control-play"></i>
                        </span>
                    </a>
                @endif
            </div>
            <div class="col-md-7 mb-30 animate-box" data-animate-effect="fadeInUp">
                <div class="section-subtitle">{{ $element->first()->subtitle ?? '' }}</div>
                <div class="section-title" style="margin-bottom: 15px;">{{ $element->first()->title ?? '' }}</div>
                <div class="text-align-justify">{!! $element->first()->description ?? '' !!}</div>
                @if($element->first()->button_link)
                    <div class="butn-dark mt-2">
                        <a href="{{$element->first()->button_link}}"><span>{{ $element->first()->button ?? 'Reach Out' }}</span></a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

