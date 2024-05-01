@extends('layouts.master_b_end')

@section('header_script')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('b_end/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('b_end/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('b_end/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">

@endsection

@section('content')

    <div class="content">
        <h2 class="content-heading">Session</h2>

        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Session <small>List</small>
                </h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                    <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th>Student ID</th>
                        <th class="d-none d-sm-table-cell">Case ID</th>
                        <th class="d-none d-sm-table-cell">Presenting Issue</th>
                        <th class="d-none d-sm-table-cell">Next date follow up</th>
                        <th class="d-none d-sm-table-cell">Follow up time slot</th>
{{--                        <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>--}}
                        <th class="text-center" style="width: 15%;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($session as $key => $sessions)
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td class="d-none d-sm-table-cell">{{ $sessions->user->student_id }}</td>
                            <td class="d-none d-sm-table-cell">{{ $sessions->case->id }}</td>
                            <td class="d-none d-sm-table-cell">{{ $sessions->case->problem_discussion }}</td>
                            <td class="fw-semibold">
                                {{ \Carbon\Carbon::parse($sessions->Next_date_follow)->isoFormat('MMM')}}
                                {{ \Carbon\Carbon::parse($sessions->Next_date_follow)->isoFormat('DD')}},
                                {{ \Carbon\Carbon::parse($sessions->Next_date_follow)->isoFormat('YYYY')}}
                            </td>
                            <td class="fw-semibold">
                                {{ $sessions->sche->time_slot }}
                            </td>

                            <td class="text-center">
                                <a href="{{ url('/admin/session/single_edit/'.$sessions->id) }}">
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="edit">
                                        <i class="far fa-file-lines"></i>
                                    </button>
                                </a>
                                @if(auth()->user()->is_admin == 1)
                                    <a href="{{ url('/admin/session/delete/'.$sessions->id) }}">
                                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </a>
                                @endif

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>

@endsection

@section('footer_script')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('b_end/assets/js/lib/jquery.min.js') }}"></script>
    <!-- Page JS Plugins -->
    <script src="{{ asset('b_end/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('b_end/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('b_end/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('b_end/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('b_end/assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('b_end/assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('b_end/assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('b_end/assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('b_end/assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('b_end/assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('b_end/assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('b_end/assets/js/pages/be_tables_datatables.min.js') }}"></script>

@endsection
