@extends('frontend.layouts.master')
@section('title') {{ $data['row']->title ?? $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=>'background_action.jpeg'])

    <section class="project-details-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="project-details-wrap">
                        <div class="row">
                            <div class="col-71">
                                <div class="project-details-thumb">
                                    <img class="lazy" data-src="{{ asset(imagePath($data['row']->image)) }}" alt="">
                                </div>
                            </div>
                            <div class="col-29">
                                <div class="project-details-info">
                                    <h4 class="title">Job Information</h4>
                                    <ul class="list-wrap">
                                        <li>
                                            <span>Published Date:</span> @if(@$data['row']->end_date >= date('Y-m-d'))
                                                {{date('M j, Y',strtotime(@$data['row']->start_date))}} - {{date('M j, Y',strtotime(@$data['row']->end_date))}}
                                            @else
                                                Expired
                                            @endif
                                        </li>
                                        @if($data['row']->company)
                                            <li>
                                                <span>Company:</span>
                                                {{ ucfirst($data['row']->company ?? '')}}
                                            </li>
                                        @endif
                                        @if($data['row']->required_number)
                                            <li>
                                                <span>Required Number:</span>
                                                {{ ucfirst($data['row']->required_number ?? '')}}
                                            </li>
                                        @endif
                                        @if($data['row']->salary)
                                            <li>
                                                <span>Salary:</span>
                                                {{ ucfirst($data['row']->salary ?? '')}}
                                            </li>
                                        @endif
                                        @if($data['row']->min_qualification)
                                            <li>
                                                <span>Min Qualification:</span>
                                                {{ ucfirst($data['row']->min_qualification ?? '')}}
                                            </li>
                                        @endif
                                        @if($data['row']->formlink && $data['row']->end_date >= date('Y-m-d'))
                                            <li>
                                                <span>Form Link:</span>
                                                <a href="{{$data['row']->formlink}}" target="_blank">Submit response</a>
                                            </li>
                                        @endif
                                        <li class="social">
                                            <span>Share:</span>
                                            <ul class="list-wrap">
                                                <li><a href="#"><i class="fab fa-facebook" onclick='fbShare("{{route('frontend.job.show',$data['row']->slug)}}")'></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter" onclick='twitShare("{{route('frontend.job.show',$data['row']->slug)}}","{{ $data['row']->title }}")'></i></a></li>
                                                <li><a href="#"><i class="fab fa-whatsapp" onclick='whatsappShare("{{route('frontend.job.show',$data['row']->slug)}}","{{ $data['row']->title }}")'></i></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="project-details-content">
                            <h2 class="title"> {{ $data['row']->name ?? $data['row']->title ?? '' }}</h2>
                            <div class="custom-description text-align-justify">
                                {!!  $data['row']->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script>
        function fbShare(url) {
            window.open("https://www.facebook.com/sharer/sharer.php?u=" + url, "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
        }
        function twitShare(url, title) {
            window.open("https://twitter.com/intent/tweet?text=" + encodeURIComponent(title) + "+" + url + "", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
        }
        function whatsappShare(url, title) {
            message = title + " " + url;
            window.open("https://api.whatsapp.com/send?text=" + message);
        }
        $( document ).ready(function() {
            let selector = $('.custom-description').find('table').length;
            if(selector>0){
                $('.custom-description').find('table').addClass('table table-bordered table-responsive');
            }
        });
    </script>
@endsection
