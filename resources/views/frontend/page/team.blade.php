@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
@endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])

    <section class="team-area team-bg" data-background="{{ asset('assets/frontend/img/bg/team_bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mb-50 tg-heading-subheading animation-style2">
                        <span class="sub-title tg-element-title">Expert People</span>
                        <h2 class="title tg-element-title">Dedicated Team Members</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @if(count($data['rows']))
                    @foreach($data['rows'] as $team)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-9">
                            <div class="team-item">
                                <div class="team-thumb">
                                    <img class="lazy" data-src="{{ asset(imagePath($team->image)) }}" alt="">
                                    @if(@$team->fb_link || @$team->twitter_link || @$team->instagram_link || @$team->linkedin_link)
                                        <div class="team-social">
                                            <ul class="list-wrap">
                                                @if($team->fb_link)
                                                    <li> <a href="{{ $team->fb_link  ?? "#" }}"><span class="fab fa-facebook"></span></a></li>
                                                @endif
                                                @if($team->instagram_link)
                                                    <li><a href="{{ $team->instagram_link  ?? "#" }}"><span class="fab fa-instagram"></span></a></li>
                                                @endif
                                                @if($team->twitter_link)
                                                    <li> <a href="{{ $team->twitter_link  ?? "#" }}"><span class="fab fa-twitter"></span></a></li>
                                                @endif
                                                @if($team->linkedin_link)
                                                    <li><a href="{{ $team->linkedin_link  ?? "#" }}"><span class="fab fa-linkedin"></span></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="team-content">
                                    <h2 class="title"><a>{{$team->title ?? ''}}</a></h2>
                                    <span>{{$team->designation ?? ''}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="pagination-wrap mt-30">
                    <nav aria-label="Page navigation example">
                        {{ $data['rows']->links('vendor.pagination.default') }}
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_alert')
@endsection
