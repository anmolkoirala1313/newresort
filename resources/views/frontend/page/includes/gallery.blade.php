<section class="project-area-two project-bg-two" data-background="{{ asset('assets/frontend/img/bg/project_bg02.jpg') }}" style="    padding: 90px 100px;">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title section-title-three text-center mb-20 tg-heading-subheading animation-style1">
                    <span class="sub-title tg-element-title">{{ $element->list_number_2 ?? '' }}</span>
                    <h2 class="title tg-element-title">{{ $element->list_number_1 ?? '' }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($element->pageSectionGalleries as $index=>$gallery)
                <div class="col-lg-4 col-md-6 col-sm-10 mt-3">
                    <div class="project-thumb-two">
                        <div class="magnific-img">
                            <a class="image-popup-vertical-fit"
                               href="{{ asset(galleryImagePath('section_element').$gallery->resized_name) }}" title="">
                                <img src="{{ asset(galleryImagePath('section_element').$gallery->resized_name) }}"
                                     class="{{ @$page_detail->slug=='legal-document' || @$page_detail->slug=='legal-documents' || @$page_detail->slug=='sample-documents' || @$page_detail->slug=='sample-document' ? '':'image-dimension' }}" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
