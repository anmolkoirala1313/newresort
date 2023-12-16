@extends('frontend.layouts.master')
@section('title') {{ $data['row']->title ?? $page_title }} @endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}" />
    <style>
        .image-dimension{
            height: 300px;
            object-fit: cover;
            transform: scale(1);
            transition: .3s linear;
        }
        .mfp-container {
            max-width: 1000px;
            max-height: 1000px;
            margin: 0 auto;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%);
        }
        .mfp-figure img {
            max-width: 100%;
            height: auto;
        }
        .slick-slide {
            height: auto!important;
        }
    </style>

@endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> '4.jpg', 'page_image'=> $data['row']->cover_image])

    <section id="menu" class="restaurant-menu menu section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4 sticky-sidebar">
                    @include($view_path.'includes.sidebar')
                </div>
                <div class="col-md-8">
                    <div class="section-subtitle">{{ $data['row']->subtitle }}</div>
                    <div class="section-title">{{ $data['row']->title }}</div>
                    <img class="room-img lazy" data-src="{{ asset(imagePath($data['row']->image)) }}" alt="">
                    <div class="row">
                        <div class="tabs-icon col-md-10 text-center">
                            <div class="owl-carousel owl-theme">
                                <div id="tab-1" class="active item">
                                    <h6>Description</h6>
                                </div>
                                @if(count($data['row']->roomGalleries))
                                    <div id="tab-2" class="item">
                                        <h6>Gallery</h6>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="restaurant-menu-content col-md-12">
                            <!-- Starters -->
                            <div id="tab-1-content" class="cont active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-align-justify custom-description">{!!  $data['row']->description !!}</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Mains -->
                            <div id="tab-2-content" class="cont">
                                <div class="row">
                                    @foreach($data['row']->roomGalleries as $index=>$gallery)
                                        <div class="col-md-4 gallery-item">
                                            <a href="{{ asset(galleryImagePath('room').$gallery->resized_name) }}" title="" class="img-zoom">
                                                <div class="gallery-box">
                                                    <div class="gallery-img">
                                                        <img src="{{ asset(galleryImagePath('room').$gallery->resized_name) }}"
                                                             class="mx-auto d-block image-dimension" alt="">
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.image-popup-vertical-fit').magnificPopup({
                type: 'image',
                mainClass: 'mfp-with-zoom',
                gallery:{
                    enabled:true
                },
                zoom: {
                    enabled: true,
                    duration: 300, // duration of the effect, in milliseconds
                    easing: 'ease-in-out', // CSS transition easing function
                    opener: function(openerElement) {
                        return openerElement.is('img') ? openerElement : openerElement.find('img');
                    }
                }
            });

        });

    </script>
@endsection
