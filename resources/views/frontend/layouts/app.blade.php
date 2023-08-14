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
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
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
<script src="{{ asset('public/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/js/popper.min.js') }}"></script>
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/js/roberto.bundle.js') }}"></script>
<script src="{{ asset('public/js/default-assets/active.js') }}"></script>

</body>
</html>
