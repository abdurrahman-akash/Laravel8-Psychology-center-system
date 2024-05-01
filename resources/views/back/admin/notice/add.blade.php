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

        <!-- Contact Forms -->
        <h2 class="content-heading">Notice Add</h2>
        <div class="row items-push">
            <div class="col-xl-8">
                <!-- Default Contact -->
                <div class="block block-rounded h-100 mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Notice</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="{{ url('/admin/notice/store/') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label" for="example-flatpickr-custom">Date</label>
                                <input type="text" class="js-flatpickr form-control" id="example-flatpickr-custom" name="date" placeholder="Y-m-d" data-date-format="Y-m-d" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="contact1-msg">Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="contact1-msg">Notice File</label>
                                <input type="file" class="form-control" name="file" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="contact1-subject">Status</label>
                                <select class="form-select" id="contact1-subject" name="status" size="1" required>
                                    <option value="1">Active</option>
                                    <option value="0">inactive</option>
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
