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
                <form action="be_forms_premade.html" method="POST" onsubmit="return false;">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="mega-firstname">Name</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname" name="name" value="{{ $case->user->name }}" disabled>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="mega-lastname">Email</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-lastname" name="email" value="{{ $case->user->email }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-lastname">Phone Number</label>
                                <input type="text" class="form-control form-control-lg" id="mega-username" name="phone" value="{{ $case->user->phone }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="mega-skills">Department</label>
                                    <select class="js-select2 form-select" id="example-select3" name="example-select2" style="width: 100%;" data-placeholder="Choose one.." disabled>
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        <option value="{{ $case->user->department }}">{{ $case->user->department }}</option>
                                       </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-skills">Psychologist</label>
                                <select class="js-select2 form-select" id="example-select2" name="example-select2" style="width: 100%;" data-placeholder="Choose one..">
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="{{ $case->psy->name }}">{{ $case->psy->name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Problem Discussion</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="problem_discussion" rows="5" placeholder="Enter your problems..">{!! $case->problem_discussion !!}</textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Parents Information</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="mega-bio" rows="10" placeholder="Parents Information..">{!! $case->parents_information !!}</textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-city">Number of Siblings</label>
                                <input type="text" class="form-control form-control-lg" id="mega-city" name="number_siblings" value="{{ $case->number_siblings }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="mega-city">Birth Order</label>
                                <input type="text" class="form-control form-control-lg" id="mega-city" name="birth_order" value="{{ $case->birth_order }}" placeholder="Enter your birth order..">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="mega-firstname">Student ID</label>
                                <input type="text" class="form-control form-control-lg" id="mega-firstname" name="student_id" value="{{ $case->user->student_id }}" disabled>
                            </div>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="mega-age">Age</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-age" name="age" value="{{ $case->user->age }}" disabled>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="mega-skills">Gender</label>
                                <select class="js-select2 form-select" id="example-select2" name="example-select2" style="width: 100%;" data-placeholder="Choose one..">
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="{{ $case->user->gender }}">{{ $case->user->gender }}</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="mega-skills">Category</label>
                                <select class="js-select2 form-select" id="example-select2" name="example-select2" style="width: 100%;" data-placeholder="Choose one..">
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="{{ $case->user->category }}">{{ $case->user->category }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Present Address</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="present_address" rows="5" >{!! $case->user->present_address !!}</textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Permanent Address</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="permanent_address" rows="5" >{!! $case->user->permanent_address !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Past History of Psychological Condition</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="p_history_psy" rows="5" >{!! $case->p_history_psy !!}</textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Family history of Psychological Condition</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="f_history_psy" rows="5" >{!! $case->f_history_psy !!}</textarea>
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
                                <textarea class="form-control form-control-lg" id="mega-bio" name="mega-bio" rows="5" placeholder="Enter a few details about yourself.."></textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Presenting Symptoms</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="mega-bio" rows="5" placeholder="Enter a few details about yourself.."></textarea>
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
                                <textarea class="form-control form-control-lg" id="mega-bio" name="mental_status_examination" rows="5">{!! $case->mental_status_examination !!}</textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Treatment Goal</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="mega-bio" rows="5">{!! $case->user->permanent_address !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Assessment</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="mega-bio" rows="5">{!! $case->user->permanent_address !!}</textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-bio">Treatment Plan</label>
                                <textarea class="form-control form-control-lg" id="mega-bio" name="mega-bio" rows="5">{!! $case->user->permanent_address !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="mega-firstname">Referring Name</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname" name="mega-firstname" placeholder="Enter your firstname..">
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="mega-lastname">Referring ID</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-lastname" name="mega-lastname" placeholder="Enter your lastname..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-lastname">Referring Department</label>
                                <input type="text" class="form-control form-control-lg" id="mega-username" name="mega-username" placeholder="Enter your username..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="mega-firstname">Referring Designation</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname" name="mega-firstname" placeholder="Enter your firstname..">
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="mega-lastname">Referring Contract</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-lastname" name="mega-lastname" placeholder="Enter your lastname..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-lastname">Referring Email</label>
                                <input type="text" class="form-control form-control-lg" id="mega-username" name="mega-username" placeholder="Enter your username..">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="mega-firstname">Proposed Appointment Date</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname" name="mega-firstname" placeholder="Enter your firstname..">
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="mega-lastname">Proposed Appointment Time Slot</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-lastname" name="mega-lastname" placeholder="Enter your lastname..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-4">
                                <label class="form-label" for="mega-lastname">Status</label>
                                <input type="text" class="form-control form-control-lg" id="mega-username" name="mega-username" placeholder="Enter your username..">
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

        <!-- Contact Forms -->
        <h2 class="content-heading">Individual Session</h2>
        <div class="row items-push">
            <div class="col-xl-8">
                <!-- Default Contact -->
                <div class="block block-rounded h-100 mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">1st Session</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="be_forms_premade.html" method="POST" onsubmit="return false;">

                            <div class="mb-4">
                                <label class="form-label" for="contact1-msg">Presenting Issues for the session</label>
                                <textarea class="form-control" id="contact1-msg" name="contact1-msg" rows="5" placeholder="Enter your message.."></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="contact1-msg">Session Activities</label>
                                <textarea class="form-control" id="contact1-msg" name="contact1-msg" rows="5" placeholder="Enter your message.."></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="contact1-msg">Take out from the session</label>
                                <textarea class="form-control" id="contact1-msg" name="contact1-msg" rows="5" placeholder="Enter your message.."></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="contact1-msg">Take out from the session</label>
                                <input type="file" class="form-control" id="contact1-firstname" name="contact1-firstname" placeholder="Enter your firstname..">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="mega-skills">Next Date of follow up</label>
                                <select class="js-select2 form-select" id="example-select4" name="example-select2" style="width: 100%;" data-placeholder="Choose one..">
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="Department of Business Administration">Department of Business Administration</option>
                                    <option value="Department of Business Studies">Department of Business Studies</option>
                                    <option value="Department of Real Estate">Department of Real Estate</option>
                                    <option value="Department of Tourism & Hospitality Management">Department of Tourism & Hospitality Management</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-paper-plane opacity-50 me-1"></i> Send Message
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
