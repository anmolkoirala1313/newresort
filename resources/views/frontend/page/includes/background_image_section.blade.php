<section class="section-padding bg-cream" style="padding: 120px 0 60px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="rooms2 mb-90 animate-box" data-animate-effect="fadeInUp">
                    <figure>
                        <img class="lazy" data-src="{{ asset(imagePath($element->first()->image)) }}" alt="">
                    </figure>
                    <div class="caption" style="padding: 4% 4% 4% 4%;">
                        <h3><span>{{ $element->first()->subtitle ?? '' }}</span></h3>
                        <h4><a>{{ $element->first()->title ?? '' }}</a></h4>
                        <p class="text-align-justify"> {!! $element->first()->description ?? '' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
