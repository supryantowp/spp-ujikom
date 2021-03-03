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
                            <h4 class="page-title">Loket</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Loket</li>
                            </ol>
                        </div>
                        <a href="{{ route('lokets.create') }}" class="btn btn-primary">Tambah Loket</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAMA LOKET</th>
                                        <th>PILIHAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lokets as $loket)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $loket->nama }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('lokets.edit', ['loket' => $loket->id]) }}"
                                                        class="btn btn-primary btn-sm mx-1">edit</a>
                                                    <form
                                                        action="{{ route('lokets.destroy', ['loket' => $loket->id]) }}"
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
        <script src="{{ asset('assets/js/helper.js') }}"></script>
        @include('layouts.datatable')
        <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>

        <script>
            $('table').dataTable()
            deleteData()

        </script>
    @endsection

</x-app-layout>
