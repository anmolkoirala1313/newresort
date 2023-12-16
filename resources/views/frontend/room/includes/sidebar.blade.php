<div class="news2-sidebar row">
    <div class="col-md-12">
        <div class="widget search">
            {!! Form::open(['route' => $base_route.'search', 'method'=>'GET']) !!}
                <input type="text" name="search" placeholder="Search rooms . . .">
                <button type="submit"><i class="ti-search" aria-hidden="true"></i></button>
            {!! Form::close() !!}
        </div>
    </div>
    @if(count( $data['latest']) > 0)
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-title">
                    <h6>Latest Rooms</h6>
                </div>
                <ul class="recent">
                    @foreach($data['latest'] as $latest)
                        <li>
                            <div class="thum">
                                <img class="lazy" data-src="{{ asset(imagePath($latest->image)) }}" alt="">
                            </div>
                            <a href="{{ route($module.'room.show',$latest->slug) }}">
                                {{ $latest->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if(count( $data['amenities']) > 0)
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-title">
                    <h6>Amenities</h6>
                </div>
                <ul class="tags">
                    @foreach($data['amenities'] as $amenity)
                        <li><a href="{{ route($base_route.'amenities',$amenity->slug) }}">{{ $amenity->title }} ({{$amenity->rooms_count}})</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
