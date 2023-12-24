@extends('frontend.layouts.master')
@section('title') {{ $data['row']->list_title ?? $page_title }} @endsection

@section('content')

    @include($view_path.'slider_list.includes.breadcrumb',['breadcrumb_image'=>'3.jpg'])

    <section class="services section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4 sticky-sidebar">
                    @include($view_path.'slider_list.includes.sidebar')
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="post-img mb-3">
                            <img class="lazy" data-src="{{ asset(imagePath($data['row']->image)) }}" alt="">
                        </div>
                        <h2> {{ $data['row']->list_title ?? '' }}</h2>
                        <div class="text-align-justify custom-description">
                            {!!  $data['row']->list_description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
@endsection
