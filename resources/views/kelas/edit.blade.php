<x-app-layout>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Tambah Kelas</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('kelas.index')}}">Kelas</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">
                                Form tambah kelas
                            </h4>

                            <form action="{{route('kelas.update', ['kela' => $kelas->id])}}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama Kelas</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_kelas" class="form-control @error('nama_kelas')
                                            is-invalid
                                        @enderror"  value="{{$kelas->nama_kelas}}">
                                        <x-input-error for="nama_kelas" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Kompetensi Keahlian</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="kompetensi_keahlian"
                                               class="form-control @error ('kompetensi_keahlian') is-invalid @enderror"
                                               value="{{$kelas->kompetensi_keahlian}}">
                                        <x-input-error for="kompetensi_keahlian" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button id="btn-bayar" class="btn btn-primary mx-1">Update</button>
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

</x-app-layout>
