@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb', ['breadcrumb_image'=>'4.jpg'])

    <section class="rooms3 section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4 sticky-sidebar">
                    @include($view_path.'includes.sidebar')
                </div>
                <div class="col-md-8">
                    <div class="section-subtitle" style="font-weight: 600;font-size: 16px;letter-spacing: 4px;">
                        @if(count($data['rows']))
                            We Found <span>{{ count($data['rows']) }} {{ count($data['rows']) > 1 ? "Room's":"Room" }} </span> For You
                        @else
                            Sorry. We cannot find the room you are looking for.
                        @endif

                    </div>
                    <div class="row">
                        @foreach($data['rows'] as $room)
                            <div class="col-md-6">
                                <div class="square-flip">
                                    <div class="square bg-img" data-background="{{ asset(imagePath($room->image)) }}">
                                        <span class="category">
                                            <a href="#">Book</a>
                                        </span>
                                        <div class="square-container d-flex align-items-end justify-content-end">
                                            <div class="box-title">
                                                @if($room->price)
                                                    <h6>{{ $room->price }} / Night</h6>
                                                @endif
                                                <h4>{{ $room->title ?? '' }}</h4>
                                            </div>
                                        </div>
                                        <div class="flip-overlay"></div>
                                    </div>
                                    <div class="square2">
                                        <div class="square-container2">
                                            @if($room->price)
                                                <h6>{{ $room->price }} / Night</h6>
                                            @endif
                                            <h4>{{ $room->title ?? '' }}</h4>
                                            <p>{{ elipsis(strip_tags($room->description ?? '')) }}</p>
                                            @if(count($room->amenities))
                                                <div class="row room-facilities mb-30">
                                                    @foreach($room->amenities->take(4)->chunk(2) as $chunked_amenity)
                                                        <div class="col-md-6">
                                                            <ul>
                                                                @foreach($chunked_amenity as $amenity)
                                                                    <li><img data-src="{{ asset(imagePath($amenity->image)) }}" alt="" class="lazy amenity-image">
                                                                        {{$amenity->title ?? ''}}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <div class="btn-line"><a href="{{ route($base_route.'show', $room->slug) }}">Details</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
@endsection
