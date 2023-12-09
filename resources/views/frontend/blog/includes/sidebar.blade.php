<aside class="blog-sidebar">
    <div class="sidebar-search">
        {!! Form::open(['route' => $base_route.'search', 'method'=>'GET']) !!}
            <input type="text" placeholder="Search Blogs . . ." name="for">
            <button type="submit"><i class="flaticon-search"></i></button>
        {!! Form::close() !!}
    </div>
    @if(count( $data['categories']) > 0)
        <div class="blog-widget">
            <h4 class="bw-title">Categories</h4>
            <div class="bs-cat-list">
                <ul class="list-wrap">
                    @foreach($data['categories'] as $category)
                        <li><a href="{{ route($base_route.'category',$category->slug) }}">  {{$category->title}} <span>({{$category->blogs_count}})</span></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if(count( $data['latest']) > 0)
        <div class="blog-widget">
            <h4 class="bw-title">Recent Posts</h4>
            <div class="rc-post-wrap">
                @foreach($data['latest'] as $latest)
                    <div class="rc-post-item">
                        <div class="thumb">
                            <a href="{{ route($module.'blog.show',$latest->slug) }}">
                                <img class="lazy" data-src="{{ asset(imagePath($latest->image)) }}" alt="">
                            </a>
                        </div>
                        <div class="content">
                            <span class="date"><i class="far fa-calendar"></i> {{date('d M Y', strtotime($latest->created_at))}}</span>
                            <h2 class="title"><a href="{{ route($module.'blog.show',$latest->slug) }}">   {{ $latest->title }}</a></h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</aside>

