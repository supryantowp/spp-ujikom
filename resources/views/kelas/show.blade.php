<x-app-layout>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Detail Kelas</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('kelas.index') }}">Kelas</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">{{ $kelas->nama_kelas }} - {{ $kelas->kompetensi_keahlian }}
                            </h4>
                        </div>
                        <div class="card-body">
                            JUMLAH : {{ $kelas->siswa->count() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">List siswa </h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAMA</th>
                                        <th>NISN</th>
                                        <th>ALAMAT</th>
                                        <th>NO TELP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswas as $siswa)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a class="text-primary"
                                                    href="{{ route('siswa.show', ['siswa' => $siswa->id]) }}">{{ $siswa->nama }}</a>
                                            </td>
                                            <td>{{ $siswa->nisn }}</td>
                                            <td>{{ $siswa->alamat }}</td>
                                            <td>{{ $siswa->no_telp }}</td>
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
        @include('layouts.datatable')
        <script>
            $('table').dataTable()

        </script>
    @endsection

</x-app-layout>
