@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb', ['breadcrumb_image'=>'5.jpg'])

    <section class="news section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="section-subtitle" style="font-weight: 600;font-size: 16px;letter-spacing: 4px;">
                        @if(count($data['rows']))
                            We Found <span>{{ count($data['rows']) }} {{ count($data['rows']) > 1 ? "Blog's":"Blog" }} </span> For You
                        @else
                            Sorry. We cannot find the Blogs you are looking for.
                        @endif
                    </div>
                    <div class="row">
                        @foreach( $data['rows']  as $index=>$row)
                            <div class="col-md-6 mb-30">
                                <div class="item">
                                    <div class="position-re o-hidden">
                                        <img class="lazy" data-src="{{ asset(thumbnailImagePath($row->image))}}" alt="">
                                        <div class="date">
                                            <a href="{{ route('frontend.blog.show', $row->slug) }}"> <span>{{date('M Y', strtotime($row->created_at))}}</span> <i>{{date('d', strtotime($row->created_at))}}</i> </a>
                                        </div>
                                    </div>
                                    <div class="con"> <span class="category">
                                                <a href="{{ route('frontend.blog.show', $row->slug) }}">{{ $row->blogCategory->title ?? '' }}</a>
                                            </span>
                                        <h5><a href="{{ route('frontend.blog.show', $row->slug) }}">{{ $row->title ?? '' }}</a></h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4 sticky-sidebar">
                    @include($view_path.'includes.sidebar')
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
@endsection
