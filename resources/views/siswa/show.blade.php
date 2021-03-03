<x-app-layout>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Detail Siswa</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('siswa.index') }}">Siswa</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Informasi Siswa</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#overview" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Overview</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab" href="#informasi" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">informasi</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#transaksi" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Transaksi</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active p-3" id="overview" role="tabpanel">
                                    <h4 class="mt-0 header-title mb-4">Bar Chart</h4>

                                    <ul class="list-inline widget-chart m-t-20 m-b-15 text-center">
                                        <li class="list-inline-item">
                                            <h5 class="mb-0">2541</h5>
                                            <p class="text-muted font-14">Activated</p>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="mb-0">84845</h5>
                                            <p class="text-muted font-14">Pending</p>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="mb-0">12001</h5>
                                            <p class="text-muted font-14">Deactivated</p>
                                        </li>
                                    </ul>

                                    <canvas id="bar"></canvas>
                                </div>

                                <div class="tab-pane p-3" id="informasi" role="tabpanel">
                                    <h4 class="header-title mb-4">INFORMASI</h4>
                                    <div class="row">
                                        <div class="col-md-5 col-12 align-items-end ">
                                            <div class="form-group row">
                                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                                <div class="col-sm-8">
                                                    <input readonly class="form-control-plaintext form-inline"
                                                        type="text" value="{{ $siswa->nama }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nisn" class="col-sm-4 col-form-label">Nisn</label>
                                                <div class="col-sm-8">
                                                    <input readonly class="form-control-plaintext form-inline"
                                                        type="text" value="{{ $siswa->nisn }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nis" class="col-sm-4 col-form-label">Nis</label>
                                                <div class="col-sm-8">
                                                    <input readonly class="form-control-plaintext form-inline"
                                                        type="text" value="{{ $siswa->nis }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="form-group row">
                                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                                <div class="col-sm-8">
                                                    <input readonly class="form-control-plaintext form-inline"
                                                        type="text" value="{{ $siswa->alamat }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="no_telp" class="col-sm-4 col-form-label">No Telepon</label>
                                                <div class="col-sm-8">
                                                    <input readonly class="form-control-plaintext form-inline"
                                                        type="text" value="{{ $siswa->no_telp }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
                                                <div class="col-sm-8">
                                                    <a class="text-primary"
                                                        href="{{ route('kelas.show', ['kela' => $siswa->kelas->id]) }}">{{ $siswa->kelas->nama_kelas }}
                                                        - {{ $siswa->kelas->kompetensi_keahlian }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane p-3" id="transaksi" role="tabpanel">
                                    <h4 class="header-title">TRANSAKSI</h4>
                                    <table id="data-table" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>TANGGAL</th>
                                                <th>SPP</th>
                                                <th>TOTAL</th>
                                                <th>STATUS</th>
                                                <th>PILIHAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($historys as $history)
                                                <tr>
                                                    <td>{{ $history->created_at->format('Y/m/d') }}</td>
                                                    <td>{{ $history->spp->tahun }} -
                                                        {{ $history->spp->nominalIdr }}
                                                    </td>
                                                    <td>{{ $history->jumlah_idr }}</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-pill {{ $history->status_pembayaran ? 'badge-success' : 'badge-danger' }} ">{{ $history->status_pembayaran ? 'Lunas' : 'Belum Lunas' }}</span>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('siswa.detail-transaksi', ['id' => $siswa->id, 'id_transaksi' => $history->id]) }}">
                                                            <i class="mdi mdi-eye"></i>
                                                        </a>
                                                        <a class="btn btn-warning btn-sm" href="#">
                                                            <i class="mdi mdi-printer"></i>
                                                        </a>

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
        </div>
    </div>

    @section('script')

        @include('layouts.datatable')
        <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
        {{-- <script src="{{ asset('assets/pages/chartjs.init.js') }}"></script> --}}

        <script>
            $(document).ready(function() {
                const ctx = document.getElementById('bar').getContext('2d')
                ctx.height = 200
                const chartTransaksi = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July", "August",
                            "September", "October", "December"
                        ],
                        datasets: [{
                            label: '# Transaksi SPP',
                            backgroundColor: "#28bbe3",
                            borderColor: "#28bbe3",
                            borderWidth: 1,
                            hoverBackgroundColor: "#28bbe3",
                            hoverBorderColor: "#28bbe3",
                            data: [12, 21, 213, 231]
                        }]
                    }
                })


                $('table').dataTable()
            })

        </script>

    @endsection

</x-app-layout>
