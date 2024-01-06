@extends('frontend.layouts.app')

@section('content')

 <!-- Breadcrumb Area Start -->
 <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/16.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content text-center">
                    <h2 class="page-title">About Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- About Us Area Start -->
<section class="roberto-about-us-area section-padding-100-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <div class="about-thumbnail pr-lg-5 mb-100 wow fadeInUp" data-wow-delay="100ms">
                    <img src="img/19.jpg" alt="">
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <!-- Section Heading -->
                <div class="section-heading wow fadeInUp" data-wow-delay="300ms">
                    <h6>Testimonials</h6>
                    <h2>20 Years Of Experience</h2>
                </div>
                <div class="about-content mb-100 wow fadeInUp" data-wow-delay="500ms">
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dese mollit anim id est laborum. Sed ut perspiciatis unde omnis iste.</p>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dese mollit anim id est laborum. Sed ut perspiciatis unde omnis iste. Lorem Ipsum available.</p>
                    <img src="img/signature.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Area End -->

<!-- Video Area Start -->
<div class="roberto--video--area bg-img bg-overlay jarallax section-padding-0-100" style="background-image: url(img/20.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 col-md-6">
                <!-- Section Heading -->
                <div class="section-heading text-center white wow fadeInUp" data-wow-delay="100ms">
                    <h6>Ultimate Solutions</h6>
                    <h2>Our Hotel &amp; Room</h2>
                </div>
                <div class="video-content-area mt-100 wow fadeInUp" data-wow-delay="500ms">
                    <a href="https://www.youtube.com/watch?v=Ldd8yjjo6jA" class="video-play-btn"><i class="fa fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Area End -->

<!-- Service Area Start -->
<section class="roberto-service-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                    <h6>Ultimate Solutions</h6>
                    <h2>Our Hotel &amp; Room</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Single Service Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area mb-100 wow fadeInUp" data-wow-delay="300ms">
                    <img src="img/21.jpg" alt="">
                    <div class="service-title d-flex align-items-center justify-content-center">
                        <h5>Restaurant &amp; Bar</h5>
                    </div>
                </div>
            </div>
            <!-- Single Service Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area mb-100 wow fadeInUp" data-wow-delay="500ms">
                    <img src="img/22.jpg" alt="">
                    <div class="service-title d-flex align-items-center justify-content-center">
                        <h5>Spa &amp; Fitness</h5>
                    </div>
                </div>
            </div>
            <!-- Single Service Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area mb-100 wow fadeInUp" data-wow-delay="700ms">
                    <img src="img/23.jpg" alt="">
                    <div class="service-title d-flex align-items-center justify-content-center">
                        <h5>Pool &amp; Party</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Service Area End -->

    @include('frontend.layouts.callActionPage')
    @include('frontend.layouts.partners')

@endsection
