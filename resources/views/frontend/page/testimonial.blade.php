@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
@endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'breadcrumb_bg.jpg'])


    <section class="team-area team-bg" data-background="{{ asset('assets/frontend/img/bg/team_bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                @if(count($data['rows'] ))
                    @foreach($data['rows'] as $testimonial)
                        <div class="col-lg-6">
                            <div class="testimonial-item-two">
                                <div class="testimonial-content-two">
                                    <p>
                                        {{ $testimonial->description }}
                                    </p>
                                    <div class="testimonial-avatar">
                                        <div class="avatar-thumb">
                                            <img src="{{ asset(imagePath($testimonial->image))}}" alt="">
                                        </div>
                                        <div class="avatar-info">
                                            <h2 class="title">{{ $testimonial->title ?? '' }}</h2>
                                            <span>{{ $testimonial->position ?? '' }}</span>
                                        </div>
                                    </div>
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
{{--    --}}
{{--    <section class="testimonials-page">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                @if(count($data['rows'] ))--}}
{{--                    @foreach($data['rows'] as $testimonial)--}}
{{--                        <div class="col-xl-4 col-lg-6 col-md-6 d-flex align-items-stretch">--}}
{{--                            <div class="testimonial-two__single">--}}
{{--                                <div class="testimonial-two__client-img">--}}
{{--                                    <img class="lazy" data-src="{{ asset(imagePath($testimonial->image)) }}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="testimonial-two__client-info">--}}
{{--                                    <h3>{{ $testimonial->title ?? '' }}</h3>--}}
{{--                                    <p>{{ $testimonial->position ?? '' }}</p>--}}
{{--                                </div>--}}
{{--                                <p class="testimonial-two__text">--}}
{{--                                   "{{ $testimonial->description }}"--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                        <div class="portfolio-page__pagination">--}}
{{--                            {{ $data['rows']->links('vendor.pagination.default') }}--}}
{{--                        </div>--}}
{{--                @endif--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_alert')
@endsection
