<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hotel - Reservation &amp; System</title>
    <link rel="icon" href="img/favicon.png">
    <!-- **** All CSS Files ***** -->
    @include('frontend.layouts.partials.css')
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
@include('frontend.layouts.partials.js')

</body>
</html>
