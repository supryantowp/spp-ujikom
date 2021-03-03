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
                            <h4 class="page-title">Spp</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Spp</li>
                            </ol>
                        </div>
                        <a href="{{ route('spp.create') }}" class="btn btn-primary">Tambah Spp</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>TAHUN</th>
                                        <th>NOMINAL</th>
                                        <th>PILIHAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($spps as $spp)
                                        <tr>
                                            <td>{{ $spp->tahun }}</td>
                                            <td>{{ $spp->nominalIdr }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('spp.edit', ['spp' => $spp->id]) }}"
                                                        class="btn btn-primary btn-sm mx-1">edit</a>
                                                    <form action="{{ route('spp.destroy', ['spp' => $spp->id]) }}"
                                                        method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button
                                                            class="btn btn-danger btn-sm mx-1 btn-delete">hapus</button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

        <script>
            $(document).ready(function() {
                $("#kelas").select2()
                $('table').dataTable()
                deleteData()
            })

        </script>

    @endsection

</x-app-layout>
