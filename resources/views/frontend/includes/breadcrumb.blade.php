<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4"
     data-background="{{ isset($page_image) && $page_image  ? asset(imagePath($page_image)) :
 asset('assets/frontend/img/slider/'.$breadcrumb_image) }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left caption mt-90">
                @if($page_method !=='index')
                    <h5><a href="/">Home</a> / <a href="{{route($base_route.'index')}}">{{ $page }}</a> /</h5>
                    <h1>{{ $page_title }}</h1>
                @else
                    <h5><a href="/">Home</a> /</h5>
                    <h1>{{ $page_title }}</h1>
                @endif
            </div>
        </div>
    </div>
</div>
