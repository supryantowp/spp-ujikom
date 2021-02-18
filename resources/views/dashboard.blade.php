<x-app-layout>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Dashboard</h4>
                        <p>Selamat datang !</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        @role('admin|petugas')
        @include('components.card-widget')
        @include('components.search-transaksi')
        @endrole

        @role('siswa')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="header-title">Histori Transaksi Anda</h4>
                        <div>
                            <a href="{{route('transaksi-by-siswa.export')}}" class="btn btn-primary" download="true"
                            >Export</a>
                            <button class="btn btn-primary">Cetak</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered datatable">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>TANGGAL</th>
                                <th>SPP</th>
                                <th>BULAN DIBAYAR</th>
                                <th>JUMLAH DIBAYAR</th>
                                <th>PILIHAN</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transaskiSiswa as $transaski)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$transaski->created_at->format('Y-m-d')}}</td>
                                    <td>{{$transaski->spp->tahun . ' | ' . $transaski->spp->nominalIdr}}</td>
                                    <td>{{$transaski->spp_bulan}}</td>
                                    <td>{{$transaski->jumlahIdr}}</td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endrole
    </div>

    @section('script')
        @include('layouts.datatable')

        <script>
            $(document).ready(function () {
                $(".datatable").dataTable()
            })
        </script>
    @endsection

</x-app-layout>



