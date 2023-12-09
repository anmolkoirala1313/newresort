@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection
@section('css')
@endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'breadcrumb_bg.jpg'])


    <section class="contact-area contact-bg" data-background="{{asset('assets/frontend/img/bg/contact_bg.jpg')}}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="contact-content">
                        <div class="section-title mb-30 tg-heading-subheading animation-style2">
                            <span class="sub-title tg-element-title">GET IN TOUCH</span>
                            <h2 class="title tg-element-title">We Are Connected To Help Your Business!</h2>
                        </div>
                        <p>Ever find yourself staring at your computer screen a good consulting slogan to come to mind? Oftentimes.</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact-form">
                        {!! Form::open(['route' => $module.'contact-us.store', 'method'=>'POST', 'class'=>'submit_form','novalidate'=>'novalidate']) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input type="text" placeholder="Name *" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input type="email" placeholder="E-mail *" name="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input type="number" placeholder="Phone *" name="phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input type="text" placeholder="Subject *" name="subject">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-grp">
                                        <textarea placeholder="Message *" name="message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit">Submit Now</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-shape">
            <img src="{{ asset('assets/frontend/img/images/contact_shape.png') }}" alt="">
        </div>
    </section>


    <div class="contact-map">
        @if($data['setting_data'] && $data['setting_data']->google_map)
            <iframe src="{{$data['setting_data']->google_map}}" allowfullscreen loading="lazy"></iframe>
        @endif
    </div>

    <!--Information Start-->
{{--    <section class="information">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <!--Information Single Start-->--}}
{{--                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">--}}
{{--                    <div class="information__single">--}}
{{--                        <div class="information__icon">--}}
{{--                            <span class="icon-chat-1"></span>--}}
{{--                        </div>--}}
{{--                        <p class="information__text">Send Message</p>--}}
{{--                        <p class="information__number">Use our contact form</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--Information Single End-->--}}
{{--                <!--Information Single Start-->--}}
{{--                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">--}}
{{--                    <div class="information__single">--}}
{{--                        <div class="information__icon">--}}
{{--                            <span class="icon-phone-call"></span>--}}
{{--                        </div>--}}
{{--                        <p class="information__text">Call Us</p>--}}
{{--                        <p class="information__number"><a href="tel:{{ $data['setting_data']->phone ?? $data['setting_data']->mobile ?? '' }}">{{ $data['setting_data']->phone ?? $data['setting_data']->mobile ?? '' }}</a></p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--Information Single End-->--}}
{{--                <!--Information Single Start-->--}}
{{--                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">--}}
{{--                    <div class="information__single">--}}
{{--                        <div class="information__icon">--}}
{{--                            <span class="icon-gmail"></span>--}}
{{--                        </div>--}}
{{--                        <p class="information__text">Mail Us</p>--}}
{{--                        <p class="information__number"><a href="mailto:{{ $data['setting_data']->email }}">{{ $data['setting_data']->email }}</a>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--Information Single End-->--}}
{{--                <!--Information Single Start-->--}}
{{--                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">--}}
{{--                    <div class="information__single">--}}
{{--                        <div class="information__icon">--}}
{{--                            <span class="icon-location-2"></span>--}}
{{--                        </div>--}}
{{--                        <p class="information__text">Office Address</p>--}}
{{--                        <p class="information__number">{{ $data['setting_data']->address }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--Information Single End-->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!--Information End-->


@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_alert')
@endsection
