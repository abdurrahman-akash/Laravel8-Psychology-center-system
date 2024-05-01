@extends('layouts.master_b_end')

@section('header_script')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('b_end/assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{ asset('b_end/assets/js/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('b_end/assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}">
    <link rel="stylesheet" href="{{ asset('b_end/assets/js/plugins/dropzone/min/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{ asset('b_end/assets/js/plugins/flatpickr/flatpickr.min.css')}}">
@endsection

@section('content')

    <div class="content">

        <!-- Mega Form -->
        <h2 class="content-heading">Basic Information</h2>
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Case Sturdy Details</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label" for="mega-firstname">Request Appointment Date</label>
                                <label class="form-control form-control-lg" style="background-color: yellow" >
                                    {{ \Carbon\Carbon::parse($case->r_a_date)->isoFormat('MMM')}}
                                    {{ \Carbon\Carbon::parse($case->r_a_date)->isoFormat('DD')}},
                                    {{ \Carbon\Carbon::parse($case->r_a_date)->isoFormat('YYYY')}}
                                    {{--                                    {{ $case->r_a_date }}--}}
                                </label>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="mega-lastname">Request Appointment Time Slot</label>
                                <label class="form-control form-control-lg" style="background-color: yellow">{{ $case->r_a_time_slot }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ url('/admin/case_sturdy/update/'.$case->id) }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-7">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="mega-firstname">Name</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname" name="name" value="{{ $case->user->name }}">
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="mega-lastname">Email</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-lastname" name="email" value="{{ $case->user->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-lastname">Phone Number</label>
                                <input type="text" class="form-control form-control-lg" id="mega-username" name="phone" value="{{ $case->user->phone }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="mega-skills">Department</label>
                                    <select class="js-select2 form-select" id="example-select3" name="department" style="width: 100%;" data-placeholder="Choose one..">
                                        <option value="{{ $case->user->department }}">{{ $case->user->department }}</option>

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
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-skills">Psychologist</label>
                                <select class="js-select2 form-select" id="psy_id" name="psy_id" style="width: 100%;" data-placeholder="Choose one..">
                                    <option></option>

                                    @foreach($psy as $psys)
                                        <option value="{{ $psys->id }}">{{ $psys->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Problem Discussion</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="problem_discussion" rows="13" placeholder="Enter your problems..">{!! $case->problem_discussion !!}</textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Parents Information</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="parents_information" rows="13" placeholder="Parents Information..">{!! $case->parents_information !!}</textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-city">Appointment Date</label>
                                <input type="date" class="form-control form-control-lg" id="country-dropdown" name="r_a_date">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="mega-skills">Appointment Time Slot</label>
                                <select class="js-select2 form-select" id="state-dropdown" name="r_a_time_slot" style="width: 100%;" data-placeholder="Choose one..">
                                    <option></option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="mega-city">Number of Siblings</label>
                                <input type="text" class="form-control form-control-lg" id="number_siblings" name="number_siblings" value="{{ $case->number_siblings }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="mega-city">Birth Order</label>
                                <input type="text" class="form-control form-control-lg" id="birth_order" name="birth_order" value="{{ $case->birth_order }}" placeholder="Enter your birth order..">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="mega-firstname">Student ID</label>
                                <input type="text" class="form-control form-control-lg" id="mega-firstname" name="student_id" value="{{ $case->user->student_id }}">
                            </div>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="mega-age">Age</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-age" name="age" value="{{ $case->user->age }}">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="mega-skills">Gender</label>
                                <select class="js-select2 form-select" id="gender2" name="gender" style="width: 100%;" data-placeholder="Choose one..">
                                    <option value="{{ $case->user->gender }}" >{{ $case->user->gender }}</option>

                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>

                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="mega-skills">Category</label>
                                <select class="js-select2 form-select" id="category2" name="category" style="width: 100%;" data-placeholder="Choose one..">
                                    <option value="{{ $case->user->category }}" >{{ $case->user->category }}</option>

                                    <option value="Student">Student</option>
                                    <option value="Faculty">Faculty</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Present Address</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="present_address" rows="5">{!! $case->present_address !!}</textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Permanent Address</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="permanent_address" rows="5">{!! $case->permanent_address !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Past History of Psychological Condition</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="p_history_psy" rows="5">{!! $case->p_history_psy !!}</textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Family history of Psychological Condition</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="f_history_psy" rows="5">{!! $case->f_history_psy !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Medical history/Psychiatric History</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="m_history_psy" rows="5" >{!! $case->m_history_psy !!}</textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Self Harm/Suicidal History</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="self_harm" rows="5" >{!! $case->self_harm !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Developmental History</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="development_history" rows="5" >{!! $case->development_history !!}</textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Educational History</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="educational_history" rows="5" >{!! $case->educational_history !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Contact Person</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="contract_person" rows="5" placeholder="Enter a few details about yourself..">{!! $case->contract_person !!}</textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Presenting Symptoms</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="presenting_symptoms" rows="5" placeholder="Enter a few details about yourself..">{!! $case->presenting_symptoms !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Significant History of Presenting Condition</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="significant_history_presenting" rows="5" >{!! $case->significant_history_presenting !!}</textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">MSE ( Mental Status Examination)</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="mental_status_examination" rows="5" >{!! $case->mental_status_examination !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Condition Identified/Diagnosis</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="condition_identified" rows="5">{!! $case->condition_identified !!}</textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Treatment Goal</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="treatment_goal" rows="5">{!! $case->treatment_goal !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Assessment</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="assessment" rows="5">{!! $case->assessment !!}</textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Treatment Plan</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="treatment_plan" rows="5">{!! $case->treatment_plan !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="mega-firstname">Referring Name</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname" name="r_name" value="{{ $case->r_name }}" placeholder="Enter your firstname..">
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="mega-lastname">Referring ID</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-lastname" name="r_id" value="{{ $case->r_id }}" placeholder="Enter your lastname..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-lastname">Referring Department</label>
                                <input type="text" class="form-control form-control-lg" id="mega-username" name="r_department" value="{{ $case->r_department }}" placeholder="Enter your username..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="mega-firstname">Referring Designation</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname" name="r_designation" value="{{ $case->r_designation }}" placeholder="Enter your firstname..">
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="mega-lastname">Referring Contract</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-lastname" name="r_contract" value="{{ $case->r_contract }}" placeholder="Enter your lastname..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-lastname">Referring Email</label>
                                <input type="text" class="form-control form-control-lg" id="mega-username" name="r_email" value="{{ $case->r_email }}" placeholder="Enter your username..">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-skills">Status</label>
                                <select class="js-select2 form-select" id="psy_id123" name="status" style="width: 100%;" data-placeholder="Choose one..">
                                    @if($case->status == '1')
                                        <option value="1">Approved</option>
                                    @elseif($case->status == '0')
                                        <option value="0">Approval Pending</option>
                                    @elseif($case->status == '2')
                                        <option value="2">Closed</option>
                                    @endif

                                    <option value="1">Approved</option>
                                    <option value="0">Approval Pending</option>
                                    <option value="2">Closed</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check opacity-50 me-1"></i> Complete Case Studies
                        </button>
                    </div>

                </form>
            </div>
        </div>
        <!-- END Mega Form -->
    </div>

@endsection

@section('footer_script')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#psy_id').on('change', function () {
                var usid = this.value;

                /*------------------------------------------
                --------------------------------------------
                Country Dropdown Change Event
                --------------------------------------------
                --------------------------------------------*/
                $('#country-dropdown').on('change', function () {
                    var idCountry = this.value;

                    $("#state-dropdown").html('');
                    $.ajax({
                        url: "{{url('api/fetch-states')}}",
                        type: "POST",
                        data: {
                            country_id: idCountry,
                            psycho_id: usid,
                            _token: '{{csrf_token()}}'
                        },
                        dataType: 'json',
                        success: function (result) {
                            $('#state-dropdown').html('<option value="">-- Select State --</option>');
                            $.each(result.states, function (key, value) {
                                $("#state-dropdown").append('<option value="' + value
                                    .id + '">' + value.time_slot + '</option>');
                            });
                            $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        }
                    });
                });
            });

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
