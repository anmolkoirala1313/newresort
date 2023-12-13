<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
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


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow&amp;family=Barlow+Condensed&amp;family=Gilda+Display&amp;display=swap">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}" />
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
<!-- Preloader -->
<div class="preloader-bg"></div>
<div id="preloader">
    <div id="preloader-status">
        <div class="preloader-position loader"> <span></span> </div>
    </div>
</div>
<!-- Progress scroll totop -->
<div class="progress-wrap cursor-pointer">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <div class="logo-wrapper">
            <a href="/">
                <img class="logo-img" src="{{ $setting_data->logo ?  asset(imagePath($setting_data->logo)) : asset(imagePath($setting_data->logo_white))}}" style="max-width: 355px;" alt="">
            </a>
            <!-- <a class="logo" href="index.html"> <h2>THE CAPPA <span>Luxury Hotel</span></h2> </a> -->
        </div>
        <!-- Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="ti-menu"></i></span>
        </button>
        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                @if(!empty($top_nav_data))
                    @foreach($top_nav_data as $nav)
                        @if(!empty($nav->children[0]))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   data-bs-auto-close="outside" aria-expanded="false">{{ @$nav->name ?? @$nav->title }} <i class="ti-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    @foreach($nav->children[0] as $childNav)
                                        <li class="{{ !empty($childNav->children[0]) ? 'dropdown-submenu dropdown':'' }}">
                                            <a href="{{get_menu_url($childNav->type, $childNav)}}"
                                               class="dropdown-item {{ !empty($childNav->children[0]) ? 'dropdown-toggle':'' }}" {{ !empty($childNav->children[0]) ? 'data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"':'' }}>
                                                <span> {{ @$childNav->name ?? @$childNav->title ??''}} {{ !empty($childNav->children[0]) ? '<i class="ti-angle-right"></i>':'' }}</span></a>
                                                @if(!empty($childNav->children[0]))
                                                    <ul class="dropdown-menu">
                                                        @foreach($childNav->children[0] as $key => $lastchild)
                                                            <li><a href="{{get_menu_url($lastchild->type, $lastchild)}}" target="{{@$lastchild->target ? '_blank':''}}"
                                                                   class="dropdown-item"><span> {{ @$lastchild->name ?? @$lastchild->title ?? ''}}</span></a></li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">
                                    {{ @$nav->name ?? @$nav->title ?? ''}}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
                <li class="nav-item"><a class="nav-link" href="{{route('frontend.contact-us')}}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
