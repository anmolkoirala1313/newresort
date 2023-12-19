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

    @include($module.'includes.breadcrumb', ['breadcrumb_image'=>'7.jpg'])

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <!-- 3 columns -->
                @foreach($data['rows']->albumGallery as $index=>$gallery)
                    <div class="col-md-4 gallery-item">
                        <a href="{{ asset(galleryImagePath('album').$gallery->resized_name) }}" title="" class="img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img">
                                    <img src="{{ asset(galleryImagePath('album').$gallery->resized_name) }}"
                                         class="mx-auto d-block image-dimension" alt="work-img">
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

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
