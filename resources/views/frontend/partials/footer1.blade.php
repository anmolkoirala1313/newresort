</main>
<!-- main-area-end -->


<!-- footer-area -->
<footer>
    <div class="footer-area footer-bg" data-background="{{ asset('assets/frontend/img/bg/footer_bg.jpg') }}">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-lg-3 col-md-7">
                        <div class="footer-widget">
                            <h4 class="fw-title">Information</h4>
                            <div class="footer-info">
                                <ul class="list-wrap">
                                    <li>
                                        <div class="icon">
                                            <i class="flaticon-pin"></i>
                                        </div>
                                        <div class="content">
                                            <p>{{ $setting_data->address ?? '' }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="flaticon-phone-call"></i>
                                        </div>
                                        <div class="content">
                                            <a href="tel:{{ $setting_data->phone ?? $setting_data->mobile }}">{{ $setting_data->phone ?? $setting_data->mobile }}</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="flaticon-mail"></i>
                                        </div>
                                        <div class="content">
                                            <p><a href="mailto:{{ $setting_data->email }}">{{ $setting_data->email }}</a></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-5 col-sm-6">
                        @if($footer_nav_data1!==null)
                            <div class="footer-widget">
                                <h4 class="fw-title">{{ $footer_nav_title1 ?? ''}}</h4>
                                <div class="footer-link">
                                    <ul class="list-wrap">
                                        @foreach(@$footer_nav_data1 as $nav)
                                            @if(empty(@$nav->children[0]))
                                                <li><a href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">{{ @$nav->name ?? @$nav->title ?? ''}} </a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-6">
                        @if($footer_nav_data2!==null)
                            <div class="footer-widget">
                                <h4 class="fw-title">{{ $footer_nav_title2 ?? ''}}</h4>
                                <div class="footer-link">
                                    <ul class="list-wrap">
                                        @foreach(@$footer_nav_data2 as $nav)
                                            @if(empty(@$nav->children[0]))
                                                <li><a href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">{{ @$nav->name ?? @$nav->title ?? ''}} </a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-4 col-md-7">
                        <div class="footer-widget">
                            <h4 class="fw-title">About Company</h4>
                            <div class="footer-newsletter">
                                <p>{{ $setting_data->description ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="left-sider">
                            <div class="f-logo">
                                <a href="/"><img class="lazy" data-src="{{ $setting_data->logo_white ?  asset(imagePath($setting_data->logo_white)) : asset(imagePath($setting_data->logo))}}" style="max-width: 230px;" alt=""></a>
                            </div>
                            <div class="copyright-text">
                                <p>Copyright ©  <a href="/">{{@$setting_data->title ?? ''}}</a> | developed by <a href="https://www.canosoft.com.np/" target="_blank">Canosoft Techonology</a> | All Right Reserved</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-social">
                            <ul class="list-wrap">
                                @if(@$setting_data->facebook)
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                @endif
                                @if(@$setting_data->instagram)
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                @endif
                                @if(@$setting_data->facebook)
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                @endif
                                @if(@$setting_data->linkedin)
                                    <li><a href="{{$setting_data->linkedin}}"><i class="fab fa-linkedin"></i></a></li>
                                @endif
                                @if(@$setting_data->ticktock)
                                    <li><a href="{{$setting_data->ticktock}}"><i class="fab fa-tiktok"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->


<!-- JS here -->
<script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.odometer.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.appear.js') }}"></script>
<script src="{{ asset('assets/frontend/js/gsap.js') }}"></script>
<script src="{{ asset('assets/frontend/js/ScrollTrigger.js') }}"></script>
<script src="{{ asset('assets/frontend/js/SplitText.js') }}"></script>
<script src="{{ asset('assets/frontend/js/gsap-animation.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jarallax.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.parallaxScroll.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/particles.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.inview.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/ajax-form.js') }}"></script>
<script src="{{ asset('assets/frontend/js/aos.js') }}"></script>
<script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
<script src="{{ asset('assets/common/lazyload.js') }}"></script>
@yield('js')
@stack('scripts')
</body>

</html>
