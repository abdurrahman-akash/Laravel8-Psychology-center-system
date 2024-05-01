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
    <!-- about area start -->
    <section class="about__area pt-120 pb-120 p-relative">
        <div class="container">
            <div class="row">
                <div class="col-xxl-7 col-xl-7 col-lg-7">
                    <div class="about__thumb-wrapper d-sm-flex mr-20 p-relative">
                        <div class="about__shape">
                            <img class="about__shape-1 d-none d-sm-block" src="{{ asset('f_end/assets/img/dis.img/about/about-shape-1.png') }}" alt="">
                            <img class="about__shape-2 d-none d-sm-block" src="{{ asset('f_end/assets/img/dis.img/about/about-shape-2.png') }}" alt="">
                            <img class="about__shape-3" src="{{ asset('f_end/assets/img/dis.img/about/about-shape-3.png') }}" alt="">
                        </div>
                        <div class="about__thumb-left mr-10">
                            <div class="about__thumb-1 mb-10">
                                <img src="{{ asset('f_end/assets/img/dis.img/about/about-1.jpg') }}" alt="">
                            </div>
                            <div class="about__thumb-1 mb-10 text-end">
                                <img src="{{ asset('f_end/assets/img/dis.img/about/about-3.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="about__thumb-2 mb-10">
                            <img src="{{ asset('f_end/assets/img/dis.img/about/about-2.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-5">
                    <div class="about__content pl-70 pr-25">
                        <div class="section__title-wrapper mb-15">
                            <span class="section__title-pre">About Psycology</span>
                            <h2 class="section__title">What's Psycology?</h2>
                        </div>
                        <p style="text-align: justify">Psychology is the scientific study of the mind and behavior, according to the American Psychological Association. Psychology is a multifaceted discipline and includes many sub-fields of study such areas as human development, sports, health, clinical, social behavior and cognitive processes.
                            <br></p>
                    </div>
                </div>
                <div class="campus__area pt-120 pb-120">
                    <div class="container">
                        <div class="row grid">
                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 grid-item">
                                <div class="campus__thumb w-img mb-30">
                                    <img src="{{ asset('f_end/assets/img/dis.img/about/video_thamble.jpg') }}" alt="">
                                    <a href="https://www.youtube.com/watch?v=vo4pMVb0R6M" class="play-btn popup-video pulse-btn">
                                        <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.5 8.13397C16.1667 8.51888 16.1667 9.48113 15.5 9.86603L2 17.6603C1.33333 18.0452 0.5 17.564 0.5 16.7942V1.20577C0.5 0.43597 1.33333 -0.0451542 2 0.339746L15.5 8.13397Z" fill="#3D6CE7"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 grid-item">
                                <div class="campus__thumb w-img mb-25">
                                    <img src="{{ asset('f_end/assets/img/dis.img/about/about-1.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 grid-item">
                                <div class="campus__thumb w-img mb-30">
                                    <img src="{{ asset('f_end/assets/img/dis.img/about/about-3.jpeg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <p style="text-align: justify">We believe, human nature is inherently good and creative. Everyone has the capacity to move forward and overcome various challenges if they got a respectable and trustable environment. However, Life is not the bed of roses and the environment is not always favored us to grow effectively. In the long run of our life, we fall into various life challenges. Sometimes we can successfully overcome it by using our personal and social strength, but not always same. Sometimes we are not able to utilize our strength. At that point, we may get stuck becoming anxious, depressed, obsessed, violent. We may seek help from our family, friends and other known people. Sometimes they help us by listening and providing some suggestions. Those kind of suggestions may help us temporarily but cannot make a permanent change in ourselves. And we become dependent on that person emotionally. Sometimes they get judgmental and may not keep our confidential. At that stage, we need help from a professional mental health therapist. A professional mental health therapist will help us to reveal our own insight and understanding of our difficulties and make a positive change in a scientific way so that we will become a self-independent person, will make our own life choices with confidence and deal with different kinds of life challenges effectively.<br><br>
                            We provide psychological counseling to all of our students, faculty members, and administrative employees.
                        </p>
                        <h6>Counseling can assist you in a wide range of personal issues, including but are not limited to:</h6>
                        <ul>
                            <li>Academic concerns (lack of concentration, exam phobia, underachievement in studies, procrastination and time management issues)</li>
                            <li>Addiction</li>
                            <li>Adjustment to change/ Life transition</li>
                            <li>Aggression and violence</li>
                            <li>Anger</li>
                            <li>Antisocial personality</li>
                            <li>Anxiety</li>
                            <li>Attachment issues</li>
                            <li>Depression</li>
                            <li>Drug and alcohol addiction</li>
                            <li>Family conflict</li>
                            <li>Forgiveness</li>
                            <li>Grief, loss, and bereavement</li>
                            <li>Guilt</li>
                            <li>Lack of social skill</li>
                            <li>Low self-esteem</li>
                            <li>Phobias</li>
                            <li>Physical and psychological abuse</li>
                            <li>Psychological disorder due to psychological disturbance</li>
                            <li>Relationship conflict</li>
                            <li>Relationship conflict</li>
                            <li>Stress</li>
                            <li>Suicidal ideation</li>
                            <li>Trauma</li>
                            <p>Whatever the case will be, our psychologist will listen to your concern very carefully and will assist you to develop strategies that help you deal with your life challenges.</p>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about area end -->
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

