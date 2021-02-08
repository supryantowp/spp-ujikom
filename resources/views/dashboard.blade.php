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
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">Histori Transaksi Anda</h4>
                            <table id="data-table" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>SPP</th>
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
        @endrole
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


            @role('siswa')
            <script>
                $(document).ready(function () {
                    $("#data-table").DataTable({
                        buttons: [
                            'excel', 'pdf'
                        ],
                        processiong: true,
                        serverSide: true,
                        ajax: "/api/history-spp/{{auth()->user()->nisn}}",
                        columns: [
                            {data: 'spp', name: 'spp'},
                            {data: 'total', name: 'total'},
                            {data: 'tanggal', name:'tanggal'}
                        ],
                    })
                })
            </script>
            @endrole
        @endsection

</x-app-layout>



