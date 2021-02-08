<div class="row">
    <div class="col-lg-4 col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3">Cari Transaksi SPP</h4>
                <form action="" method="get">
                    <div class="mb-3">
                        <label for="nisn" class="form-label">NAMA</label>
                        <input type="text" class="form-control" id="search" name="search">
                    </div>
                    <button class="btn btn-primary btn-block">cari</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h4 class="header-title mt-0 ">Hasil Pencarian</h4>
                    <div>
                        <button class="btn btn-primary">Export</button>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>NISN</th>
                        <th>NAMA</th>
                        <th>SPP BULAN</th>
                        <th>JUMLAH BAYAR</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($pembayarans as $pembayaran)
                        <tr>
                            <td>{{$pembayaran->nisn}}</td>
                            <td>{{$pembayaran->siswa->nama}}</td>
                            <td>{{$pembayaran->spp_bulan}}</td>
                            <td>{{$pembayaran->jumlahIdr}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>tidak ada hasil</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
