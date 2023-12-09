@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'breadcrumb_bg.jpg'])

    <section class="blog-area pt-120 pb-120">
        <div class="container">
            <div class="inner-blog-wrap">
                <div class="row justify-content-center">
                    <div class="col-71">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="section-title-two mb-10">
                                    <span class="sub-title">We found: {{ count($data['rows']) }} Blog{{ count($data['rows']) > 1 ?'s':'' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="blog-post-wrap">
                            <div class="row">
                                @foreach( $data['rows']  as $index=>$row)
                                    <div class="col-md-6 d-flex align-items-stretch">
                                        <div class="blog-post-item-two">
                                            <div class="blog-post-thumb-two">
                                                <img class="lazy" data-src="{{ asset(imagePath($row->image))}}" alt="">
                                                <a href="{{ route('frontend.blog.category', $row->blogCategory->slug)}}" class="tag tag-two">{{ $row->blogCategory->title ?? '' }}</a>
                                            </div>
                                            <div class="blog-post-content-two">
                                                <h2 class="title"><a href="{{ route('frontend.blog.show', $row->slug) }}">{{ $row->title ?? '' }}</a></h2>
                                                <p>{{ elipsis($row->description, 10) }}</p>
                                                <div class="blog-meta">
                                                    <ul class="list-wrap">
                                                        <li><i class="far fa-calendar"></i>{{date('d M Y', strtotime($row->created_at))}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pagination-wrap mt-30">
                                <nav aria-label="Page navigation example">
                                    {{ $data['rows']->links('vendor.pagination.default') }}
                                </nav>
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
@endsection
