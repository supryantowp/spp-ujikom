<x-app-layout>

    @section('css')
        <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    @endsection

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Siswa</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('siswa.index') }}">Siswa</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">
                                Form edit siswa
                            </h4>

                            <form action="{{ route('siswa.update', ['siswa' => $siswa->id]) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <div class="form-group row">
                                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                    <div class="col-sm-10">
                                        <select name="id_kelas" id="kelas" class="form-control select2" required>
                                            <option></option>
                                            @foreach ($kelaes as $kelas)
                                                <option value="{{ $kelas->id }}"
                                                    {{ $siswa->id_kelas === $kelas->id ? 'selected' : '' }}>
                                                    {{ $kelas->nama_kelas . ' - ' . $kelas->kompetensi_keahlian }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama" class="form-control" required
                                            value="{{ $siswa->nama }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="old_nisn" value="{{ $siswa->nisn }}">
                                        <input type="text" name="nisn" class="form-control" readonly
                                            value="{{ $siswa->nisn }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nis" class="form-control" value="{{ $siswa->nis }}"
                                            data-parsley-minlength="8" data-parsley-validation-threshold="1"
                                            data-parsley-trigger="keyup" data-parsley-type="digits" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" id="alamat"
                                            class="form-control">{{ $siswa->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_telp" class="col-sm-2 col-form-label">No Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="no_telp" class="form-control"
                                            value="{{ $siswa->no_telp }}"
                                            data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" data-parsley-trigger="keyup"
                                            required>
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

    @section('script')
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $("#kelas").select2({
                    placeholder: 'Silahkan pilih'
                })
                $('form').parsley()
            })

        </script>
    @endsection
</x-app-layout>
