<section class="about-area-eight pt-120 pb-120" data-background="{{ asset('assets/frontend/img/bg/about_bg.jpg') }}">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-9">
                <div class="about-img-eight">
                    <img class="lazy" data-src="{{ asset(imagePath($element->first()->image)) }}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content-eight">
                    <div class="section-title-two mb-10">
                        <span class="sub-title">{{ $element->first()->subtitle ?? '' }}</span>
                        <h2 class="title">{{ $element->first()->title ?? '' }}</h2>
                    </div>
                    <p class="text-align-justify custom-description">
                        {!! $element->first()->description ?? '' !!}
                    </p>
                    @if($element->first()->button_link)
                        <div class="about-content-bottom">
                            <div class="services-btn">
                                <a href="{{$element->first()->button_link}}" class="btn">{{ $element->first()->button ?? 'Reach Out' }}</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
