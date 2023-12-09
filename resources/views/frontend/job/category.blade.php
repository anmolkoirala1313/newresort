@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=>'image-2.png'])

    <section class="services-details-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-71 order-0 order-lg-2">
                    <div class="row">
                        @foreach( $data['rows']  as $index=>$row)
                            <div class="col-lg-6 col-md-6">
                                <div class="project-item">
                                    <div class="project-thumb">
                                        <a href="{{ route('frontend.job.show', $row->slug) }}">
                                            <img class="lazy" data-src="{{ asset(imagePath($row->image)) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="project-content">
                                        <a href="{{ route('frontend.job.show', $row->slug) }}" class="tag">
                                            @if(@$row->end_date >= date('Y-m-d'))
                                                {{date('M j, Y',strtotime(@$row->start_date))}} - {{date('M j, Y',strtotime(@$row->end_date))}}
                                            @else
                                                Expired
                                            @endif
                                        </a>
                                        <h2 class="title"><a href="{{ route('frontend.job.show', $row->slug) }}">{{ $row->title ?? '' }}</a></h2>
                                        <a href="{{ route('frontend.job.show', $row->slug) }}" class="link-arrow"><i class="flaticon-right-arrow"></i></a>
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
                <div class="col-29">
                    @include($view_path.'includes.sidebar')
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
@endsection
