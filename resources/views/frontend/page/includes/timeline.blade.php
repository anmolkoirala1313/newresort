<section class="about-area-six features-area-three">
    @if($data['row']->timelines->first() && $data['row']->timelines->first()->heading)
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title section-title-three text-center mb-20 tg-heading-subheading animation-style1">
                    <span class="sub-title tg-element-title">{{ $data['row']->timelines->first()->heading ?? '' }}</span>
                    <h2 class="title tg-element-title">{{ $data['row']->timelines->first()->subheading ?? '' }}</h2>
                </div>
            </div>
        </div>
    @endif
    <div class="jumbotron-fluid grey_light-block pt-5">
        <div class="container">
            <div class="timeline body white">

                <div class="point"></div>

                @foreach($data['row']->timelines as $timeline)
                    <div class="point">
                        {{--                            <div class="year"> 2012 </div>--}}
                        <div class="bocata body text-left row">
                            <div class="col-md-12 title small bold pb-2">{{$timeline->title ?? ''}}</div>
                            <div class="col-md-12 body small custom-description">
                                {!! $timeline->description ?? ''  !!}
                            </div>
                        </div>
                        <i class="arrow"></i>
                    </div>
                @endforeach

{{--                <div class="point">--}}
{{--                    --}}{{--                            <div class="year"> 2013 </div>--}}
{{--                    <div class="bocata body text-left row">--}}
{{--                        <div class="col-md-6 title small bold pb-2">Februsssary</div>--}}
{{--                        <div class="col-md-6 pr-0  body small">I'm glad you liked it so much, thanks for so many likes ❤️.</div>--}}
{{--                    </div>--}}
{{--                    <i class="arrow"></i>--}}
{{--                </div>--}}


            </div>
        </div>
    </div>
    </div>
</section>
