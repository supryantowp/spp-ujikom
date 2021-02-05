@extends('layouts.master-without-nav')

@section('content')
    <!-- Begin page -->
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">
                <div class="p-3">
                    <h4 class="text-muted font-18 m-b-5 text-center">Selamat Datang kembali !</h4>
                    <p class="text-muted text-center">Masuk untuk melanjutkan ke Fonik.</p>

                    <form class="form-horizontal m-t-30" action="{{route('login')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                   placeholder="Masukan email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="userpassword">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid
                                   @enderror" name="password" required autocomplete="current-password"
                                   placeholder="Masukan password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-6">

                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Masuk
                                </button>
                            </div>
                        </div>

                        {{--                        <div class="form-group m-t-10 mb-0 row">--}}
                        {{--                            <div class="col-12 m-t-20">--}}
                        {{--                                <a href="pages-recoverpw" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your--}}
                        {{--                                    password?</a>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </form>
                </div>

            </div>
        </div>

        <div class="m-t-40 text-center">
            {{--            <p>Don't have an account ? <a href="pages-register" class="font-14 text-primary"> Signup Now </a></p>--}}
            <p>© {{date('Y')}} Espp. Crafted with <i class="mdi mdi-heart text-danger"></i> by Supryanto</p>
        </div>

    </div>

@endsection
