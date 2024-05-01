@extends('layouts.master_f_end')

@section('header_script')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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


    <style>
        /* Import Google font - Poppins */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
        /** {*/
        /*    margin: 0;*/
        /*    padding: 0;*/
        /*    box-sizing: border-box;*/
        /*    font-family: "Poppins", sans-serif;*/
        /*}*/
        /*body {*/
        /*    min-height: 100vh;*/
        /*    display: flex;*/
        /*    align-items: center;*/
        /*    justify-content: center;*/
        /*    padding: 20px;*/
        /*    background: white;*/
        /*}*/
        .form_container {
            position: relative;
            max-width: 700px;
            width: 100%;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .form_container header {
            font-size: 1.5rem;
            color: #333;
            font-weight: 500;
            text-align: center;
        }
        .form_container .form {
            margin-top: 30px;
        }
        .form .input-box {
            width: 100%;
            margin-top: 20px;
        }
        .input-box label {
            color: #333;
        }
        .form :where(.input-box input, .select-box) {
            position: relative;
            height: 50px;
            width: 100%;
            outline: none;
            font-size: 1rem;
            color: #707070;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 0 15px;
        }
        .input-box input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
        }
        .form .column {
            display: flex;
            column-gap: 15px;
        }
        .form .gender-box {
            margin-top: 20px;
        }
        .gender-box h3 {
            color: #333;
            font-size: 1rem;
            font-weight: 400;
            margin-bottom: 8px;
        }
        .form :where(.gender-option, .gender) {
            display: flex;
            align-items: center;
            column-gap: 50px;
            flex-wrap: wrap;
        }
        .form .gender {
            column-gap: 5px;
        }
        .gender input {
            accent-color: rgb(61, 108, 231);
        }
        .form :where(.gender input, .gender label) {
            cursor: pointer;
        }
        .gender label {
            color: #707070;
        }
        .address :where(input, .select-box) {
            margin-top: 15px;
        }
        .select-box select {
            height: 100%;
            width: 100%;
            outline: none;
            border: none;
            color: #707070;
            font-size: 1rem;
        }
        .select2-box select {
            height: 100%;
            width: 100%;
            outline: none;
            border: none;
            color: #707070;
            font-size: 1rem;
        }
        .form button {
            height: 55px;
            width: 100%;
            font-size: 1rem;
            font-weight: 600;
            margin-top: 30px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            border-radius: 6px;
            border: 2px solid rgba(12, 20, 15, 0.1);
        }
        .form button:hover {
            background: rgb(37, 142, 70);
            color: white;
        }
        /*Responsive*/
        /*@media screen and (min-width: 1400px)*/
        /*    {*/
        /*    .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {*/
        /*        max-width: 750px;*/
        /*    }*/

        /*    @media screen and (max-width: 500px)*/
        /*    {*/
        /*        .form .column {*/
        /*            flex-wrap: wrap;*/
        /*        }*/
        /*        .form :where(.gender-option, .gender)*/
        /*        {*/
        /*            row-gap: 15px;*/
        /*        }*/
        /*    }*/
    </style>
@endsection

@section('content')
    <!-- Appointment area start -->
    <section class="signup__area p-relative z-index-1 pt-100 pb-145">

        <div class="container">
            <div class="row">

                <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2">
                    <div class="section__title-wrapper text-center md-55">
                        <div class="section__title">Appointment</div>
                    </div>
                    <div class="sign__wrapper white-bg">

                        <form method="POST" action="{{ url('/admin/case_sturdy/store') }}" class="form">
                            @csrf
                            @guest
                                <div class="input-box address">
                                    <label>Present Address</label>
                                    <input type="text" name="present_address" placeholder="Enter street address" required />
                                </div>
                                <div class="input-box address">
                                    <label>Permanent Address</label>
                                    <input type="text" name="permanent_address" placeholder="Enter street address" required />
                                </div>
                                <div class="input-box">
                                    <label>Problem / Issue to Discuss </label>
                                    <textarea class="form-control" name="problem_discussion" type="text" placeholder="" required></textarea>
                                </div>

                                <div class="input-box">
                                    <label>Time Slat</label>
                                    <div class="select2-box">
                                        <select  id="department2" name="r_a_time_slot" class="column select_bar">
                                            <option value="">Select Slot</option>
                                            @foreach($schedule as $schedules)
                                                <option value="{{ $schedules->id }}">{{ $schedules->time_slot }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @else
                                @if(empty(auth()->user()->present_address))
                                    <div class="input-box address">
                                        <label>Present Address</label>
                                        <input type="text" name="present_address" placeholder="Enter street address" required />
                                    </div>
                                @endif

                                @if(empty(auth()->user()->permanent_address))
                                    <div class="input-box address">
                                        <label>Permanent Address</label>
                                        <input type="text" name="permanent_address" placeholder="Enter street address" required />
                                    </div>
                                @endif

                                <div class="input-box">
                                    <label>Problem / Issue to Discuss </label>
                                    <textarea class="form-control" name="problem_discussion" type="text" placeholder="" required></textarea>
                                </div>

                                <div class="input-box">
                                    <label>Time Slat</label>
                                    <div class="select2-box">
                                        <select  id="department2" name="r_a_time_slot" class="column select_bar">
                                            <option value="">Select Slot</option>
                                            @foreach($schedule as $schedules)
                                                <option value="{{ $schedules->id }}">{{ $schedules->time_slot }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endguest

                            <button>Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Appointment area end -->
@endsection

@section('footer_script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#department2').select2();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#department').select2();
        });
    </script>

{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $('#r_date').change(function (){--}}
{{--                let r_date=$(this).val();--}}

{{--                $.ajax({--}}
{{--                    url:'/get_scheduled',--}}
{{--                    type:'post',--}}
{{--                    data:'r_date='+r_date+'&_token={{csrf_token()}}',--}}
{{--                    success:function (result){--}}
{{--                        $('#department2').html(result)--}}
{{--                    }--}}
{{--                })--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}


    <!-- JS here -->
{{--    <script src="{{ asset('f_end/assets/js/vendor/jquery.js') }}"></script>--}}

    <script src="{{ asset('f_end/assets/js/vendor/waypoints.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/bootstrap-bundle.js') }}"></script>

    <script src="{{ asset('f_end/assets/js/meanmenu.js') }}"></script>

    <script src="{{ asset('f_end/assets/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/parallax.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/backtotop.js') }}"></script>
{{--    <script src="{{ asset('f_end/assets/js/nice-select.js') }}"></script>--}}
    <script src="{{ asset('f_end/assets/js/counterup.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/wow.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('f_end/assets/js/main.js') }}"></script>

@endsection
