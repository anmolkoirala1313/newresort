<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4"
     data-background="{{ isset($page_image) && $page_image  ? asset(imagePath($page_image)) :
 asset('assets/frontend/img/slider/'.$breadcrumb_image) }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left caption mt-90">
                    <h5><a href="/">Home</a> / <a href="{{route($base_route.'index', $data['row']->section->page->slug)}}">{{ucwords(@$data['row']->section->page->title)}}</a>
                        /</h5>
                    <h1>
                        {{ucwords(@$data['row']->list_title ?? $page_title ?? '')}}
                    </h1>
            </div>
        </div>
    </div>
</div>
