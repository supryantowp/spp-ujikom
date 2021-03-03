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
                            <h4 class="page-title">Roles</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Roles</li>
                            </ol>
                        </div>
                        <a href="{{ route('roles.create') }}" class="btn btn-primary">Tambah Role</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAMA</th>
                                        <th>GUARD NAME</th>
                                        <th>PILIHAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ Str::upper($role->name) }}</td>
                                            <td>{{ $role->guard_name }}</td>
                                            <td>
                                                @if ($role->name == 'admin')

                                                @else
                                                    <div class="d-flex">
                                                        <a href="{{ route('roles.edit', ['role' => $role->id]) }}"
                                                            class="btn btn-primary btn-sm mx-1">Edit</a>
                                                        <form
                                                            action="{{ route('roles.destroy', ['role' => $role->id]) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button
                                                                class="btn btn-danger btn-sm mx-1 btn-delete">hapus</button>
                                                        </form>
                                                    </div>
                                                @endif
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
        <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/js/helper.js') }}"></script>

        @include('layouts.datatable')

        <script>
            $('table').dataTable()
            deleteData()

        </script>

    @endsection

</x-app-layout>
