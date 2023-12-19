@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
@endsection

@section('content')

    @include($module.'includes.breadcrumb', ['breadcrumb_image'=>'4.jpg'])

    <section class="rooms1 section-padding bg-cream" data-scroll-index="1">
        <div class="container">
            <div class="row">
                @foreach($data['rows'] as $row)
                    <div class="col-md-4">
                    <div class="item">
                        <div class="position-re o-hidden">
                            <img class="lazy" data-src="{{ asset(imagePath($row->image)) }}" alt="">
                        </div>
                        <span class="category"><a href="{{ route('frontend.page.album_gallery',$row->slug) }}">View</a></span>
                        <div class="con">
                            <h6><a href="{{ route('frontend.page.album_gallery',$row->slug) }}">Images : ({{ $row->album_gallery_count }})</a></h6>
                            <h5><a href="{{ route('frontend.page.album_gallery',$row->slug) }}">{{ $row->title ?? '' }}</a> </h5>
                            <div class="line"></div>
                            <div class="row facilities">
                                <div class="col col-md-12 text-end">
                                    <div class="permalink">
                                        <a href="{{ route('frontend.page.album_gallery',$row->slug) }}">
                                            Gallery <i class="ti-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    {{ $data['rows']->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
@endsection
