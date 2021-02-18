<x-app-layout>

    @section('css')
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
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Detail Siswa</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('siswa.index')}}">Siswa</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Siswa</h4>

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                    <div class="col-sm-8">
                                        <input readonly class="form-control-plaintext form-inline" type="text"
                                               value="{{$siswa->nama}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
                                    <div class="col-sm-8">
                                        <input readonly class="form-control-plaintext form-inline" type="text"
                                               value="{{$siswa->kelas->nama_kelas. ' - ' .
                                       $siswa->kelas->kompetensi_keahlian}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nisn" class="col-sm-4 col-form-label">Nisn</label>
                                    <div class="col-sm-8">
                                        <input readonly class="form-control-plaintext form-inline" type="text"
                                               value="{{$siswa->nisn}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nis" class="col-sm-4 col-form-label">Nis</label>
                                    <div class="col-sm-8">
                                        <input readonly class="form-control-plaintext form-inline" type="text"
                                               value="{{$siswa->nis}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                    <div class="col-sm-8">
                                        <input readonly class="form-control-plaintext form-inline" type="text"
                                               value="{{$siswa->alamat}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_telp" class="col-sm-4 col-form-label">No Telepon</label>
                                    <div class="col-sm-8">
                                        <input readonly class="form-control-plaintext form-inline" type="text"
                                               value="{{$siswa->no_telp}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_telp" class="col-sm-4 col-form-label">Total Transaksi</label>
                                    <div class="col-sm-8">
                                        <strong>RP. {{format_idr($siswa->transaksi->sum('jumlah_bayar'))}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Histori Transaksi</h4>

                        <table id="data-table" class="table table-striped">
                            <thead>
                            <tr>
                                <th>SPP</th>
                                <th>BULAN DIBAYAR</th>
                                <th>TOTAL</th>
                                <th>TANGGAL</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
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


        <script>
            $(document).ready(function () {
                $("#data-table").DataTable({
                    buttons: [
                        'excel', 'pdf'
                    ],
                    processiong: true,
                    serverSide: true,
                    ajax: "{{route('siswa.show', ['siswa' => $siswa->id])}}",
                    columns: [
                        {data: 'spp', name: 'spp'},
                        {data: 'bulan_dibayar', name: 'bulan_dibayar'},
                        {data: 'total', name: 'total'},
                        {data: 'tanggal', name:'tanggal'}
                    ],
                })
            })
        </script>
    @endsection

</x-app-layout>
