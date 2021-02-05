<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Espp</title>
    <meta content="Esppp" name="description"/>
    <meta content="Supryanto Widadi Putra" name="author"/>
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}">

    @yield('css')

    <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">

</head>

<body>

<div id="wrapper">
    @include('layouts.topbar')
    @include('layouts.sidebar')

    <div class="content-page">

        <div class="content">
            {{$slot}}
        </div>

        <footer class="footer">
            © {{date('Y')}} Espp<span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart
            text-danger"></i> by Supryantowp</span>.
        </footer>
    </div>
</div>

<script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/metisMenu.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{ URL::asset('assets/js/waves.min.js')}}"></script>

<script src="{{ URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<script src="{{ URL::asset('assets/js/app.js')}}"></script>

@yield('script')

@include('sweetalert::alert')

</body>

</html>
