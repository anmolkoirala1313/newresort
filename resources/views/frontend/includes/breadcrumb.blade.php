<section class="breadcrumb-area breadcrumb-bg" data-background="{{ isset($page_image) && $page_image  ? asset(imagePath($page_image)) :
 asset('assets/frontend/img/bg/'.$breadcrumb_image) }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <h2 class="title">{{ $page_title }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            @if($page_method !=='index')
                                <li class="breadcrumb-item">
                                    <a href="{{route($base_route.'index')}}">{{ $page }}</a></li>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> {{ $page_title }}</li>

                            @else
                                <li class="breadcrumb-item active" aria-current="page"> {{ $page_title }}</li>
                            @endif
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb-shape-wrap">
        <img src="{{ asset('assets/frontend/img/images/breadcrumb_shape01.png') }}" alt="">
        <img src="{{ asset('assets/frontend/img/images/breadcrumb_shape02.png') }}" alt="">
    </div>
</section>
