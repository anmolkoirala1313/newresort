<div class="about-content-six">
    <div class="section-title section-title-three mb-15 tg-heading-subheading animation-style1">
        <span class="sub-title tg-element-title">{{ $data['homepage']->subtitle ?? '' }}</span>
        <h2 class="title tg-element-title">{{ $data['homepage']->title ?? '' }}</h2>
    </div>
    <div class="text-align-justify">{!! $data['homepage']->description ?? '' !!}</div>
    @if($data['homepage']->link)
        <a href="{{ $data['homepage']->link ?? '' }}" class="btn btn-three">{{ $data['homepage']->button }}</a>
    @endif
    @if($data['homepage']->video)
        <a href="{{ $data['homepage']->video }}" class="play-btn popup-video"><i class="fas fa-play"></i>Watch Video</a>
    @endif
</div>
