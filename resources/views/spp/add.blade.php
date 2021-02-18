<x-app-layout>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Tambah Spp</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('spp.index')}}">Spp</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">
                                Form tambah SPP
                            </h4>

                            <form action="{{route('spp.store')}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tahun" class="form-control @error('tahun')
                                            is-invalid
                                        @enderror" value="{{old('tahun')}}">
                                        <x-input-error for="tahun"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nominal" class="col-sm-2 col-form-label">Nominal</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nominal" rel="nominal"
                                               class="form-control @error ('nominal') is-invalid @enderror"
                                               value="{{old('nominal')}}">
                                        <x-input-error for="nominal"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button id="btn-bayar" class="btn btn-primary mx-1">Tambah</button>
                                        <button type="reset" class="btn btn-danger mx-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <script>
            $(document).ready(function () {
                $("input[rel=nominal]").bind('keyup', function () {
                    let awal = 0;
                    $("input[rel=nominal]").each(function () {
                        this.value = this.value.replace(/[^0-9]/g, '');
                        if (this.value != '') awal += parseInt(this.value, 10);
                    });

                    $("input[rel=nominal]").each(function () {
                        this.value = this.value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
                    });

                })
            })
        </script>

    @endsection

</x-app-layout>
