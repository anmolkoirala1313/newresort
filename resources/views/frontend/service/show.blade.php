@extends('frontend.layouts.master')
@section('title') {{ $data['row']->title ?? $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> '3.jpg'])


    <section class="services section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4 sticky-sidebar">
                    @include($view_path.'includes.sidebar')
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="post-img mb-3">
                            <img class="lazy" data-src="{{ asset(imagePath($data['row']->image)) }}" alt="">
                        </div>
                        <h2>{{ $data['row']->title ?? '' }}</h2>
                        <div class="text-align-justify custom-description">
                            {!!  $data['row']->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


{{--    <ul class="list-wrap">--}}
{{--        <li>--}}
{{--            <a href="#"><i class="fab fa-facebook" onclick='fbShare("{{route('frontend.service.show',$data['row']->key)}}")'></i></a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="#"><i class="fab fa-twitter" onclick='twitShare("{{route('frontend.service.show',$data['row']->key)}}","{{ $data['row']->title }}")'></i></a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="#"><i class="fab fa-whatsapp" onclick='whatsappShare("{{route('frontend.service.show',$data['row']->key)}}","{{ $data['row']->title }}")'></i></a>--}}
{{--        </li>--}}
{{--    </ul>--}}
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
