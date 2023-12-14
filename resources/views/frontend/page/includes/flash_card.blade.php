<section class="services section-padding3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle">{{ $element->first()->subtitle ?? '' }}</div>
                <div class="section-title">{{ $element->first()->title ?? '' }}</div>
            </div>
        </div>
        @foreach($element as $index=>$row)
            @if($loop->odd)
                <div class="row">
                    <div class="col-md-6 p-0 animate-box" data-animate-effect="fadeInLeft">
                        <div class="img left">
                                <img src="{{ asset(imagePath($row->image)) }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 p-0 bg-cream valign animate-box" data-animate-effect="fadeInRight">
                        <div class="content">
                            <div class="cont text-left">
                                <div class="info">
                                    <h6>{{$row->list_subtitle ?? ''}}</h6>
                                </div>
                                <h4>{{$row->list_title ?? ''}}</h4>
                                <p class="text-align-justify">{{$row->list_description ?? ''}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-6 p-0 animate-box bg-cream order2 valign " data-animate-effect="fadeInLeft">
                        <div class="content">
                            <div class="cont text-left">
                                <div class="info">
                                    <h6>{{$row->list_subtitle ?? ''}}</h6>
                                </div>
                                <h4>{{$row->list_title ?? ''}}</h4>
                                <p class="text-align-justify">{{$row->list_description ?? ''}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-0 order1 animate-box" data-animate-effect="fadeInRight">
                        <div class="img">
                            <img src="{{ asset(imagePath($row->image)) }}" alt="">
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>


