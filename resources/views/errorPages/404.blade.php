@extends('admin.layouts.master')
@section('body')

  <main>
    <div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>404</h1>
        <h2>The page you are looking for doesn't exist.</h2>
        <a class="btn" href="{{route('admin.dashboard')}}">Back to home</a>
        <img src="{{asset('/')}}admin/assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
        <div class="credits">
          Developed & Designed by <a href="#">US</a>
        </div>
      </section>

    </div>
  </main><!-- End #main -->

@endsection
