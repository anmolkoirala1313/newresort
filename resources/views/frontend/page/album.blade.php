@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
@endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])

    <section class="project-area-two project-bg-two" data-background="{{ asset('assets/frontend/img/bg/project_bg02.jpg') }}">
        <div class="container custom-container">
            <div class="row">
                @foreach($data['rows'] as $row)
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="project-item-two">
                            <div class="project-thumb-two">
                                <img class="lazy" data-src="{{ asset(imagePath($row->image)) }}" alt="">
                            </div>
                            <div class="project-content-two">
                                <h2 class="title"><a href="{{ route('frontend.page.album_gallery',$row->slug) }}">{{ $row->title ?? '' }}</a></h2>
                                <span>Images: ({{ $row->album_gallery_count }})</span>
                                <a href="{{ route('frontend.page.album_gallery',$row->slug) }}" class="link-btn"><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
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
@endsection
