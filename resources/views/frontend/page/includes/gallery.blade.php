<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle">{{ $element->list_number_2 ?? '' }}</div>
                <div class="section-title">{{ $element->list_number_1 ?? '' }}</div>
            </div>

            <!-- 3 columns -->
            @foreach($element->pageSectionGalleries as $index=>$gallery)
                <div class="col-md-4 gallery-item">
                    <a href="{{ asset(galleryImagePath('section_element').$gallery->resized_name) }}" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img">
                                <img src="{{ asset(galleryImagePath('section_element').$gallery->resized_name) }}"
                                     class="mx-auto d-block {{ @$page_detail->slug=='legal-document' || @$page_detail->slug=='legal-documents' || @$page_detail->slug=='sample-documents' || @$page_detail->slug=='sample-document' ? '':'image-dimension' }}" alt="work-img">
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
