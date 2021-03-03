<x-app-layout>

    @section('css')
        <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
        <link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">

    @endsection

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Entry Transaksi</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Entry Transaksi</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 mb-3 header-title">Buat Transaksi</h4>

                            <div class="form-group">
                                <label for="siswa">Siswa</label>
                                <select class="form-control select2" id="siswa">
                                    <option value=""></option>
                                    @foreach ($kelas as $kela)
                                        <optgroup
                                            label="{{ $kela->nama_kelas }} - {{ $kela->kompetensi_keahlian }}">
                                            @foreach ($kela->siswa as $siswa)
                                                <option value="{{ $siswa->nisn }}">
                                                    {{ $siswa->nama }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>

                            <div id="form-siswa" class="row" style="display: none">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="bulan_dibayar">Bulan Dibayar</label>
                                        <select name="bulan_dibayar[]" id="bulan_dibayar" class="select2 form-control
                                        select2-multiple" multiple>
                                            <option value=""></option>
                                            <option value="januari">Januari</option>
                                            <option value="februari">Februari</option>
                                            <option value="maret">Maret</option>
                                            <option value="april">April</option>
                                            <option value="mei">Mei</option>
                                            <option value="juni">Juni</option>
                                            <option value="juli">Juli</option>
                                            <option value="agustus">Agustus</option>
                                            <option value="september">September</option>
                                            <option value="oktober">Oktober</option>
                                            <option value="november">November</option>
                                            <option value="desember">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="tahun_dibayar">Spp</label>
                                        <select id="spp" class="form-control select2">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="payment">Payment(s)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="payment">Payment Method</label>
                                                <select name="payment" class="select2" id="payment">
                                                    <option value="cash">Cash</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="payment">Jumlah</label>
                                                <input id="jumlah" type="text" class="form-control" name="jumlah"
                                                    rel="jumlah">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="form-group">
                                            <label for="catatan">Catatan</label>
                                            <textarea name="catatan" id="catatan" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="jumlah_bayar">Jumlah Bayar</label>
                                        <input id="jumlah_bayar" type="text" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="dibayar">Dibayar</label>
                                        <input id="dibayar" type="text" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="unpaid">Belum Dibayar</label>
                                        <input id="unpaid" type="text" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="change">Kembalian</label>
                                        <input id="change" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button id="btn-bayar" class="btn btn-primary mx-1">Bayar</button>
                                    <button type="reset" class="btn btn-danger mx-1">Reset</button>
                                </div>
                            </div>

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
        <script src="{{ asset('assets/js/entry-spp.js') }}"></script>

    @endsection

</x-app-layout>
