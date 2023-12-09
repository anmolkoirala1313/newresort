<section class="choose-area-three">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="choose-content-three">
                    <div class="section-title mb-10 tg-heading-subheading animation-style2">
                        <span class="sub-title tg-element-title">{{ $element->first()->subtitle ?? '' }}</span>
                        <h2 class="title tg-element-title">{{ $element->first()->title ?? '' }}</h2>
                    </div>
                    <p class="text-align-justify"> {!! $element->first()->description ?? '' !!}</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="choose-img-three">
                    <img class="lazy" data-src="{{ asset(imagePath($element->first()->image)) }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
