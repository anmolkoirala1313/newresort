@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection
@section('css')
@endsection

@section('content')

    @include($module.'includes.breadcrumb', ['breadcrumb_image'=>'3.jpg'])


    <section class="contact section-padding">
        <div class="container">
            <div class="row mb-90">
                <div class="col-md-5 mb-60">
                    <h3>Our Contact Information</h3>
                    <div class="reservations mb-30">
                        <div class="icon"><span class="flaticon-call"></span></div>
                        <div class="text">
                            <p>Reservation</p>
                            <a href="tel:{{ $data['setting_data']->phone ?? $data['setting_data']->mobile }}">
                                {{ $data['setting_data']->phone ?? $data['setting_data']->mobile }}
                            </a>
                        </div>
                    </div>
                    <div class="reservations mb-30">
                        <div class="icon"><span class="flaticon-envelope"></span></div>
                        <div class="text">
                            <p>Email Info</p> <a href="mailto:{{ $data['setting_data']->email }}">{{ $data['setting_data']->email }}</a>
                        </div>
                    </div>
                    <div class="reservations">
                        <div class="icon"><span class="flaticon-location-pin"></span></div>
                        <div class="text">
                            <p>Address</p> {{ $data['setting_data']->address ?? '' }}
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mb-30 offset-md-1">
                    <h3>Get in touch</h3>
                    {!! Form::open(['route' => $module.'contact-us.store', 'method'=>'POST', 'class'=>'contact__form','novalidate'=>'novalidate']) !!}
                        <!-- form message -->
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success contact__msg" style="display: none" role="alert"> Your message was sent successfully. </div>
                            </div>
                        </div>
                        <!-- form elements -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input name="name" type="text" placeholder="Your Name *" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="email" type="email" placeholder="Your Email *" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="number" type="text" placeholder="Your Number *" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="subject" type="text" placeholder="Subject *" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea name="message" id="message" cols="30" rows="4" placeholder="Message *" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="butn-dark2"><span>Send Message</span></button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- Map Section -->
            @if($data['setting_data'] && $data['setting_data']->google_map)
                <div class="row">
                    <div class="col-md-12 map animate-box" data-animate-effect="fadeInUp">
                        <iframe src="{{$data['setting_data']->google_map}}" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_alert')
@endsection
