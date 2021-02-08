<x-app-layout>

    @section('css')
        <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    @endsection

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Tambah User</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('users.index')}}">User</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">
                                Form tambah user
                            </h4>

                            <form action="{{route('users.update', ['user' => $user->id])}}" method="post"
                                  enctype="multipart/form-data" >
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control @error('name')
                                            is-invalid
                                        @enderror" value="{{$user->name}}">
                                        <x-input-error for="name"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email"
                                               class="form-control @error ('email') is-invalid @enderror"
                                               value="{{$user->email}}">
                                        <x-input-error for="email"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password"
                                               class="form-control @error ('password') is-invalid @enderror"
                                               value="">
                                        <x-input-error for="password"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="roles" class="col-sm-2 col-form-label">Roles</label>
                                    <div class="col-sm-10">
                                        <select name="roles[]" id="roles" class="form-control select2
                                        select2-multiple @error('roles') is-invalid @enderror " multiple>
                                            @foreach($roles as $role)
                                                <option
                                                    {{in_array($role, $userRole) ? "selected" : ""}}
                                                    value="{{$role}}">{{$role}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error for="roles"/>
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
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js')}}"></script>
        <script>
            $(document).ready(function() {
                $(".select2").select2();
            })
        </script>
    @endsection

</x-app-layout>
