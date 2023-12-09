@extends('frontend.layouts.master')
@section('title') {{ $data['row']->title ?? $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'breadcrumb_bg.jpg'])

    <section class="blog-details-area pt-120 pb-60">
        <div class="container">
            <div class="blog-details-wrap">
                <div class="row justify-content-center">
                    <div class="col-71">
                        <div class="blog-details-thumb">
                            <img class="lazy" data-src="{{ asset(imagePath($data['row']->image)) }}" alt="">
                        </div>
                        <div class="blog-details-content">
                            <h2 class="title">   {{ $data['row']->title ?? '' }}</h2>
                            <div class="blog-meta-three">
                                <ul class="list-wrap">
                                    <li><i class="far fa-calendar"></i>22 Jan, 2023</li>
                                    <li><i class="fas fa-tags"></i>
                                        <a href="{{ route('frontend.blog.category', $data['row']->blogCategory->slug)}}">  {{ $data['row']->blogCategory->title ?? ''}}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-align-justify custom-description">{!!  $data['row']->description !!}</div>
                            <div class="bd-content-bottom">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="post-tags">
                                            <h5 class="title">Category:</h5>
                                            <ul class="list-wrap">
                                                <li><a href="{{ route('frontend.blog.category', $data['row']->blogCategory->slug)}}">
                                                        {{ $data['row']->blogCategory->title ?? ''}}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="blog-post-share">
                                            <h5 class="title">Share:</h5>
                                            <ul class="list-wrap">
                                                <li>
                                                    <a href="#"><i class="fab fa-facebook" onclick='fbShare("{{route('frontend.blog.show',$data['row']->slug)}}")'></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fab fa-twitter" onclick='twitShare("{{route('frontend.blog.show',$data['row']->slug)}}","{{ $data['row']->title }}")'></i></a>
                                                </li>

                                                <li>
                                                    <a href="#"><i class="fab fa-whatsapp" onclick='whatsappShare("{{route('frontend.blog.show',$data['row']->slug)}}","{{ $data['row']->title }}")'></i></a>
                                                </li>
                                            </ul>
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
