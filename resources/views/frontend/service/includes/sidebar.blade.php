<aside class="services-sidebar">
    <div class="sidebar-search">
        {!! Form::open(['route' => $base_route.'search', 'method'=>'GET', 'class'=>'sidebar__search-form']) !!}
        <input type="text" placeholder="Search Service . . ." name="for">
        <button type="submit"><i class="flaticon-search"></i></button>
        {!! Form::close() !!}
    </div>
    @if(count( $data['latest']) > 0)

        <div class="services-cat-list services-cat-list-two mb-30">
            <ul class="list-wrap">
                @foreach($data['latest'] as $latest)
                    <li class="{{ $loop->first ? 'active':'' }}">
                        <a href="{{ route('frontend.service.show',$latest->key) }}">
                            {{$latest->title ?? ''}} <i class="flaticon-right-arrow"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="services-widget services-sidebar-contact">
        <h4 class="title">If You Need Any Help Contact With Us</h4>
        <a href="tel:{{ $data['setting']->phone ?? $data['setting']->mobile }}"><i class="flaticon-phone-call"></i>{{ $data['setting']->phone ?? $data['setting']->mobile }}</a>
    </div>
</aside>
