<x-app-layout>

    @section('css')
        <link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    @endsection

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="page-title">Siswa</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Siswa</li>
                            </ol>
                        </div>
                        <div>
                            <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Siswa</a>
                            <a href="{{ route('siswa.import') }}" class="btn btn-outline-primary">Import Siswa</a>
                        </div>
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
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/js/helper.js') }}"></script>

        @include('layouts.datatable')

        {!! $dataTable->scripts() !!}

        <script>
            $(document).ready(function() {
                $("#kelas").select2()

                deleteData()
            })

        </script>

    @endsection

</x-app-layout>
