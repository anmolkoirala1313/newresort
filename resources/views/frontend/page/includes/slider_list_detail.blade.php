@foreach($element as $index=>$row)
    @if( $data['slider_list_type'] == 'normal')
        <div class="col-lg-4 col-md-6 col-sm-10 d-flex align-items-stretch">
    @else
        <div class="col-lg-4">
    @endif
        <div class="services-item">
            <div class="services-content">
                <div class="content-top">
                    <div class="icon">
                        <i class="flaticon-briefcase"></i>
                    </div>
                    <h2 class="title">{{ $row->list_title ?? '' }}</h2>
                </div>
                <div class="services-thumb">
                    <img src="{{ asset(imagePath($element->first()->image)) }}" alt="">
                    @if( $data['slider_list_type'] !== 'normal')
                        <a href="#" class="btn transparent-btn">Read More</a>
                    @endif
                </div>
                <p class="text-align-justify">{{ $data['slider_list_type'] == 'normal' ? strip_tags($row->list_description) : elipsis($row->list_description)}}</p>
            </div>
        </div>
    </div>



{{--    @if( $data['slider_list_type'] == 'normal')--}}
{{--        <div class="col-xl-4 col-lg-4 wow d-flex align-items-stretch fadeInLeft" data-wow-delay="{{ $index + 1 }}00ms">--}}
{{--    @else--}}
{{--        <div class="item">--}}
{{--    @endif--}}
{{--        <div class="news-one__single">--}}
{{--            <div class="news-one__img-box">--}}
{{--                <div class="news-one__img">--}}
{{--                    <img src="{{ asset(imagePath($element->first()->image)) }}" alt="">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="news-one__content">--}}
{{--                <div class="news-one__content-top">--}}
{{--                    <h3 class="news-one__title"><a href="#">{{ $row->list_title ?? '' }}</a></h3>--}}
{{--                        <p class="news-one__text text-align-justify">{{ $data['slider_list_type'] == 'normal' ? strip_tags($row->list_description) : elipsis($row->list_description)}}</p>--}}
{{--                </div>--}}
{{--                @if($data['slider_list_type'] !== 'normal')--}}
{{--                    <div class="news-one__person-and-date">--}}
{{--                        <div class="news-three__btn" style="margin-top: 0px;">--}}
{{--                            <a href="#">Learn More<span class="icon-right-arrow1"></span></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endforeach



