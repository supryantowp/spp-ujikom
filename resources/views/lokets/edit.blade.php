<x-app-layout>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box ">
                        <h4 class="page-title">Edit Loket</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('lokets.index') }}">Loket</a></li>
                            <li class="breadcrumn-item active">Edit</li>
                        </ol>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">Form edit loket</h4>

                            <form action="{{ route('lokets.update', ['loket' => $loket->id]) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama" class="form-control" value="{{ $loket->nama }}"
                                            required>
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
        <script src="{{ asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>

        <script>
            $('form').parsley()

        </script>
    @endsection

</x-app-layout>
