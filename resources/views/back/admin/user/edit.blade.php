@extends('layouts.master_b_end')

@section('header_script')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('b_end/assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{ asset('b_end/assets/js/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('b_end/assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}">
    <link rel="stylesheet" href="{{ asset('b_end/assets/js/plugins/dropzone/min/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{ asset('b_end/assets/js/plugins/flatpickr/flatpickr.min.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')

    <div class="content">

        <!-- Contact Forms -->
        <h2 class="content-heading">User Edit</h2>
        <div class="row items-push">
            <div class="col-xl-8">
                <!-- Default Contact -->
                <div class="block block-rounded h-100 mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">User</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                        </div>
                    </div>
                    <div class="block-content">


                        <form method="POST" action="{{ url('/admin/user/update/'.$user->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label" for="example-text-input1">Name</label>
                                <input type="text" class="form-control" id="example-text-input1" name="name" value="{{ $user->name }}" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="example-email-input2">Email</label>
                                <input type="email" class="form-control" id="example-email-input2" name="email" value="{{ $user->email }}" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="example-text-input3">Phone</label>
                                <input type="number" class="form-control" id="example-text-input3" name="phone" value="{{ $user->phone }}" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="example-text-input4">Student ID / Employee ID</label>
                                <input type="text" class="form-control" id="example-text-input4" name="student_id" value="{{ $user->student_id }}" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="example-password-input5">Password</label>
                                <input type="password" class="form-control" id="example-password-input5" name="password" placeholder="Password Input" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="example-text-input6">Designation</label>
                                <input type="text" class="form-control" id="example-text-input6" name="designation" value="{{ $user->designation }}">
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="example-text-input7">Age</label>
                                <input type="number" class="form-control" id="example-text-input7" name="age" value="{{ $user->age }}">
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Gender</label>
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

                            <div class="mb-4">
                                <label class="form-label">Category</label>
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

                            <div class="mb-4">
                                <label class="form-label" for="department">Department</label>
                                <div class="select2-box">
                                    <select  id="department" name="department" class="form-control" required>
                                        <option value="{{ $user->department }}">{{ $user->department }}</option>

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

                            <div class="mb-4">
                                <label class="form-label" for="example-textarea-input8">Present address</label>
                                <textarea class="form-control" id="example-textarea-input8" name="present_address" rows="4" >{{ $user->present_address }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="example-textarea-input9">Permanent Address</label>
                                <textarea class="form-control" id="example-textarea-input9" name="permanent_address" rows="4" >{{ $user->permanent_address }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="example-text-input10">Signature</label>
                                <input type="file" class="form-control" id="example-text-input10" name="image">
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="contact1-msg">Signature View</label>
                                <div class="col-md-4 animated fadeIn">
                                    <div class="options-container fx-item-rotate-r">
                                        <img class="img-fluid options-item" src="{{ asset($user->signature) }}" alt="">
                                        <div class="options-overlay bg-black-50">
                                            <div class="options-overlay-content">
                                                <h3 class="h4 text-white mb-1">Image</h3>
                                                <h4 class="h6 text-white-75 mb-3">More Details</h4>
                                                <a class="btn btn-sm btn-alt-primary" target="_blank" href="{{ asset($user->signature) }}">
                                                    <i class="fa fa-pencil-alt opacity-50 me-1"></i> View
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="example-textarea-input11">Short bio</label>
                                <textarea class="form-control" id="example-textarea-input11" name="short_bio" rows="4" >{{ $user->short_bio }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="contact1-subject">Status</label>
                                <select class="form-select" id="contact1-subject" name="is_admin" size="1" required>

                                    @if($user->is_admin == 1)
                                        <option value="1">Super Admin</option>
                                    @elseif($user->is_admin == 0)
                                        <option value="0">User</option>
                                    @elseif($user->is_admin == 3)
                                        <option value="3">Psychologist</option>
                                    @endif

                                    @if(auth()->user()->is_admin)
                                        <option value="1">Super Admin</option>
                                    @endif
                                    <option value="0">User</option>
                                    <option value="3">Psychologist</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-circle-right opacity-50 me-1"></i> Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Default Contact -->
            </div>
        </div>
        <!-- END Contact Forms -->
    </div>

@endsection

@section('footer_script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#department').select2();
        });
    </script>


    <!-- jQuery (required for BS Datepicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider + Password Strength Meter plugins) -->
    <script src="{{ asset('b_end/assets/js/lib/jquery.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('b_end/assets/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js')}}"></script>
    <script src="{{ asset('b_end/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ asset('b_end/assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{ asset('b_end/assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('b_end/assets/js/plugins/masked-inputs/jquery.maskedinput.min.js')}}"></script>
    <script src="{{ asset('b_end/assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{ asset('b_end/assets/js/plugins/dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{ asset('b_end/assets/js/plugins/flatpickr/flatpickr.min.js')}}"></script>

    <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs + Password Strength Meter plugins) -->
    <script>Codebase.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-maxlength', 'jq-select2', 'jq-rangeslider', 'jq-masked-inputs', 'jq-pw-strength']);</script>

@endsection
