@extends('frontend.layouts.master')
@section('title') {{ $data['row']->title ?? $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=>'image-3.jpeg'])

    <section class="services-details-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-71 order-0 order-lg-2">
                    <div class="services-details-wrap">
                        <div class="services-details-content">
                            <h2 class="title">
                                {{ $data['row']->title ?? '' }}
                            </h2>
                            <div class="services-details-thumb-two">
                                <img class="lazy" data-src="{{ asset(imagePath($data['row']->image)) }}" alt="">
                            </div>
                            <div class="text-align-justify custom-description">
                                {!!  $data['row']->description !!}
                            </div>
                            <div class="bd-content-bottom">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="blog-post-share">
                                            <h5 class="title">Share:</h5>
                                            <ul class="list-wrap">
                                                <li>
                                                    <a href="#"><i class="fab fa-facebook" onclick='fbShare("{{route('frontend.service.show',$data['row']->key)}}")'></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fab fa-twitter" onclick='twitShare("{{route('frontend.service.show',$data['row']->key)}}","{{ $data['row']->title }}")'></i></a>
                                                </li>

                                                <li>
                                                    <a href="#"><i class="fab fa-whatsapp" onclick='whatsappShare("{{route('frontend.service.show',$data['row']->key)}}","{{ $data['row']->title }}")'></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-29">
                    @include($view_path.'includes.sidebar')
                </div>
            </div>
        </div>
    </section>


@endsection

@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script>
        function fbShare(url) {
            window.open("https://www.facebook.com/sharer/sharer.php?u=" + url, "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
        }
        function twitShare(url, title) {
            window.open("https://twitter.com/intent/tweet?text=" + encodeURIComponent(title) + "+" + url + "", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
        }
        function whatsappShare(url, title) {
            message = title + " " + url;
            window.open("https://api.whatsapp.com/send?text=" + message);
        }
        $( document ).ready(function() {
            let selector = $('.custom-description').find('table').length;
            if(selector>0){
                $('.custom-description').find('table').addClass('table table-bordered table-responsive');
            }
        });
    </script>
@endsection
