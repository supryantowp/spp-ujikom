<x-app-layout>

    @section('css')
        <link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
        <!-- DataTables -->
        <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet"
              type="text/css"/>
        <!-- Responsive datatable examples -->
        <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet"
              type="text/css"/>
    @endsection

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="page-title">User</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">User</li>
                            </ol>
                        </div>
                        <a href="{{route('users.create')}}" class="btn btn-primary">Tambah User</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {!! $dataTable->table() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>

        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
        <!-- Responsive examples -->
        <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

        {!! $dataTable->scripts() !!}

        <script>
            $(document).ready(function () {
                $("#kelas").select2()

                $(document).on('click', '.btn-delete', function (e) {
                    e.preventDefault();
                    let deleteForm = this.parentElement
                    Swal.fire({
                        title: 'Apakah kamu yakin?',
                        text: "Anda tidak akan dapat mengembalikan ini!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: "#58db83",
                        cancelButtonColor: "#ec536c",
                        confirmButtonText: 'Ya, hapus!'
                    }).then((result) => {
                        if (result.value) {
                            deleteForm.submit()
                        }
                    })
                })
            })

        </script>

    @endsection

</x-app-layout>
