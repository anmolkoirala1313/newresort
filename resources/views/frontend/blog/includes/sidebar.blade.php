<div class="news2-sidebar row">
    <div class="col-md-12">
        <div class="widget search">
            {!! Form::open(['route' => $base_route.'search', 'method'=>'GET']) !!}
                <input type="text" placeholder="Search blogs..." name="for" />
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
                            <a href="{{ route($module.'blog.show',$latest->slug) }}">
                                {{ $latest->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if(count( $data['categories']) > 0)
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-title">
                    <h6>Categories</h6>
                </div>
                <ul>
                    @foreach($data['categories'] as $category)
                        <li><a href="{{ route($base_route.'category',$category->slug) }}">
                                <i class="ti-angle-right"></i>
                                {{$category->title}} ({{$category->blogs_count}})</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

</div>
