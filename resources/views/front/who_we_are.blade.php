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
    <!-- about-area start -->
    <section class="cart-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail"></th>
                                    <th class="cart-product-name">Info</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="{{ asset('f_end/assets/img/dis.img/who-we-are/img-1.png') }}" alt=""></a></td>
                                    <td class="product-name"><h6>
                                            Professor Dr. Syed Mizanur Rahman <br> Director</h6>
                                        <p>Students' Affairs <br>
                                            Daffodil International University <br>
                                            Contact: 01713493101</p>
                                        <a href="raju@daffodilvarsity.edu.bd">raju@daffodilvarsity.edu.bd</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="{{ asset('f_end/assets/img/dis.img/who-we-are/img-2.png') }}" alt=""></a></td>
                                    <td class="product-name"><h6>
                                            Amit Chakrabarty <br> Senior Assistant Director</h6>
                                        <p>Students' Affairs <br>
                                            Daffodil International University <br>
                                            Contact: 01718384336</p>
                                        <a href="amit.cse@daffodilvarsity.edu.bd">amit.cse@daffodilvarsity.edu.bd</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="{{ asset('f_end/assets/img/dis.img/who-we-are/img-3.png') }}" alt=""></a></td>
                                    <td class="product-name"><h6>
                                            Fahmi Hasan <br> Senior Assistant Director</h6>
                                        <p>Students' Affairs <br>
                                            Daffodil International University <br>
                                            Contact: 01811458844</p>
                                        <a href="dsaoffice2@daffodilvarsity.edu.bd">dsaoffice2@daffodilvarsity.edu.bd</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="{{ asset('f_end/assets/img/dis.img/who-we-are/img-4.png') }}" alt=""></a></td>
                                    <td class="product-name"><h6>
                                            Bilkis Khanam <br> Psychologist</h6>
                                        <p>Students' Affairs <br>
                                            Daffodil International University <br>
                                            Contact: 01847140065</p>
                                        <a href="psychologist@daffodilvarsity.edu.bd">psychologist@daffodilvarsity.edu.bd</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="{{ asset('f_end/assets/img/dis.img/who-we-are/img-5.jpg') }}" alt=""></a></td>
                                    <td class="product-name"><h6>
                                            Rakibul Hasan Sourav <br> Psychologist</h6>
                                        <p>Students' Affairs <br>
                                            Daffodil International University <br>
                                            Contact: 01521428408</p>
                                        <a href="psychologist2@daffodilvarsity.edu.bd">psychologist2@daffodilvarsity.edu.bd</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="{{ asset('f_end/assets/img/dis.img/who-we-are/img-6.png') }}" alt=""></a></td>
                                    <td class="product-name"><h6>
                                            Chandan Haider <br> Administrative officer</h6>
                                        <p>Students' Affairs <br>
                                            Daffodil International University <br>
                                            Contact: 01685408817</p>
                                        <a href="dsaoffice@daffodilvarsity.edu.bd">dsaoffice@daffodilvarsity.edu.bd</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="{{ asset('f_end/assets/img/dis.img/who-we-are/img-7.png') }}" alt=""></a></td>
                                    <td class="product-name"><h6>
                                            Kawsar Hamid <br> Assistant Administrative Officer</h6>
                                        <p>Students' Affairs <br>
                                            Daffodil International University <br>
                                            Contact: 01913689896</p>
                                        <a href="dsaoffice3@daffodilvarsity.edu.bd">dsaoffice3@daffodilvarsity.edu.bd</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="{{ asset('f_end/assets/img/dis.img/who-we-are/img-8.png') }}" alt=""></a></td>
                                    <td class="product-name"><h6>
                                            Budrunnesa Shuchi  <br> Assistant Administrative Officer</h6>
                                        <p>Students' Affairs <br>
                                            Daffodil International University <br>
                                            Contact: 01847140027</p>
                                        <a href="dsaoffice6@daffodilvarsity.edu.bd">dsaoffice6@daffodilvarsity.edu.bd</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="{{ asset('f_end/assets/img/dis.img/who-we-are/img-9.png') }}" alt=""></a></td>
                                    <td class="product-name"><h6>
                                            Anik Hasan Joy <br> Assistant Administrative Officer</h6>
                                        <p>Students' Affairs <br>
                                            Daffodil International University <br>
                                            Contact: 01847140130</p>
                                        <a href="dsaoffice5@daffodilvarsity.edu.bd">dsaoffice5@daffodilvarsity.edu.bd</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area end -->
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
