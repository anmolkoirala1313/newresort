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
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                                <div class="services-item-two">
                                    <div class="services-thumb-two">
                                        <img class="lazy" data-src="{{ asset(thumbnailImagePath($row->image)) }}" alt="">
                                        <div class="item-shape">
                                            <img class="lazy" data-src="{{ asset('assets/frontend/img/services/services_item_shape.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="services-content-two">
                                        <div class="icon">
                                            <i class="flaticon-layers"></i>
                                        </div>
                                        <h2 class="title"><a href="{{ route('frontend.service.show', $row->key) }}">{{ $row->title ?? '' }}</a></h2>
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
