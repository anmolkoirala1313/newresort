@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
    <style>
        .testimonials {
            position: relative;
            background-repeat: no-repeat;
            background-size: cover;
            padding: 50px 0;
            font-family: "Poppins", sans-serif;
        }
        .testimonials::before {
            content: "";
            position: absolute;
            right: 0;
            left: 0;
            top: 0;
            bottom: 0;
        }
        .testimonials .title {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
            padding: 20px 0;
            max-width: 600px;
            margin: 0 auto;
        }
        .testimonials .title h5 {
            color: #eb6d2f;
            line-height: 1.2em;
            font-size: 18px;
            font-weight: 900;
            margin-bottom: -3px;
        }
        .testimonials .title h2 {
            color: #5a3733;
            line-height: 1.2em;
            font-weight: 900;
            font-size: 41px;
            letter-spacing: -1px;
            margin: 0;
        }
        .testimonials .title img {
            margin-top: -10px;
        }
        .testimonials .title p {
            margin: 0 0 10px;
            margin-bottom: 0;
            color: #5a3733;
        }
        .testimonials .testi .item {
            background: #fff;
            padding: 50px 30px;
            border-radius: 15px;
            border: 1px solid #f1eeeb;
        }
        .testimonials .testi .item .profile {
            display: flex;
            padding-left: 15px;
        }
        .testimonials .testi .item .profile img {
            border-radius: 100%;
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
        .testimonials .testi .item .profile .information {
            padding-left: 20px;
            margin-bottom: 15px;
        }
        .testimonials .testi .item .profile .information p {
            font-size: 24px;
            margin: 0px auto 0px;
            line-height: 1;
            color: #222;
        }
        .testimonials .testi .item .profile .information span {
            color: #aa8453;
            font-weight: bold;
            margin-top: -4px;
            line-height: 1.6em;
            font-size: 14px;
        }
        .testimonials .testi .item > p {
            font-family: 'Barlow', sans-serif;
            font-size: 15px;
            font-weight: 400;
            line-height: 1.75em;
            color: #666;
            margin-bottom: 20px;
            text-align: justify;
        }
    </style>
@endsection

@section('content')

    @include($module.'includes.breadcrumb', ['breadcrumb_image'=>'5.jpg'])


    <section class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left">

                    <div class="section-subtitle">Testimonials</div>
                    <div class="section-title">What our clients say</div>
                </div>
            </div>
            <div class="row testi">
                @if(count($data['rows'] ))
                    @foreach($data['rows'] as $testimonial)
                        <div class="col-md-6 d-flex align-items-stretch">
                            <div class="item">
                                <div class="profile">
                                    <img class="lazy" data-src="{{ asset(imagePath($testimonial->image)) }}" alt="">
                                    <div class="information">
                                        <p>{{ $testimonial->title ?? '' }}</p>
                                        <span>{{ $testimonial->position ?? '' }}</span>
                                    </div>
                                </div>
                                <p>
                                    {{ $testimonial->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_alert')
@endsection
