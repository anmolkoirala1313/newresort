@extends('frontend.layouts.master')
@section('title') {{ $data['row']->title ?? $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> '3.jpg'])


    <section class="news2 section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post-img mb-3">
                        <img class="lazy" data-src="{{ asset(imagePath($data['row']->image)) }}" alt="">
                        <div class="date">
                            <a> <span>{{date('M Y', strtotime($data['row']->created_at))}}</span> <i>{{date('d', strtotime($data['row']->created_at))}}</i> </a>
                        </div>
                    </div>
                    <a href="{{ route('frontend.blog.category', $data['row']->blogCategory->slug)}}">
                        <span class="tag">{{ $data['row']->blogCategory->title ?? ''}}</span></a>
                    <h2>{{ $data['row']->title ?? '' }}</h2>
                    <div class="text-align-justify custom-description">
                        {!!  $data['row']->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

{{--    <ul class="list-wrap">--}}
{{--        <li>--}}
{{--            <a href="#"><i class="fab fa-facebook" onclick='fbShare("{{route('frontend.blog.show',$data['row']->slug)}}")'></i></a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="#"><i class="fab fa-twitter" onclick='twitShare("{{route('frontend.blog.show',$data['row']->slug)}}","{{ $data['row']->title }}")'></i></a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="#"><i class="fab fa-whatsapp" onclick='whatsappShare("{{route('frontend.blog.show',$data['row']->slug)}}","{{ $data['row']->title }}")'></i></a>--}}
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
