<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hotel - Reservation &amp; System</title>
    <link rel="icon" href="img/core-img/favicon.png">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link rel="stylesheet" href="{{asset('css/classy-nav.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
</head>

<body>

<!-- **** Loader ***** -->
@include('frontend.layouts.loader')

<!-- **** Navbar ***** -->
@include('frontend.layouts.navbar')

<!-- **** Page Content ***** -->
@yield('content')

<!-- **** Footer ***** -->
@include('frontend.layouts.footer')

<!-- **** All JS Files ***** -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset("js/popper.min.js")}}"></script>
<script src="{{asset("js/bootstrap.min.js")}}"></script>
<script src="{{asset("js/roberto.bundle.js")}}"></script>
<script src="{{asset("js/active.js")}}"></script>

</body>
</html>
