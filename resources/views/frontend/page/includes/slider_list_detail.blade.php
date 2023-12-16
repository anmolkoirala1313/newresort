@foreach($element as $index=>$row)
    @if( $data['slider_list_type'] == 'normal')
        <div class="col-lg-4 col-md-6 col-sm-10 d-flex align-items-stretch">
            <div class="pricing-card">
    @else
        <div class="pricing-card align-items-stretch">
    @endif
            <img src="{{ asset(imagePath($row->image)) }}" style="background: #f8f5f0" alt="">
            <div class="desc">
                <div class="name">
                    <a href="{{ $data['slider_list_type'] !== 'normal' ? route($base_route.'slider_single',@$row->list_subtitle) : '#'}}">
                        {{ $row->list_title ?? '' }}
                    </a>
                </div>
                <div class="custom-description text-align-justify">
                    {!! $data['slider_list_type'] == 'normal' ? $row->list_description: elipsis($row->list_description) !!}
                </div>
            </div>

   @if( $data['slider_list_type'] == 'normal')
        </div>
   </div>
   @else
        <div class="info-wrapper" style=" border-top: 1px solid rgb(170 132 83 / 27%);padding: 15px 25px;">
            <div class="more"><a href="{{route($base_route.'slider_single',@$row->list_subtitle)}}" class="link-btn" tabindex="0">Details <i class="ti-arrow-right"></i></a></div>
        </div>
    </div>
   @endif

@endforeach



