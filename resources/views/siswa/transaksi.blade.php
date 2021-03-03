<x-app-layout>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Detail Transaksi Siswa</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('siswa.index') }}">Siswa</a></li>
                            <li class="breadcrumb-item active">Detail Transaksi</li>
                        </ol>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="invoice-title">
                                        <h4 class="float-right font-16"><strong>Order #
                                                {{ $transaksi->pembayaran_code }}</strong></h4>
                                        <h3 class="mt-0">
                                            <img src="{{ URL::asset('/assets/images/logo-light.png') }}" alt="logo"
                                                height="24" />
                                        </h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            <address>
                                                <strong>Ditagi ke:</strong><br>
                                                {{ $siswa->nama }}<br>
                                                {{ $siswa->alamat }}<br>
                                                {{ $siswa->no_telp }}
                                            </address>
                                        </div>
                                        <div class="col-6 m-t-30 text-right">
                                            <address>
                                                <strong>Tanggal Transaksi:</strong><br>
                                                {{ $transaksi->created_at->format('M d, Y') }}<br><br>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                            <h3 class="font-20"><strong>Ringkasan pesanan </strong></h3>
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>#</strong></td>
                                                            <td class="text-center"><strong>SPP</strong></td>
                                                            <td class="text-center"><strong>BULAN</strong>
                                                            </td>
                                                            <td class="text-right"><strong>TOTAL</strong></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                        @foreach ($transaksi->bulans as $bulan)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td class="text-center">{{ $bulan->spp->tahun }}</td>
                                                                <td class="text-center">
                                                                    {{ Str::upper($bulan->bulan) }}
                                                                </td>
                                                                <td class="text-right">{{ $bulan->spp->nominalIdr }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center">
                                                                <strong>Total</strong>
                                                            </td>
                                                            <td class="no-line text-right">
                                                                <h4 class="m-0">
                                                                    {{ $transaksi->jumlahIdr }}
                                                                </h4>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="d-print-none">
                                                <div class="float-right">
                                                    <a href="javascript:window.print()"
                                                        class="btn btn-success waves-effect waves-light"><i
                                                            class="fa fa-print"></i></a>
                                                    <a href="#"
                                                        class="btn btn-primary waves-effect waves-light">Send</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end row -->

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
</x-app-layout>
