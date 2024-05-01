@extends('layouts.master_b_end')

@section('header_script')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('b_end/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('b_end/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('b_end/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">

@endsection

@section('content')

    <div class="content">
        <h2 class="content-heading">Users</h2>

        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Users <small>List</small>
                </h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                    <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th>Name</th>
                        <th class="d-none d-sm-table-cell">Student ID</th>
                        <th class="d-none d-sm-table-cell">Phone</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                        <th class="text-center" style="width: 15%;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $key => $users)
                    <tr>
                        <td class="text-center">{{ $key+1 }}</td>
                        <td class="d-none d-sm-table-cell">{{ $users->name }}</td>
                        <td class="d-none d-sm-table-cell">{{ $users->student_id }}</td>
                        <td class="d-none d-sm-table-cell">{{ $users->phone }}</td>

                        <td class="d-none d-sm-table-cell">

                            @if($users->is_admin == '1')
                                <a href="">
                                    <span class="badge bg-success">Super Admin</span>
                                </a>
                            @elseif($users->is_admin == '3')
                                <a href="">
                                    <span class="badge bg-black">Psychologist</span>
                                </a>
                            @elseif($users->is_admin == '0')
                                <span class="badge bg-warning">User</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ url('/admin/user/edit/'.$users->id) }}">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="edit">
                                    <i class="far fa-file-lines"></i>
                                </button>
                            </a>
                            @if(auth()->user()->is_admin == 1)
                            <a href="{{ url('/admin/user/delete/'.$users->id) }}">
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
