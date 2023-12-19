@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
@endsection

@section('content')

    @include($module.'includes.breadcrumb', ['breadcrumb_image'=>'2.jpg'])

    <section class="team section-padding bg-cream">
        <div class="container">
            <div class="row">
                @foreach($data['rows'] as $team)
                    <div class="col-md-4">
                        <div class="item">
                            <div class="img">
                                <img class="lazy" data-src="{{ asset(imagePath($team->image)) }}" alt="">
                            </div>
                            <div class="info">
                                <h6>{{$team->title ?? ''}}</h6>
                                <p>{{$team->designation ?? ''}}</p>
                                @if(@$team->fb_link || @$team->twitter_link || @$team->instagram_link || @$team->linkedin_link)
                                    <div class="social valign">
                                        <div class="full-width">
                                            @if($team->fb_link)
                                                <a href="{{ $team->fb_link ?? "#" }}"><i class="ti-facebook"></i></a>
                                            @endif
                                            @if($team->instagram_link)
                                                <a href="{{ $team->instagram_link ?? "#" }}"><i class="ti-instagram"></i></a>
                                            @endif
                                            @if($team->twitter_link)
                                               <a href="{{ $team->twitter_link ?? "#" }}">
                                                   <svg class="my-svg-class" xmlns="http://www.w3.org/2000/svg" height="15" width="15" viewBox="0 0 512 512">
                                                       <path fill="#aa8453" d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
                                                   </svg>
                                               </a>
                                            @endif
                                            @if($team->linkedin_link)
                                                <a href="{{ $team->linkedin_link ?? "#" }}"><i class="ti-linkedin"></i></a>
                                            @endif
                                            <p>{{$team->title ?? ''}}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_alert')
@endsection
