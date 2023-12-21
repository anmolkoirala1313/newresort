@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=>'2.jpg'])

    <section class="services section-padding">
        <div class="container">
            <div class="row">
                {{--                <div class="col-md-4 sticky-sidebar">--}}
                {{--                    @include($view_path.'includes.sidebar')--}}
                {{--                </div>--}}
                <div class="col-md-12">
                    <div class="row">
                        @foreach( $data['rows']  as $index=>$row)
                            @if($loop->odd)
                                <div class="row">
                                    <div class="col-md-6 p-0 animate-box" data-animate-effect="fadeInLeft">
                                        <div class="img left">
                                            <a href="{{ route('frontend.service.show', $row->key) }}">
                                                <img class="lazy" data-src="{{ asset(thumbnailImagePath($row->image)) }}" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-0 bg-cream valign animate-box" data-animate-effect="fadeInRight">
                                        <div class="content">
                                            <div class="cont text-left">
                                                <div class="info">
                                                    <h6>{{ $row->subtitle ?? '' }}</h6>
                                                </div>
                                                <h4>{{ $row->title ?? '' }}</h4>
                                                <p>{{ elipsis($row->description ?? '') }}</p>
                                                <div class="butn-dark"> <a href="{{ route('frontend.service.show', $row->key) }}"><span>Learn More</span></a> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-6 p-0 animate-box bg-cream order2 valign " data-animate-effect="fadeInLeft">
                                        <div class="content">
                                            <div class="cont text-left">
                                                <div class="info">
                                                    <h6>{{ $row->subtitle ?? '' }}</h6>
                                                </div>
                                                <h4>{{ $row->title ?? '' }}</h4>
                                                <p>{{ elipsis($row->description ?? '') }}</p>
                                                <div class="butn-dark"> <a href="{{ route('frontend.service.show', $row->key) }}"><span>Learn More</span></a> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-0 order1 animate-box" data-animate-effect="fadeInRight">
                                        <div class="img">
                                            <a href="{{ route('frontend.service.show', $row->key) }}"><img class="lazy" data-src="{{ asset(thumbnailImagePath($row->image)) }}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="row">
                        {{ $data['rows']->links('vendor.pagination.default') }}
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
@endsection
