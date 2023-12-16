@extends('frontend.layouts.master')
@section('title') Home @endsection
@section('css')

@endsection
@section('content')

    <!-- Slider -->
    <header class="header slider-fade">
        <div class="owl-carousel owl-theme">
            <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
            @foreach($data['sliders']  as $index=>$slider)
                <div class="text-center item bg-img" data-overlay-dark="2" data-background="{{ asset(imagePath($slider->image)) }}">
                    <div class="v-middle caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                        <span>
                                            <i class="star-rating"></i>
                                            <i class="star-rating"></i>
                                            <i class="star-rating"></i>
                                            <i class="star-rating"></i>
                                            <i class="star-rating"></i>
                                        </span>
                                    <h4>{{ $slider->subtitle ?? '' }}</h4>
                                    <h1>{{ $slider->title ?? '' }}</h1>
                                    @if($slider->link)
                                        <div class="butn-light mt-30 mb-30">
                                            <a href="{{ $slider->link ?? '' }}" data-scroll-nav="1"><span>{{ $slider->button ?? 'Rooms & Suites' }}</span></a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- slider reservation -->
        <div class="reservation">
            <a href="tel:{{ $setting_data->phone ?? $setting_data->mobile }}">
                <div class="icon d-flex justify-content-center align-items-center">
                    <i class="flaticon-call"></i>
                </div>
                <div class="call"><span>{{ $setting_data->phone ?? $setting_data->mobile }}</span> <br>Reservation</div>
            </a>
        </div>
    </header>

    <!-- Booking Search -->
{{--    <div class="booking-wrapper">--}}
{{--        <div class="container">--}}
{{--            <div class="booking-inner clearfix">--}}
{{--                <form action="https://duruthemes.com/demo/html/cappa/demo1-light/rooms.html" class="form1 clearfix">--}}
{{--                    <div class="col1 c1">--}}
{{--                        <div class="input1_wrapper">--}}
{{--                            <label>Check in</label>--}}
{{--                            <div class="input1_inner">--}}
{{--                                <input type="text" class="form-control input datepicker" placeholder="Check in">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col1 c2">--}}
{{--                        <div class="input1_wrapper">--}}
{{--                            <label>Check out</label>--}}
{{--                            <div class="input1_inner">--}}
{{--                                <input type="text" class="form-control input datepicker" placeholder="Check out">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col2 c3">--}}
{{--                        <div class="select1_wrapper">--}}
{{--                            <label>Adults</label>--}}
{{--                            <div class="select1_inner">--}}
{{--                                <select class="select2 select" style="width: 100%">--}}
{{--                                    <option value="1">1 Adult</option>--}}
{{--                                    <option value="2">2 Adults</option>--}}
{{--                                    <option value="3">3 Adults</option>--}}
{{--                                    <option value="4">4 Adults</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col2 c4">--}}
{{--                        <div class="select1_wrapper">--}}
{{--                            <label>Children</label>--}}
{{--                            <div class="select1_inner">--}}
{{--                                <select class="select2 select" style="width: 100%">--}}
{{--                                    <option value="1">Children</option>--}}
{{--                                    <option value="1">1 Child</option>--}}
{{--                                    <option value="2">2 Children</option>--}}
{{--                                    <option value="3">3 Children</option>--}}
{{--                                    <option value="4">4 Children</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col2 c5">--}}
{{--                        <div class="select1_wrapper">--}}
{{--                            <label>Rooms</label>--}}
{{--                            <div class="select1_inner">--}}
{{--                                <select class="select2 select" style="width: 100%">--}}
{{--                                    <option value="1">1 Room</option>--}}
{{--                                    <option value="2">2 Rooms</option>--}}
{{--                                    <option value="3">3 Rooms</option>--}}
{{--                                    <option value="4">4 Rooms</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col3 c6">--}}
{{--                        <button type="submit" class="btn-form1-submit">Check Now</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    @if($data['homepage']->description)
        <section class="about section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 mb-30 animate-box" data-animate-effect="fadeInUp">
                        <div class="section-subtitle">{{ $data['homepage']->subtitle ?? '' }}</div>
                        <div class="section-title">{{ $data['homepage']->title ?? '' }}</div>
                        <div class="text-align-justify">{!! $data['homepage']->description ?? '' !!}</div>
                        @if($data['homepage']->link)
                            <div class="butn-dark">
                                <a href="{{ $data['homepage']->link ?? '' }}"><span>{{ $data['homepage']->button }}</span></a>
                            </div>
                        @endif
                    </div>
                    <div class="col col-md-5 animate-box" data-animate-effect="fadeInUp">
                        <img src="{{ asset(imagePath($data['homepage']->image)) }}" alt="" class="mb-10">
                        @if($data['homepage']->video)
                            <a class="video-gallery-button vid" href="{{ $data['homepage']->video }}">
                                <span class="video-gallery-polygon">
                                        <i class="ti-control-play"></i>
                                </span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($data['rooms']) > 1)
        <section class="rooms3 section-padding bg-cream" data-scroll-index="1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-subtitle">The best of</div>
                        <div class="section-title">Rooms & Suites</div>
                    </div>
                </div>
                <div class="row">
                    @foreach($data['rooms'] as $room)
                        <div class="col-md-4">
                           <div class="square-flip">
                                <div class="square bg-img" data-background="{{ asset(imagePath($room->image)) }}">
                                    <span class="category">
                                        <a href="#">Book</a>
                                    </span>
                                    <div class="square-container d-flex align-items-end justify-content-end">
                                        <div class="box-title">
                                            @if($room->price)
                                                <h6>{{ $room->price }} / Night</h6>
                                            @endif
                                            <h4>{{ $room->title ?? '' }}</h4>
                                        </div>
                                    </div>
                                    <div class="flip-overlay"></div>
                                </div>
                                <div class="square2 bg-white">
                                    <div class="square-container2">
                                        @if($room->price)
                                            <h6>{{ $room->price }} / Night</h6>
                                        @endif
                                        <h4>{{ $room->title ?? '' }}</h4>
                                        <p>{{ elipsis(strip_tags($room->description ?? '')) }}</p>
                                        @if(count($room->amenities))
                                            <div class="row room-facilities mb-30">
                                                @foreach($room->amenities->take(4)->chunk(2) as $chunked_amenity)
                                                    <div class="col-md-6">
                                                        <ul>
                                                            @foreach($chunked_amenity as $amenity)
                                                                <li><img data-src="{{ asset(imagePath($amenity->image)) }}" alt="" class="lazy amenity-image">
                                                                    {{$amenity->title ?? ''}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="btn-line"><a href="{{ route($module.'room.show', $room->slug) }}">Details</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @if($data['homepage']->action_title)
        <section class="video-wrapper video section-padding bg-img bg-fixed" data-overlay-dark="3" data-background="{{ asset('assets/frontend/img/slider/2.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center">
                        <span><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></span>
                        <div class="section-subtitle"><span>{{ $data['homepage']->action_subtitle ?? '' }}</span></div>
                        <div class="section-title"><span>{{ $data['homepage']->action_title ?? '' }}</span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center col-md-12">
                        <div class="butn-dark">
                            <a href="{{ $data['homepage']->action_link ?? '/contact-us' }}"><span>{{ $data['homepage']->action_button ?? 'Start Booking' }}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($data['services']) > 0)
        <section class="services section-padding3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-subtitle">Our Services</div>
                        <div class="section-title">Hotel Facilities</div>
                    </div>
                </div>
                @foreach($data['services'] as $index=>$service)
                    @if($loop->odd)
                        <div class="row">
                            <div class="col-md-6 p-0 animate-box" data-animate-effect="fadeInLeft">
                                <div class="img left">
                                    <a href="{{ route('frontend.service.show', $service->key) }}"><img class="lazy" data-src="{{ asset(thumbnailImagePath($service->image)) }}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-6 p-0 bg-cream valign animate-box" data-animate-effect="fadeInRight">
                                <div class="content">
                                    <div class="cont text-left">
                                        <div class="info">
                                            <h6>{{ $service->subtitle ?? '' }}</h6>
                                        </div>
                                        <h4>{{ $service->title ?? '' }}</h4>
                                        <p>{{ elipsis($service->description ?? '') }}</p>
                                        <div class="butn-dark"> <a href="{{ route('frontend.service.show', $service->key) }}"><span>Learn More</span></a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-6 p-0 animate-box bg-cream order2 valign " data-animate-effect="fadeInLeft">
                                <div class="content">
                                    <div class="cont text-left">
                                        <div class="info">
                                            <h6>{{ $service->subtitle ?? '' }}</h6>
                                        </div>
                                        <h4>{{ $service->title ?? '' }}</h4>
                                        <p>{{ elipsis($service->description ?? '') }}</p>
                                        <div class="butn-dark"> <a href="{{ route('frontend.service.show', $service->key) }}"><span>Learn More</span></a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 p-0 order1 animate-box" data-animate-effect="fadeInRight">
                                <div class="img">
                                    <a href="{{ route('frontend.service.show', $service->key) }}"><img class="lazy" data-src="{{ asset(thumbnailImagePath($service->image)) }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    @endif

    @if(count($data['testimonials'])>0)
        <section class="testimonials">
            <div class="background bg-img bg-fixed section-padding pb-0" data-background="{{asset('assets/frontend/img/slider/2.jpg')}}" data-overlay-dark="3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="testimonials-box">
                                <div class="head-box">
                                    <h6>Testimonials</h6>
                                    <h4>Review From Our Clients.</h4>
                                    <div class="line"></div>
                                </div>
                                <div class="owl-carousel owl-theme">
                                    @foreach($data['testimonials'] as $index=>$testimonial)
                                        <div class="item">
                                            <span class="quote"><img class="lazy" data-src="{{asset('assets/frontend/img/quot.png')}}" alt=""></span>
                                            <p>
                                                {{ $testimonial->description }}
                                            </p>
                                            <div class="info">
                                                <div class="author-img">
                                                    <img src="{{ asset(imagePath($testimonial->image))}}" alt="">
                                                </div>
                                                <div class="cont">
                                                    <h6>{{ $testimonial->title ?? '' }}</h6>
                                                    <span>
                                                        {{ $testimonial->position ?? '' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($data['blogs'])>0)
        <!-- News -->
        <section class="news section-padding bg-cream">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-subtitle"><span>Hotel Blog</span></div>
                        <div class="section-title">Read Our Latest Updates</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme">
                            @foreach($data['blogs'] as $blog)
                                <div class="item">
                                    <div class="position-re o-hidden">
                                        <img class="lazy" data-src="{{ asset(thumbnailImagePath($blog->image))}}" alt="">
                                        <div class="date">
                                            <a href="{{ route('frontend.blog.show', $blog->slug) }}"> <span>{{date('M Y', strtotime($blog->created_at))}}</span> <i>{{date('d', strtotime($blog->created_at))}}</i> </a>
                                        </div>
                                    </div>
                                    <div class="con"> <span class="category">
                                                <a href="{{ route('frontend.blog.show', $blog->slug) }}">{{ $blog->blogCategory->title ?? '' }}</a>
                                            </span>
                                        <h5><a href="{{ route('frontend.blog.show', $blog->slug) }}">{{ $blog->title ?? '' }}</a></h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if(count( $data['clients']) > 0)
        <section class="clients">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-subtitle"><span>Our Working Link</span></div>
                        <div class="section-title">Companies We Collaborate With</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme">
                            @foreach($data['clients'] as $index=>$client)
                                <div class="clients-logo">
                                    <a href="{{ $client->link ?? '#' }}" target="{{ ($client->link !== null) ? '_blank':'' }}">
                                        <img src="{{ asset(imagePath($client->image)) }}" alt="" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
@endsection
