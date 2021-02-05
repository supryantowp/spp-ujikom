<x-app-layout>

    @section('css')
        <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
        <link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet"
              type="text/css">

    @endsection

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Entry Transaksi</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Transaksi SPP</li>
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
                                    <option>PILIH SISWA</option>
                                    @foreach($siswas as $siswa)
                                        <option value="{{$siswa->nisn}}">{{$siswa->nama}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="form-siswa" class="row" style="display: none">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="bulan_dibayar">Bulan Dibayar</label>
                                        <select name="bulan_dibayar[]" id="bulan_dibayar" class="select2 form-control
                                        select2-multiple" multiple>
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
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="jumlah_bayar">Jumlah Bayar</label>
                                        <input id="jumlah_bayar" type="text" class="form-control" readonly>
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
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>


        <script>
            $(document).ready(function () {

                $(".select2").select2();

                function formatNumber(num) {
                    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
                }

                let siswa_nisn, id_spp, jumlah_bayar, tot = 0;

                $("#siswa").on('change', function () {
                    if (this.value !== null) {
                        siswa_nisn = this.value
                        $('#form-siswa').show()
                    } else {
                        $('#form-siswa').hide()
                    }

                    $.ajax({
                        url: "/api/spp",
                        success: function (result) {
                            if (result.length === 0) {
                                $("#spp").append('<option>SPP tidak tersedia</option>')
                            }
                            $("#spp").empty()
                            for (let i = 0; i < result.length; i++) {
                                $("#spp").append('<option value="' + result[i].id + '" data-harga="' + result[i].nominal
                                    + '"' +
                                    '>' + result[i].tahun + '</option>')
                            }
                            id_spp = result[0].id
                            jumlah_bayar = result[0].nominal

                            $("#jumlah_bayar").val(formatNumber(jumlah_bayar))
                        }
                    })
                })

                $('#spp').on('change', function () {
                    id_spp = this.value
                    tot = $('option:selected', this).attr('data-harga')
                    let toto = $("#bulan_dibayar").val().length * tot;
                    $('#jumlah_bayar').val(formatNumber(toto))
                })

                $("#bulan_dibayar").on('change', function () {
                    tot += jumlah_bayar
                    console.log(tot)
                    $('#jumlah_bayar').val(formatNumber(tot))
                })

                $("#btn-bayar").on('click', function () {

                    if ($("#bulan_dibayar").val().length === 0) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Error',
                            text: 'form tidak boleh kosong!',
                        })
                    } else {
                        let jmlBulanDibayar = $("#bulan_dibayar").val().length
                        console.log(jumlah_bayar, jmlBulanDibayar)
                        $.ajax({
                            type: "POST",
                            url: `/api/spp/${siswa_nisn}`,
                            data: {
                                _token: "{{csrf_token()}}",
                                nisn: siswa_nisn,
                                bulan_dibayar: $("#bulan_dibayar").val(),
                                id_spp,
                                jumlah_bayar: $("#jumlah_bayar").val()
                            },
                            success: function (data) {
                                Swal.fire({
                                    type: 'success',
                                    text: data.msg
                                })
                                setTimeout(function () {
                                    window.location.reload()
                                }, 2000)
                            },
                            error: function (data) {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Error',
                                    text: data
                                })
                                setTimeout(function () {
                                    window.location.reload()
                                }, 2000)
                            }
                        })
                    }

                })

            })


        </script>
    @endsection

</x-app-layout>
