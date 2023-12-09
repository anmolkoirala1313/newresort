@extends('formbuilder::front_layout')
@section('title') {{ ucfirst($pageTitle) }} @endsection
@section('css')

    <style>
        /* .footable .btn .caret {
            margin-left: 0;
            display: none;
        } */

        .rendered-form h1{
            margin: 0;
            color: var(--insur-black);
            font-size: 45px;
            line-height: 55px;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: var(--insur-letter-spacing);
        }

        .rendered-form p {
            font-size: 20px;
            line-height: 30px;
            letter-spacing: var(--insur-letter-spacing);
            font-weight: 500;
            padding-bottom: 20px;
        }

        .rendered-form input.form-control,.rendered-form select.form-control {
            height: 60px;
            width: 100%;
            border: none;
            background-color: var(--insur-extra);
            padding-left: 30px;
            padding-right: 30px;
            outline: none;
            font-size: 14px;
            color: var(--insur-gray);
            display: block;
            border-radius: var(--insur-bdr-radius);
            font-weight: 500;
            letter-spacing: var(--insur-letter-spacing);
        }

        .rendered-form label{
            font-size: 16px!important;
            color: var(--insur-black) !important;
            font-weight: 700;
            line-height: 26px;
            letter-spacing: 0.1em;
            margin-bottom: 8px!important;
        }
        .rendered-form textarea.form-control {
            font-size: 14px;
            color: var(--insur-gray);
            height: 180px!important;
            width: 100%;
            background-color: var(--insur-extra);
            padding: 15px 30px 30px;
            border: none;
            border-radius: var(--insur-bdr-radius);
            outline: none;
            margin-bottom: 0px;
            font-weight: 500;
        }

        .card-footer button{
            width: 30%!important;
            border: none!important;
            position: relative;
            display: inline-block;
            vertical-align: middle;
            -webkit-appearance: none;
            appearance: none;
            outline: none !important;
            background-color: var(--insur-base);
            color: var(--insur-white);
            font-size: 16px;
            font-weight: 700;
            letter-spacing: var(--insur-letter-spacing);
            border-radius: var(--insur-bdr-radius);
            padding: 17px 40px 17px;
            transition: all 0.5s linear;
            overflow: hidden;
            z-index: 1;
        }
        }

        .card {
            position: relative !important;
            display: -webkit-box !important;
            display: -ms-flexbox !important;
            display: flex !important;
            -webkit-box-orient: vertical !important;
            -webkit-box-direction: normal !important;
            -ms-flex-direction: column !important;
            flex-direction: column !important;
            min-width: 0 !important;
            word-wrap: break-word !important;
            background-color: var(--vz-card-bg) !important;
            background-clip: border-box !important;
            border: 0 solid rgba(0,0,0,.125) !important;
            border-radius: 0.25rem !important;
        }
        .card-header:first-child {
            border-radius: 0.25rem 0.25rem 0 0 !important;
        }

        .card-header {
            padding: 1rem 1rem !important;
            margin-bottom: 0 !important;
            background-color: var(--vz-card-cap-bg) !important;
            border-bottom: 0 solid rgba(0,0,0,.125) !important;
        }

        .card-footer:last-child {
            border-radius: 0 0 0.25rem 0.25rem !important;
        }

        .card-footer {
            padding: 1rem 1rem !important;
            background-color: var(--vz-card-cap-bg) !important;
            border-top: 0 solid rgba(0,0,0,.125) !important;
        }


    </style>
@endsection
@section('content')

    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{asset('assets/frontend/images/backgrounds/page-header-bg.jpg')}})">
        </div>
        <div class="page-header-shape-1"><img src="{{asset('assets/frontend/images/shapes/page-header-shape-1.png')}}" alt=""></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li><span>/</span></li>
                    <li>{{ $form->name }}</li>
                </ul>
                <h2>{{ $pageTitle }}</h2>
            </div>
        </div>
    </section>

    <section class="contact-page" >
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="contact-page__left">
                        <div class="section-title text-left">
                            <div class="section-sub-title-box">
                                <p class="section-sub-title">{{ ucwords($pageTitle) }}</p>
                                <div class="section-title-shape-1">
                                    <img src="{{asset('assets/frontend/images/shapes/section-title-shape-1.png')}}" alt="">
                                </div>
                                <div class="section-title-shape-2">
                                    <img src="{{asset('assets/frontend/images/shapes/section-title-shape-2.png')}}" alt="">
                                </div>
                            </div>
                            <h2 class="section-title__title">Feel free to get in touch with us</h2>
                        </div>
                        <div class="contact-page__call-email">
                            <div class="contact-page__call-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-page__call-email-content">
                                <h4>
                                    <a href="tel:{{@$setting_data->phone}}" class="contact-page__call-number">{{@$setting_data->phone}}</a>
                                    <a href="mailto:{{@$setting_data->email}}"
                                       class="contact-page__email">{{@$setting_data->email}}</a>
                                </h4>
                            </div>
                        </div>
                        <p class="contact-page__location-text">{{@$setting_data->address}}</p>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="contact-page__right">
                        <div class="contact-page__form">
                            <form action="{{ route('formbuilder::form.submit', $form->identifier) }}" method="POST" id="submitForm" enctype="multipart/form-data">
                                @csrf
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <strong class="sent-success">{{ $message }}</strong>
                                    </div>
                                @endif
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block">
                                        <strong class="error-sent">{{ $message }}</strong>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <div id="fb-render"></div>
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="theme-btn w-100 confirm-form" data-form="submitForm" data-message="Submit your entry for '{{ $form->name }}'?">
                                        <i class="fa fa-submit"></i> Submit Form
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-one cta-three">
        <div class="container">
            <div class="cta-one__content">
                <div class="cta-one__inner">
                    <div class="cta-one__left">
                        <h3 class="cta-one__title">You can also call us</h3>
                    </div>
                    <div class="cta-one__right">
                        <div class="cta-one__call">
                            <div class="cta-one__call-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="cta-one__call-number">
                                <a href="tel:9200368090">+92 (003) 68-090</a>
                                <p>Reach out to us</p>
                            </div>
                        </div>
                    </div>
                    <div class="cta-one__img">
                        <img src="{{asset('assets/frontend/images/resources/cta-one-img.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(@$setting_data->google_map)

        <section class="google-map-two">
            <iframe
                src="{{@$setting_data->google_map}}"
                class="google-map__two" allowfullscreen></iframe>

        </section>
    @endif

@endsection

@push(config('formbuilder.layout_js_stack', 'scripts'))
    <script type="text/javascript">
        window._form_builder_content = {!! json_encode($form->form_builder_json) !!}
    </script>
    <script src="{{ asset('vendor/formbuilder/js/render-form.js') }}{{ jazmy\FormBuilder\Helper::bustCache() }}" defer></script>
@endpush
