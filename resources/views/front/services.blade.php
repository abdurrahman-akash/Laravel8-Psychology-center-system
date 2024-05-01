@extends('layouts.master_f_end')
@section('header_script')
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('f_end/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('f_end/assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('f_end/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('f_end/assets/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('f_end/assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('f_end/assets/css/backtotop.css') }}">
    <link rel="stylesheet" href="{{ asset('f_end/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('f_end/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('f_end/assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('f_end/assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('f_end/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('f_end/assets/css/style_2.css') }}">

@endsection
@section('content')
    <!-- Services area start -->
    <section class="blog__area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section__title-wrapper mb-50 text-center">
                        <span class="section__title-pre">Services</span>
                        <h2 class="section__title section__title-44">Services We offer</h2>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="postbox__wrapper postbox__details pr-20">
                        <div class="postbox__item transition-3 mb-70">
                            <div class="postbox__thumb m-img">
                                <img src="{{ asset('f_end/assets/img/dis.img/services/services_1.jpeg') }}" alt="">
                            </div>
                            <div class="postbox__content">
                                <h3 class="postbox__title">Individual counseling</h3>
                                <div class="postbox__text mb-40">
                                    <p style="text-align: justify">Individual counseling is one to one counseling process of a client and a trained psychologist, where the client seeks help to achieve some goals in a safe caring and confidential environment. It is a process of self-exploration and helps to overcome personal challenges with the help of an expert professional. This process is quite popular as it provides the opportunity to talk openly about problems, express feelings without fear and being judged. It helps people explore themselves better and work with their personal issues which they may not be comfortable discussing in front of others.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="postbox__wrapper postbox__details pr-20">
                        <div class="postbox__item transition-3 mb-70">
                            <div class="postbox__thumb m-img">
                                <img src="{{ asset('f_end/assets/img/dis.img/services/services_2.jpeg') }}" alt="">
                            </div>
                            <div class="postbox__content">
                                <h3 class="postbox__title">Group counseling</h3>
                                <div class="postbox__text mb-40">
                                    <p style="text-align: justify">Group counseling is another effective process of counseling that helps people to increase personal growth. The group consists of 4 to 8 individuals facing similar concerns with a trained professional. Group provides a safe and supportive environment that helps group members to share their feeling and thought as they interact with others. Dealing with similar concerns makes a realization of an individual that I’m not the only one who is suffering, and getting feedback from other group members helps them to increase understanding of their issues.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="postbox__wrapper postbox__details pr-20">
                        <div class="postbox__item transition-3 mb-70">
                            <div class="postbox__thumb m-img">
                                <img src="{{ asset('f_end/assets/img/dis.img/services/services_3.jpeg') }}" alt="">
                            </div>
                            <div class="postbox__content">
                                <h3 class="postbox__title">Pair counseling</h3>
                                <div class="postbox__text mb-40">
                                    <p style="text-align: justify">We provide pair counseling to those who feel they need to improve their ongoing relationship. This process of counseling helps the partner to address the concern that may create conflict and difficulties in their romantic relationship. Pair counseling can also assist people with others relationships like roommates, academic patterns, colleagues and others.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="postbox__wrapper postbox__details pr-20">
                        <div class="postbox__item transition-3 mb-70">
                            <div class="postbox__thumb m-img">
                                <img src="{{ asset('f_end/assets/img/dis.img/services/services_4.jpeg') }}" alt="">
                            </div>
                            <div class="postbox__content">
                                <h3 class="postbox__title">Family Counseling</h3>
                                <div class="postbox__text mb-40">
                                    <p style="text-align: justify">Family plays an important supportive role in one’s life. We provide family counseling to those who are struggling with relationship problems within the family. We believe every family is a unique social system and it has its own pattern of interaction. Thus we help to improve the system of interactions among family members.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Services area end -->
@endsection


@section('footer_script')
    <!-- JS here -->
    <script src="{{ asset('f_end/assets/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/vendor/waypoints.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/bootstrap-bundle.js') }}"></script>

    <script src="{{ asset('f_end/assets/js/meanmenu.js') }}"></script>

    <script src="{{ asset('f_end/assets/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/parallax.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/backtotop.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/counterup.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/wow.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/main.js') }}"></script>
@endsection

