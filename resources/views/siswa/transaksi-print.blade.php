<x-app-layout>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 mt-5">
                <div class="card m-b-20">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="invoice-title">
                                    <h4 class="float-right font-16">
                                        <strong>01/SPP/{{ now()->format('YmdHis') }}</strong>
                                    </h4>
                                    <h3 class="mt-0">
                                        <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo"
                                            height="24" />
                                    </h3>
                                </div>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <div class="p-2">
                                        <h3 class="font-20"><strong>Ringkasa pesanan</strong></h3>
                                    </div>
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <td><strong>CODE PEMBAYARAN</strong></td>
                                                        <td><strong>SPP</strong></td>
                                                        <td class="text-center"><strong>BULAN DIBAYAR</strong></td>
                                                        </td>
                                                        <td class="text-right"><strong>TOTAL</strong></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                    @foreach ($transaksi as $trans)
                                                        <tr>
                                                            <td>{{ $trans->pembayaran_code }}</td>
                                                            <td>
                                                                {{ $trans->spp->tahun }} -
                                                                {{ $trans->spp->nominalIdr }}
                                                            </td>
                                                            <td class="text-center">{{ $trans->spp_bulan }}</td>
                                                            <td class="text-right">{{ $trans->jumlahIdr }}</td>
                                                        </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center">
                                                            <strong>Total</strong>
                                                        </td>
                                                        <td class="no-line text-right">
                                                            <h4 class="m-0">RP. {{ format_idr($total) }}</h4>
                                                        </td>
                                                    </tr>
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
        </div>
    </div>

    @section('script')

        <script>
            $(document).ready(function() {
                window.print()

                window.onafterprint = function() {
                    window.close()
                }
            })

        </script>
    @endsection

</x-app-layout>
