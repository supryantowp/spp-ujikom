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
                        <h4 class="page-title">Pelunasan Transaksi</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pelunasan SPP</li>
                        </ol>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">Pelunasan Hutang</h4>

                            <div class="row gx-5">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="siswa">Siswa</label>
                                        <select name="siswa" id="siswa" class="form-control select2">
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
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="pembayaran">Pembayaran</label>
                                        <select name="id_pembayaran" id="id_pembayaran" class="form-control select2">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <label for="detail">Pembayaran Detail</label>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal</label>
                                                <input id="tanggal" type="text" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="total">Total</label>
                                                <input id="total" type="text" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="paid">Paid</label>
                                                <input id="paid" type="text" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="outstanding">Outstanding</label>
                                                <input id="outstanding" type="text" class="form-control" readonly>
                                            </div>
                                        </div>
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
                                                <select name="payment" class="form-control select2" id="payment"
                                                    required>
                                                    <option value="cash">Cash</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="payment">Jumlah</label>
                                                <input id="jumlah" type="text" class="form-control" name="jumlah"
                                                    rel="jumlah" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="form-group row">
                                            <label class="col-sm-4" for="catatan">Catatan</label>
                                            <div class="col-md-8">
                                                <textarea name="catatan" id="catatan" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-4" for="paid_balance">Paid Balance</label>
                                        <div class="col-md-8 col-12">
                                            <input id="paid_balance" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4" for="unpaid_balance">Unpaid Balance</label>
                                        <div class="col-md-8 col-12">
                                            <input id="unpaid_balance" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" id="btn-bayar" class="btn btn-primary mx-1">Bayar</button>
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
        <script src="{{ asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/js/helper.js') }}"></script>
        <script src="{{ asset('assets/js/pelunasan.js') }}"></script>
    @endsection

</x-app-layout>
