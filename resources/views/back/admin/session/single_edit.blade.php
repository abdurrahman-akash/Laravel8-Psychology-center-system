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

        <div class="row items-push">
            <div class="col-xl-8">
                <!-- Default Contact -->
                <div class="block block-rounded h-100 mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Add Session</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="{{ url('/admin/session/single_update/'.$session->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label class="form-label" for="contact1-msg">Presenting Issues for the session</label>
                                <textarea class="form-control" name="presenting_issue" rows="5" placeholder="Enter your message..">{!! $session->presenting_issue !!}</textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="contact1-msg">Session Activities</label>
                                <textarea class="form-control" name="session_activities" rows="5" placeholder="Enter your message..">{!! $session->session_activities !!}</textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="contact1-msg">Take out from the session</label>
                                <textarea class="form-control" name="Take_out" rows="5" placeholder="Enter your message..">{!! $session->Take_out !!}</textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="contact1-msg">Note</label>
                                <div class="col-md-4 animated fadeIn">
                                    <div class="options-container fx-item-rotate-r">
                                        <img class="img-fluid options-item" src="{{ asset($session->image) }}" alt="">
                                        <div class="options-overlay bg-black-50">
                                            <div class="options-overlay-content">
                                                <h3 class="h4 text-white mb-1">Image</h3>
                                                <h4 class="h6 text-white-75 mb-3">More Details</h4>
                                                <a class="btn btn-sm btn-alt-primary" target="_blank" href="{{ asset($session->image) }}">
                                                    <i class="fa fa-pencil-alt opacity-50 me-1"></i> View
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check opacity-50 me-1"></i> Update
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
