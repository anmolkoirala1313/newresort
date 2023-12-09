<section class="services-area-four">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-6">
                <div class="section-title mb-40 tg-heading-subheading animation-style2">
                    <span class="sub-title tg-element-title">{{ $element->first()->subtitle ?? '' }}</span>
                    <h2 class="title tg-element-title">{{ $element->first()->title ?? '' }}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($element as $index=>$row)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="services-item-four">
                        <div class="services-icon-four">
                            <i class="{{ get_flash_card_icons($index) }}"></i>
                        </div>
                        <div class="services-content-four">
                            <h2 class="title"><a>{{$row->list_title ?? ''}}</a></h2>
                            <p>{{$row->list_description ?? ''}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

