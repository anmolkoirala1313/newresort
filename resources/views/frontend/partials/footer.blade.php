<!-- Footer -->
<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-column footer-about">
                        <h3 class="footer-title">About Company</h3>
                        <a href="/">
                            <img class="lazy" data-src="{{ $setting_data->logo_white ?  asset(imagePath($setting_data->logo_white)) : asset(imagePath($setting_data->logo))}}" style="max-width: 230px;" alt="">
                        </a>
                        <p class="footer-about-text">
                            {{ $setting_data->description ?? '' }}
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    @if($footer_nav_data1!==null)
                        <div class="footer-column footer-explore clearfix">
                        <h3 class="footer-title">{{ $footer_nav_title1 ?? ''}}</h3>
                        <ul class="footer-explore-list list-unstyled">
                            @foreach(@$footer_nav_data1 as $nav)
                                @if(empty(@$nav->children[0]))
                                    <li><a href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">{{ @$nav->name ?? @$nav->title ?? ''}} </a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="col-md-3">
                    @if($footer_nav_data2!==null)
                        <div class="footer-column footer-explore clearfix">
                            <h3 class="footer-title">{{ $footer_nav_title2 ?? ''}}</h3>
                            <ul class="footer-explore-list list-unstyled">
                                @foreach(@$footer_nav_data2 as $nav)
                                    @if(empty(@$nav->children[0]))
                                        <li><a href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">{{ @$nav->name ?? @$nav->title ?? ''}} </a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-md-3">
                    <div class="footer-column footer-contact">
                        <h3 class="footer-title">Contact</h3>
                        <p class="footer-contact-text">{{ $setting_data->address ?? '' }}</p>
                        <div class="footer-contact-info">
                            <p class="footer-contact-phone"><span class="flaticon-call"></span>
                                <a href="tel:{{ $setting_data->phone ?? $setting_data->mobile }}">{{ $setting_data->phone ?? $setting_data->mobile }}</a></p>
                            <p class="footer-contact-mail">
                                <a href="mailto:{{ $setting_data->email }}">{{ $setting_data->email }}</a></p>
                        </div>
                        <div class="footer-about-social-list">
                            @if(@$setting_data->facebook)
                                <a href="#"><i class="ti-facebook"></i></a>
                            @endif
                            @if(@$setting_data->instagram)
                                <a href="#"><i class="ti-instagram"></i></a>
                            @endif
                            @if(@$setting_data->youtube)
                                <a href="#"><i class="ti-youtube"></i></a>
                            @endif
                            @if(@$setting_data->linkedin)
                                <a href="#"><i class="ti-linkedin"></i></a>
                            @endif
                            @if(@$setting_data->ticktock)
                                <a href="#"><i class="ti-tiktok"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-bottom-inner">
                        <p class="footer-bottom-copy-right">© Copyright 2023 <a href="/">{{@$setting_data->title ?? ''}}</a>
                            | developed by <a href="https://www.canosoft.com.np/" target="_blank">Canosoft Techonology</a> | All Right Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery -->
<script src="{{ asset('assets/frontend/js/jquery-3.6.3.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery-migrate-3.0.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/modernizr-2.6.2.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.isotope.v3.0.2.js') }}"></script>
<script src="{{ asset('assets/frontend/js/pace.js') }}"></script>
<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/scrollIt.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('assets/frontend/js/YouTubePopUp.js') }}"></script>
<script src="{{ asset('assets/frontend/js/select2.js') }}"></script>
<script src="{{ asset('assets/frontend/js/datepicker.js') }}"></script>
<script src="{{ asset('assets/frontend/js/smooth-scroll.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/custom.js') }}"></script>
@yield('js')
@stack('scripts')
</body>
</html>
