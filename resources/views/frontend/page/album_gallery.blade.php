@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}" />
    <style>
        .image-dimension{
            height: 400px;
            object-fit: cover;
            transform: scale(1);
            transition: .3s linear;
        }
    </style>
@endsection


@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'breadcrumb_bg.jpg'])

    <section class="project-area-two project-bg-two" data-background="{{ asset('assets/frontend/img/bg/project_bg02.jpg') }}">
        <div class="container custom-container">
            <div class="row">
                @foreach($data['rows']->albumGallery as $index=>$gallery)
                    <div class="col-lg-4 col-md-6 col-sm-10 mt-2">
                        <div class="project-thumb-two">
                            <div class="magnific-img">
                                <a class="image-popup-vertical-fit"
                                   href="{{ asset(galleryImagePath('album').$gallery->resized_name) }}" title="">
                                    <img src="{{ asset(galleryImagePath('album').$gallery->resized_name) }}" class="image-dimension" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="project-link">
                        <a href="/">
                            <img src="{{ asset('assets/frontend/img/icons/plus_icon.svg') }}" alt=""></a>
                    </div>

            </div>
        </div>
    </section>


{{--    <section class="portfolio-one">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                @foreach($data['rows']->albumGallery as $index=>$gallery)--}}

{{--                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInDown" data-wow-delay="{{$index+1}}00ms">--}}
{{--                        <div class="portfolio-one__single">--}}
{{--                            <div class="portfolio-one__img-box">--}}
{{--                                <div class="portfolio-one__img">--}}
{{--                                    <img class="image-dimension" src="{{ asset(galleryImagePath('album').$gallery->resized_name) }}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="portfolio-one__arrow">--}}
{{--                                    <a href="{{ asset(galleryImagePath('album').$gallery->resized_name) }}" class="img-popup"><span--}}
{{--                                            class="icon-top-right-1"></span></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}

{{--        </div>--}}
{{--    </section>--}}
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
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
