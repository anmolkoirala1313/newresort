<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ucwords(@$setting_data->meta_description ?? '')}}"/>
    <meta name="keywords" content=" {{@$setting_data->meta_tags ?? ''}}">
    <link rel="canonical" href="https://s.com.np" />

    @if (\Request::is('/'))
        <title> {{ucwords($setting_data->title ?? '')}}</title>
    @else
        <title>@yield('title') |  {{ucwords($setting_data->title ?? '')}} </title>
    @endif

    <link rel="shortcut icon" type="image/x-icon" href="{{ $setting_data->favicon ?  asset(imagePath($setting_data->favicon)) : ''}}">

    <meta property="og:title" content="{{ucwords(@$setting_data->meta_title ?? '')}}" />
    <meta property="og:type" content="Consultancy" />
    <meta property="og:url" content="https://s.com.np" />
    <meta property="og:site_name" content="{{ucwords($setting_data->title ?? '')}}" />
    <meta property="og:description" content="{{ucwords(@$setting_data->meta_description ?? '')}}" />

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jarallax.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">

    <script async src="https://www.googletagmanager.com/gtag/js?id={{@$setting_data->google_analytics}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{@$setting_data->google_analytics}}');
    </script>

    @yield('css')
    @stack('styles')
</head>
<body>

<!-- preloader -->
<div id="preloader">
    <div id="loading-center">
        <div class="loader">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
        </div>
    </div>
</div>
<!-- preloader-end -->

<!-- Scroll-top -->
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="fas fa-angle-up"></i>
</button>
<!-- Scroll-top-end-->

<!-- header-area -->
<header class="transparent-header">
    <div class="heder-top-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="header-top-left">
                        <ul class="list-wrap">
                            <li><i class="flaticon-location"></i>{{ $setting_data->address ?? '' }}</li>
                            <li><i class="flaticon-mail"></i><a href="mailto:{{ $setting_data->email ?? '' }}">{{ $setting_data->email ?? '' }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="header-top-right">
                        <div class="header-contact">
                            <a href="tel:{{ $setting_data->phone ?? $setting_data->mobile }}"><i class="flaticon-phone-call"></i>{{ $setting_data->phone ?? $setting_data->mobile }}</a>
                        </div>
                        <div class="header-social">
                            <ul class="list-wrap">
                                @if(@$setting_data->facebook)
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                @endif
                                @if(@$setting_data->instagram)
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                @endif
                                @if(@$setting_data->facebook)
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                @endif
                                @if(@$setting_data->linkedin)
                                    <li><a href="{{$setting_data->linkedin}}"><i class="fab fa-linkedin"></i></a></li>
                                @endif
                                @if(@$setting_data->ticktock)
                                    <li><a href="{{$setting_data->ticktock}}"><i class="fab fa-tiktok"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-header" class="menu-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu-wrap">
                        <nav class="menu-nav">
                            <div class="logo">
                                <a href="/"><img src="{{ $setting_data->logo ?  asset(imagePath($setting_data->logo)) : asset(imagePath($setting_data->logo_white))}}" style="max-width: 355px;" alt=""></a>
                            </div>
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li><a href="/">Home</a></li>
                                    @if(!empty($top_nav_data))
                                        @foreach($top_nav_data as $nav)
                                            @if(!empty($nav->children[0]))
                                                <li class="menu-item-has-children">
                                                    <a href="#">{{ @$nav->name ?? @$nav->title }}</a>
                                                    <ul class="sub-menu">
                                                        @foreach($nav->children[0] as $childNav)
                                                            <li class="{{ !empty($childNav->children[0]) ? 'menu-item-has-children':'' }}">
                                                            <a href="{{get_menu_url($childNav->type, $childNav)}}">
                                                                {{ @$childNav->name ?? @$childNav->title ??''}}
                                                            </a>
                                                            @if(!empty($childNav->children[0]))
                                                                <ul class="sub-menu">
                                                                    @foreach($childNav->children[0] as $key => $lastchild)
                                                                        <li>
                                                                            <a href="{{get_menu_url($lastchild->type, $lastchild)}}" target="{{@$lastchild->target ? '_blank':''}}">
                                                                                {{ @$lastchild->name ?? @$lastchild->title ?? ''}}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">
                                                        {{ @$nav->name ?? @$nav->title ?? ''}}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="header-action d-none d-md-block">
                                <ul class="list-wrap">
                                    <li class="header-search"><a href="#"><i class="flaticon-search"></i></a></li>
                                    <li class="header-btn"><a href="{{route('frontend.contact-us')}}" class="btn btn-two">Contact Us</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <!-- Mobile Menu  -->
                    <div class="mobile-menu">
                        <nav class="menu-box">
                            <div class="close-btn"><i class="fas fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="/"><img src="{{ $setting_data->logo ?  asset(imagePath($setting_data->logo)) : asset(imagePath($setting_data->logo_white))}}" style="max-width: 355px;" alt=""></a>
                            </div>
                            <div class="mobile-search">
                                {!! Form::open(['route' => $module.'job.search', 'method'=>'GET']) !!}
                                    <input type="text" name="for" id="search" placeholder="Search jobs...">
                                    <button><i class="flaticon-search"></i></button>
                                {!! Form::close() !!}
                            </div>
                            <div class="menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix list-wrap">
                                    @if(@$setting_data->facebook)
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    @endif
                                    @if(@$setting_data->instagram)
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    @endif
                                    @if(@$setting_data->facebook)
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    @endif
                                    @if(@$setting_data->linkedin)
                                        <li><a href="{{$setting_data->linkedin}}"><i class="fab fa-linkedin"></i></a></li>
                                    @endif
                                    @if(@$setting_data->ticktock)
                                        <li><a href="{{$setting_data->ticktock}}"><i class="fab fa-tiktok"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu-backdrop"></div>
                    <!-- End Mobile Menu -->

                </div>
            </div>
        </div>
    </div>

    <!-- header-search -->
    <div class="search-popup-wrap" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="search-close">
            <span><i class="fas fa-times"></i></span>
        </div>
        <div class="search-wrap text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title">... Search Here ...</h2>
                        <div class="search-form">
                            {!! Form::open(['route' => $module.'job.search', 'method'=>'GET']) !!}
                                <input type="text" name="for" placeholder="Type Jobs keywords here..">
                                <button class="search-btn"><i class="fas fa-search"></i></button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-search-end -->

</header>
<!-- header-area-end -->


<!-- main-area -->
<main class="fix">
