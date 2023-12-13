@extends('frontend.layouts.master')
@section('title') Home @endsection
@section('css')

@endsection
@section('content')

    <section class="slider-area">
        <div class="slider-active">
            @foreach($data['sliders']  as $index=>$slider)
                <div class="single-slider slider-bg" data-background="{{ asset(imagePath($slider->image)) }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="slider-content">
                                    <span class="sub-title" data-animation="fadeInUp" data-delay=".2s">{{ $slider->subtitle ?? '' }}</span>
                                    <h2 class="title" data-animation="fadeInUp" data-delay=".4s">{{ $slider->title ?? '' }}</h2>
                                    @if($slider->link)
                                        <a href="{{ $slider->link ?? '' }}" class="btn" data-animation="fadeInUp" data-delay=".8s">{{ $slider->link ?? 'View More' }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-shape">
                        <img class="lazy" data-src="{{ asset('assets/frontend/img/banner/banner_shape.png') }}" alt="" data-animation="zoomIn" data-delay=".8s">
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @if($data['homepage']->mission)
        <section class="services-area-four">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="services-item-four">
                            <div class="services-icon-four">
                                <i class="flaticon-mission"></i>
                            </div>
                            <div class="services-content-four">
                                <h2 class="title"><a>Mission</a></h2>
                                <p>{{ $data['homepage']->mission ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="services-item-four">
                            <div class="services-icon-four">
                                <i class="flaticon-business-presentation"></i>
                            </div>
                            <div class="services-content-four">
                                <h2 class="title"><a>Vision</a></h2>
                                <p>{{ $data['homepage']->vision ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="services-item-four">
                            <div class="services-icon-four">
                                <i class="flaticon-heart"></i>
                            </div>
                            <div class="services-content-four">
                                <h2 class="title"><a>Value</a></h2>
                                <p>{{ $data['homepage']->value ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($data['homepage']->description)
        <section class="about-area-six">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        @if($data['homepage']->image_position == 'left')
                            @include($module.'partials.welcome_image')
                        @else
                            @include($module.'partials.welcome_description')
                        @endif
                    </div>
                    <div class="col-lg-6">
                        @if($data['homepage']->image_position == 'right')
                            @include($module.'partials.welcome_image')
                        @else
                            @include($module.'partials.welcome_description')
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="counter-area-three pb-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="counter-item-three">
                        <div class="counter-icon">
                            <i class="flaticon-folder-1"></i>
                        </div>
                        <div class="counter-content">
                            <h2 class="count"><span class="odometer" data-count="{{ $data['homepage']->project_completed ?? '600' }}"></span></h2>
                            <p>Projects Done</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="counter-item-three">
                        <div class="counter-icon">
                            <i class="flaticon-rating"></i>
                        </div>
                        <div class="counter-content">
                            <h2 class="count"><span class="odometer" data-count="{{ $data['homepage']->happy_clients ?? '560' }}"></span></h2>
                            <p>Happy Clients</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="counter-item-three">
                        <div class="counter-icon">
                            <i class="flaticon-trophy"></i>
                        </div>
                        <div class="counter-content">
                            <h2 class="count"><span class="odometer" data-count="{{ $data['homepage']->visa_approved ?? '785' }}"></span></h2>
                            <p>Visa Approved</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="counter-item-three">
                        <div class="counter-icon">
                            <i class="flaticon-round-table"></i>
                        </div>
                        <div class="counter-content">
                            <h2 class="count"><span class="odometer" data-count="{{ $data['homepage']->success_stories ?? '650' }}"></span></h2>
                            <p>Success Stories</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(count($data['jobs']) > 1)
        <section class="project-area-four" data-background="{{ asset('assets/frontend/img/bg/services_bg02.jpg') }}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8 mb-2">
                        <div class="section-title section-title-three mb-15 tg-heading-subheading animation-style1">
                            <span class="sub-title tg-element-title">Current Demands</span>
                            <h2 class="title tg-element-title">We Can Inspire And Offer <br/>
                                Different Jobs</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="view-all-btn text-end mb-30">
                            <a href="{{ route('frontend.job.index') }}" class="btn transparent-btn custom-btn">View All</a>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach($data['jobs'] as $index=>$job)
                        <div class="col-lg-4 col-md-6 mt-3">
                            <div class="project-item">
                                <div class="project-thumb">
                                    <a href="{{ route('frontend.job.show', $job->slug) }}">
                                        <img class="lazy" data-src="{{ asset(imagePath($job->image)) }}" alt="">
                                    </a>
                                </div>
                                <div class="project-content">
                                    <a href="{{ route('frontend.job.show', $job->slug) }}" class="tag">
                                        @if(@$job->end_date >= date('Y-m-d'))
                                            {{date('M j, Y',strtotime(@$job->start_date))}} - {{date('M j, Y',strtotime(@$job->end_date))}}
                                        @else
                                            Expired
                                        @endif
                                    </a>
                                    <h2 class="title"><a href="{{ route('frontend.job.show', $job->slug) }}">{{ $job->title ?? '' }}</a></h2>
                                    <a href="{{ route('frontend.job.show', $job->slug) }}" class="link-arrow"><i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($data['homepage']->action_title)
        <section class="cta-area-four">
            <div class="container">
                <div class="cta-inner-wrap-two" data-background="{{ asset('assets/frontend/img/bg/cta_bg02.jpg') }}">
                    <div class="row align-items-center">
                        <div class="col-lg-9">
                            <div class="cta-content">
                                <div class="cta-info-wrap">
                                    <div class="icon">
                                        <i class="flaticon-phone-call"></i>
                                    </div>
                                    <div class="content">
                                        <span>Call For More Info</span>
                                        <a href="tel:{{$setting_data->phone ?? $setting_data->mobile ?? ''}}">{{$setting_data->phone ?? $setting_data->mobile ?? ''}}</a>
                                    </div>
                                </div>
                                <h2 class="title">{{ $data['homepage']->action_title ?? '' }}</h2>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="cta-btn text-end">
                                <a href="{{ $data['homepage']->action_link ?? '/contact-us' }}" class="btn btn-three">{{ $data['homepage']->action_button ?? 'Start Here' }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($data['services']) > 0)
        <section class="services-area services-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-50 tg-heading-subheading animation-style2">
                            <span class="sub-title tg-element-title">Our Dedicated Categories</span>
                            <h2 class="title tg-element-title">Spotlight On Some Of <br> Most Important Category</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach($data['services'] as $index=>$service)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="services-item-two">
                                <div class="services-thumb-two">
                                    <img class="lazy" data-src="{{ asset(thumbnailImagePath($service->image)) }}" alt="">
                                    <div class="item-shape">
                                        <img class="lazy" data-src="{{ asset('assets/frontend/img/services/services_item_shape.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="services-content-two">
                                    <div class="icon">
                                        <i class="flaticon-layers"></i>
                                    </div>
                                    <h2 class="title"><a href="{{ route('frontend.service.show', $service->key) }}">{{ $service->title ?? '' }}</a></h2>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if(count( $data['clients']) > 0)
        <section class="brand-aera-two">
            <div class="container">
                <div class="brand-item-wrap">
                    <h6 class="title">Trusted by many companies around the world</h6>
                    <div class="row brand-active">
                        @foreach($data['clients'] as $index=>$client)
                            <div class="col-lg-12">
                                <div class="brand-item">
                                    <a href="{{ $client->link ?? '#' }}" target="{{ ($client->link !== null) ? '_blank':'' }}">
                                        <img src="{{ asset(imagePath($client->image)) }}" alt="">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($data['homepage']->coreValueDetail))
        <section class="features-area" data-background="{{ asset('assets/frontend/img/bg/counter_bg.jpg') }}">
            <div class="container">
                <div class="section-title mb-30 tg-heading-subheading animation-style2">
                    <span class="sub-title tg-element-title">Our Unshakeable Beliefs</span>
                    <h2 class="title tg-element-title">Our Core Guiding Values To Ensure <br/> Your Success.</h2>
                </div>
                <div class="row justify-content-center">
                    @foreach($data['homepage']->coreValueDetail as $index=>$core_value)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="features-item">
                                <div class="features-content">
                                    <div class="content-top">
                                        <div class="icon">
                                            <i class="{{ core_value_icon($index) }}"></i>
                                        </div>
                                        <h2 class="title">{{ $core_value->title ?? '' }}</h2>
                                    </div>
                                    <p>{{ $core_value->description ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="about-shape-wrap">
                <img class="lazy" data-src="{{ asset('assets/frontend/img/images/about_shape01.png') }}" alt="">
                <img class="lazy" data-src="{{ asset('assets/frontend/img/images/about_shape02.png') }}" alt="">
            </div>
        </section>
    @endif

    @if(count($data['homepage']->recruitmentProcess))
        <section class="features-area-three">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7">
                        <div class="section-title mb-50 text-center tg-heading-subheading animation-style2">
                            <span class="sub-title tg-element-title">Our Dedicated Work Flow</span>
                            <h2 class="title tg-element-title">Shedding Light On Our <br> Working Process</h2>
                        </div>
                    </div>
                </div>
                <div class="features-item-wrap-two">
                    <div class="row justify-content-center">
                        @foreach($data['homepage']->recruitmentProcess as $index=>$process)
                            <div class="col-xl-3 col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="features-item-three">
                                    <div class="features-icon-three icon-custom">
                                        <span>{{ $index+1 }}</span>
                                    </div>
                                    <div class="features-content-three">
                                        <h2 class="title">{{ $process->title ?? '' }}</h2>
                                        <p>  {{ $process->description ?? '' }} </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($data['homepage']->why_title)
        <section class="faq-area">
            <div class="faq-bg-shape" data-background="{{ asset('assets/frontend/img/images/faq_shape01.png') }}"></div>
            <div class="faq-shape-wrap">
                <img class="lazy" data-src="{{ asset('assets/frontend/img/images/faq_shape02.png') }}" alt="">
                <img class="lazy" data-src="{{ asset('assets/frontend/img/images/faq_shape03.png') }}" alt="">
            </div>
            <div class="container">
                <div class="row align-items-end justify-content-center">
                    <div class="col-lg-6 col-md-9">
                        <div class="faq-img-wrap">
                            <img class="lazy" data-src="{{ asset(imagePath($data['homepage']->why_image)) }}" alt="">
                            @if($data['homepage']->why_video)
                                <a href="{{ $data['homepage']->why_video }}" class="play-btn popup-video"><i class="fas fa-play"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="faq-content">
                            <div class="section-title mb-30 tg-heading-subheading animation-style2">
                                <span class="sub-title tg-element-title">{{ $data['homepage']->why_subtitle ?? 'Why Choose Us' }}</span>
                                <h2 class="title tg-element-title">{{ $data['homepage']->why_title ?? '' }}</h2>
                            </div>
                            <p class="text-align-justify">
                                {{ $data['homepage']->why_description ?? '' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($data['director']) > 0)
        <section class="testimonial-area-three pt-90 pb-70">
            <div class="container">
                <div class="section-title mb-50 text-center tg-heading-subheading animation-style2">
                    <span class="sub-title tg-element-title">Upclose with our team</span>
                    <h2 class="title tg-element-title">Our Director Shares Their <br> Valuable Message</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="testimonial-active-five">
                            @foreach($data['director'] as $index=>$director)
                                <div class="testimonial-active-three">
                                    <div class="container">
                                        <div class="row g-0 align-items-end">
                                            <div class="col-37">
                                                <div class="testimonial-img-three">
                                                    <img src="{{ asset(imagePath($director->image)) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-63">
                                                <div class="testimonial-item-wrap-three" data-background="{{ asset('assets/frontend/img/bg/h3_testimonial_bg.png') }}">
                                                    <div class="testimonial-active-threes">
                                                        <div class="testimonial-item-three">
                                                            <div class="testimonial-content-three">
                                                                <p>{{ $director->description ?? '' }} </p>
                                                                <div class="testimonial-info">
                                                                    <h2 class="title">{{ $director->title ?? '' }}</h2>
                                                                    <span>{{ $director->designation ?? '' }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($data['testimonials'])>0)
        <section class="testimonial-area-two testimonial-bg-two" data-background="{{asset('assets/frontend/img/bg/h2_testimonial_bg.jpg')}}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="section-title mb-50 text-center tg-heading-subheading animation-style2">
                            <span class="sub-title tg-element-title">Our Testimonials</span>
                            <h2 class="title text-white tg-element-title">What Customers Say’s About  <br> Our Services</h2>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item-wrap-two">
                    <div class="row testimonial-active-two">
                        @foreach($data['testimonials'] as $index=>$testimonial)
                            <div class="col-lg-6">
                                <div class="testimonial-item-two">
                                    <div class="testimonial-content-two">
                                        <p>
                                            {{ $testimonial->description }}
                                        </p>
                                        <div class="testimonial-avatar">
                                            <div class="avatar-thumb">
                                                <img src="{{ asset(imagePath($testimonial->image))}}" alt="">
                                            </div>
                                            <div class="avatar-info">
                                                <h2 class="title">{{ $testimonial->title ?? '' }}</h2>
                                                <span>{{ $testimonial->position ?? '' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="testimonial-nav-two"></div>
                </div>
            </div>
        </section>
    @endif

    @if($data['homepage']->grievance_title)
        <section class="about-area-two pt-110 pb-120">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7 col-md-9 order-0 order-lg-2">
                    <div class="about-img-two" style="padding-left: 0">
                        <div class="main-img">
                            @if($data['map'])
                                <iframe src="{{$data['map']}}" style="border:0;width: 625px;height: 620px;" allowfullscreen="" loading="lazy"></iframe>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-content-two">
                        <div class="section-title mb-30 tg-heading-subheading animation-style2">
                            <span class="sub-title tg-element-title">General Grievance</span>
                            <h2 class="title tg-element-title">{{ $data['homepage']->grievance_title ?? '' }}</h2>
                        </div>
                        <p class="text-align-justify">
                            {{ $data['homepage']->grievance_description }}
                        </p>
                        <a href="{{ route('frontend.contact-us') }}" class="btn transparent-btn">Get In Touch</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-shape-wrap">
            <img src="{{ asset('assets/frontend/img/images/about_shape02.png') }}" alt="">
        </div>
    </section>
    @endif

    @if(count($data['blogs'])>0)
        <section class="blog-post-area">
            <div class="blog-bg"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-60 tg-heading-subheading animation-style2">
                            <span class="sub-title tg-element-title">News & Blogs</span>
                            <h2 class="title tg-element-title">Read Our Latest Updates</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach($data['blogs'] as $blog)
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="blog-post-item">
                                <div class="blog-post-thumb">
                                    <a href="blog-details.html">
                                        <img class="lazy" data-src="{{ asset(imagePath($blog->image))}}" alt=""></a>
                                    <span class="date"><strong>{{date('d', strtotime($blog->created_at))}}</strong>{{date('M Y', strtotime($blog->created_at))}}</span>
                                </div>
                                <div class="blog-post-content">
                                    <a href="{{ route('frontend.blog.show', $blog->slug) }}" class="tag">{{ $blog->blogCategory->title ?? '' }}</a>
                                    <h2 class="title"><a href="{{ route('frontend.blog.show', $blog->slug) }}"> {{ $blog->title ?? '' }}</a></h2>
                                    <a href="{{ route('frontend.blog.show', $blog->slug) }}" class="link-btn">Read All <i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection

@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
@endsection
