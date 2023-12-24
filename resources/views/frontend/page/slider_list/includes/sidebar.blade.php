<div class="news2-sidebar row">
    @if(count( $data['latest']) > 0)
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-title">
                    <h6>Latest Posts</h6>
                </div>
                <ul class="recent">
                    @foreach($data['latest'] as $latest)
                        <li>
                            <div class="thum">
                                <img class="lazy" data-src="{{ asset(imagePath($latest->image)) }}" alt="">
                            </div>
                            <a href="{{route($base_route.'slider_single',@$latest->list_subtitle)}}">
                                {{$latest->list_title ?? ''}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
