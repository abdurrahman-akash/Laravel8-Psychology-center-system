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
                        <div class="section__title">Referral Appointment</div>
                    </div>
                    <div class="sign__wrapper white-bg">

                        <form method="POST" action="{{ url('/admin/r_appointment/store_2') }}" class="form">
                            @csrf

                            @if(!empty($user->student_id))

                                <div class="input-box">
                                    <label>Patient Full Name</label>
                                    <input type="text" name="name" value="{{ $user->name }}" disabled />
                                </div>

                                <div class="input-box address">

                                    <div class="column">
                                        <input type="text" name="phone" value="{{ $user->phone }}" disabled />
                                        <input type="number" name="age" value="{{ $user->age }}" disabled />
                                    </div>
                                </div>

                                <div class="input-box">
                                    <label>Patient Email Address</label>
                                    <input type="text" name="email" value="{{ $user->email }}" disabled />
                                </div>

                                <div class="input-box">
                                    <label>Patient ID</label>
                                    <input type="text" name="student_id" value="{{ $user->student_id }}" disabled />
                                </div>

                                <div class="input-box">
                                    <label>Patient Department</label>
                                    <input type="text" name="department" value="{{ $user->department }}" disabled />
                                </div>

                                <div class="input-box address">
                                    <label>Patient Present Address</label>
                                    <input type="text" name="present_address" value="{{ $user->present_address }}" required />
                                </div>
                                <div class="input-box address">
                                    <label>Patient Permanent Address</label>
                                    <input type="text" name="permanent_address" value="{{ $user->permanent_address }}"  required />
                                </div>
                                <div class="input-box">
                                    <label>Patient Problem / Issue to Discuss </label>
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

                                <div class="input-box">
                                    <label>Patient Full Name</label>
                                    <input type="text" name="name" placeholder="Enter Patient Name" required />
                                </div>

                                <div class="input-box address">

                                    <div class="column">
                                        <input type="text" name="phone" placeholder=" Enter Patient phone Number"  required />
                                        <input type="number" name="age" placeholder="Enter Patient Age" required />
                                    </div>
                                </div>

                                <div class="input-box">
                                    <label>Patient Email Address</label>
                                    <input type="text" name="email" placeholder=" Enter Patient Email Address" required />
                                </div>

                                <div class="input-box">
                                    <label>Patient Password</label>
                                    <input type="password" name="password" placeholder="Enter Patient Password" required />
                                </div>

                                <div class="input-box">
                                    <label>Patient Department</label>
                                    <div class="select2-box">
                                        <select  id="department" name="department" class="column select_bar" required>
                                            <option > </option>
                                            <option value="Department of Business Administration">Department of Business Administration</option>
                                            <option value="Department of Business Studies">Department of Business Studies</option>
                                            <option value="Department of Real Estate">Department of Real Estate</option>
                                            <option value="Department of Tourism & Hospitality Management">Department of Tourism & Hospitality Management</option>
                                            <option value="Department of Innovation & Entrepreneurship">Department of Innovation & Entrepreneurship</option>
                                            <option value="Department of Computer Science and Engineering">Department of Computer Science and Engineering</option>
                                            <option value="Department of Software Engineering">Department of Software Engineering</option>
                                            <option value="Department of Multimedia & Creative Technology (MCT)">Department of Multimedia & Creative Technology (MCT)</option>
                                            <option value="Department of Computing and Information System">Department of Computing and Information System</option>
                                            <option value="Department of Information Technology & Management (ITM)">Department of Information Technology & Management (ITM)</option>
                                            <option value="Department of Information and Communication Engineering">Department of Information and Communication Engineering</option>
                                            <option value="Department of Textile Engineering">Department of Textile Engineering</option>
                                            <option value="Department of Electrical and Electronic Engineering">Department of Electrical and Electronic Engineering</option>
                                            <option value="Department of Architecture">Department of Architecture</option>
                                            <option value="Department of Civil Engineering">Department of Civil Engineering</option>
                                            <option value="Department of Environmental Science and Disaster Management">Department of Environmental Science and Disaster Management</option>
                                            <option value="Department of Pharmacy">Department of Pharmacy</option>
                                            <option value="Department of Nutrition and Food Engineering">Department of Nutrition and Food Engineering</option>
                                            <option value="Department of Public Health">Department of Public Health</option>
                                            <option value="Department of Physical Education & Sports Science">Department of Physical Education & Sports Science</option>
                                            <option value="Department of Agricultural Science">Department of Agricultural Science</option>
                                            <option value="Department of English">Department of English</option>
                                            <option value="Department of Law">Department of Law</option>
                                            <option value="Department of Journalism, Media and Communication">Department of Journalism, Media and Communication</option>
                                            <option value="Department of Development Studies">Department of Development Studies</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="gender-box">
                                    <h3>Patient Gender</h3>
                                    <div class="gender-option">
                                        <div class="gender">
                                            <input type="radio" id="check-male" name="gender" value="Male" checked />
                                            <label for="check-male">Male</label>
                                        </div>
                                        <div class="gender">
                                            <input type="radio" id="check-female" name="gender" value="Female" />
                                            <label for="check-female">Female</label>
                                        </div>
                                        <div class="gender">
                                            <input type="radio" id="check-other" name="gender" value="Other" />
                                            <label for="check-other">Other</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="gender-box">
                                    <h3>Patient Category</h3>
                                    <div class="gender-option">
                                        <div class="gender">
                                            <input type="radio" id="check-Student" name="category" value="Student" checked />
                                            <label for="check-Student">Student</label>
                                        </div>
                                        <div class="gender">
                                            <input type="radio" id="check-Faculty" name="category" value="Faculty" />
                                            <label for="check-Faculty">Faculty</label>
                                        </div>
                                        <div class="gender">
                                            <input type="radio" id="check-Admin" name="category" value="Admin" />
                                            <label for="check-Admin">Admin</label>
                                        </div>
                                    </div>
                                </div>

                                    <div class="input-box address">
                                        <label>Patient Present Address</label>
                                        <input type="text" name="present_address" placeholder="Enter street address" required />
                                    </div>

                                    <div class="input-box address">
                                        <label>Patient Permanent Address</label>
                                        <input type="text" name="permanent_address" placeholder="Enter street address" required />
                                    </div>

                                <div class="input-box">
                                    <label>Patient Problem / Issue to Discuss </label>
                                    <textarea class="form-control" name="problem_discussion" type="text" placeholder="" required></textarea>
                                </div>

                                <div class="input-box">
                                    <label>Time Slat</label>
                                    <div class="select2-box">
                                        <select  id="department2" name="r_a_time_slot" class="column select_bar" required>
                                            <option value="">Select Slot</option>
                                            @foreach($schedule as $schedules)
                                                <option value="{{ $schedules->id }}">{{ $schedules->time_slot }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            @endif

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
