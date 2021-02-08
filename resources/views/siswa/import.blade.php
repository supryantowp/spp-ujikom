<x-app-layout>
    <div class="wrapper">
        <div class="container">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Import siswa</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('siswa.index')}}">Siswa</a></li>
                        <li class="breadcrumb-item active">Import</li>
                    </ol>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Form import siswa</h4>
                        @if($errors->any())
                            <div class="alert alert-danger mb-">
                                @foreach($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{route('siswa.storeImport')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">File (Excel, xls, xlsx)</label>
                                <input type="file" name="file" class="filestyle" data-buttonname="btn-secondary"
                                       accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, *.csv"
                                >
                                <div id="emailHelp" class="form-text">unduh contoh file
                                    <a class="text-primary" href="/siswa.xlsx">disini</a> .
                                </div>
                            </div>
                            <button class="btn btn-primary float-right">import</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <script src="{{asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}"></script>
    @endsection

</x-app-layout>
