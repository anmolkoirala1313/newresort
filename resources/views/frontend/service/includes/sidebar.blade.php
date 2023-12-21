<div class="news2-sidebar row">
    <div class="col-md-12">
        <div class="widget search">
            {!! Form::open(['route' => $base_route.'search', 'method'=>'GET']) !!}
                <input type="text" placeholder="Search service..." name="for" />
                <button type="submit"><i class="ti-search" aria-hidden="true"></i></button>
            {!! Form::close() !!}
        </div>
    </div>
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
                            <a href="{{ route($module.'service.show',$latest->key) }}">
                                {{ $latest->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
