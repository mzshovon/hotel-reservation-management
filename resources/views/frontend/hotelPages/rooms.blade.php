@extends('frontend.layouts.app')

@section('content')

  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/16.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content text-center">
                    <h2 class="page-title">Our Room</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Room</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Rooms Area Start -->
<div class="roberto-rooms-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <!-- Single Room Area -->
                <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                    <!-- Room Thumbnail -->
                    <div class="room-thumbnail">
                        <img src="img/43.jpg" alt="">
                    </div>
                    <!-- Room Content -->
                    <div class="room-content">
                        <h2>Room View Sea</h2>
                        <h4>400$ <span>/ Day</span></h4>
                        <div class="room-feature">
                            <h6>Size: <span>30 ft</span></h6>
                            <h6>Capacity: <span>Max persion 5</span></h6>
                            <h6>Bed: <span>King beds</span></h6>
                            <h6>Services: <span>Wifi, television ...</span></h6>
                        </div>
                        <a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Single Room Area -->
                <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="300ms">
                    <!-- Room Thumbnail -->
                    <div class="room-thumbnail">
                        <img src="img/44.jpg" alt="">
                    </div>
                    <!-- Room Content -->
                    <div class="room-content">
                        <h2>Small Room</h2>
                        <h4>400$ <span>/ Day</span></h4>
                        <div class="room-feature">
                            <h6>Size: <span>30 ft</span></h6>
                            <h6>Capacity: <span>Max persion 5</span></h6>
                            <h6>Bed: <span>King beds</span></h6>
                            <h6>Services: <span>Wifi, television ...</span></h6>
                        </div>
                        <a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Single Room Area -->
                <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="500ms">
                    <!-- Room Thumbnail -->
                    <div class="room-thumbnail">
                        <img src="img/45.jpg" alt="">
                    </div>
                    <!-- Room Content -->
                    <div class="room-content">
                        <h2>Premium King Room</h2>
                        <h4>400$ <span>/ Day</span></h4>
                        <div class="room-feature">
                            <h6>Size: <span>30 ft</span></h6>
                            <h6>Capacity: <span>Max persion 5</span></h6>
                            <h6>Bed: <span>King beds</span></h6>
                            <h6>Services: <span>Wifi, television ...</span></h6>
                        </div>
                        <a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Single Room Area -->
                <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="700ms">
                    <!-- Room Thumbnail -->
                    <div class="room-thumbnail">
                        <img src="img/46.jpg" alt="">
                    </div>
                    <!-- Room Content -->
                    <div class="room-content">
                        <h2>Room Vip King</h2>
                        <h4>400$ <span>/ Day</span></h4>
                        <div class="room-feature">
                            <h6>Size: <span>30 ft</span></h6>
                            <h6>Capacity: <span>Max persion 5</span></h6>
                            <h6>Bed: <span>King beds</span></h6>
                            <h6>Services: <span>Wifi, television ...</span></h6>
                        </div>
                        <a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Single Room Area -->
                <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="900ms">
                    <!-- Room Thumbnail -->
                    <div class="room-thumbnail">
                        <img src="img/47.jpg" alt="">
                    </div>
                    <!-- Room Content -->
                    <div class="room-content">
                        <h2>Royal Room</h2>
                        <h4>400$ <span>/ Day</span></h4>
                        <div class="room-feature">
                            <h6>Size: <span>30 ft</span></h6>
                            <h6>Capacity: <span>Max persion 5</span></h6>
                            <h6>Bed: <span>King beds</span></h6>
                            <h6>Services: <span>Wifi, television ...</span></h6>
                        </div>
                        <a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Pagination -->
                <nav class="roberto-pagination wow fadeInUp mb-100" data-wow-delay="1000ms">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next <i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-12 col-lg-4">
                <!-- Hotel Reservation Area -->
                <div class="hotel-reservation--area mb-100">
                    <form action="#" method="post">
                        <div class="form-group mb-30">
                            <label for="checkInDate">Date</label>
                            <div class="input-daterange" id="datepicker">
                                <div class="row no-gutters">
                                    <div class="col-6">
                                        <input type="text" class="input-small form-control" id="checkInDate" name="checkInDate" placeholder="Check In">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="input-small form-control" name="checkOutDate" placeholder="Check Out">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-30">
                            <label for="guests">Guests</label>
                            <div class="row">
                                <div class="col-6">
                                    <select name="adults" id="guests" class="form-control">
                                        <option value="adults">Adults</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select name="children" id="children" class="form-control">
                                        <option value="children">Children</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-50">
                            <div class="slider-range">
                                <div class="range-price">Max Price: $0 - $3000</div>
                                <div data-min="0" data-max="3000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="0" data-value-max="3000" data-label-result="Max Price: ">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn roberto-btn w-100">Check Available</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Rooms Area End -->

<!-- Call To Action Area Start -->
<section class="roberto-cta-area">
    <div class="container">
        <div class="cta-content bg-img bg-overlay jarallax" style="background-image: url(img/1.jpg);">
            <div class="row align-items-center">
                <div class="col-12 col-md-7">
                    <div class="cta-text mb-50">
                        <h2>Contact us now!</h2>
                        <h6>Contact (+12) 345-678-9999 to book directly or for advice</h6>
                    </div>
                </div>
                <div class="col-12 col-md-5 text-right">
                    <a href="#" class="btn roberto-btn mb-50">Contact Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Call To Action Area End -->

<!-- Partner Area Start -->
<div class="partner-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="partner-logo-content d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="300ms">
                    <!-- Single Partner Logo -->
                    <a href="#" class="partner-logo"><img src="img/p1.png" alt=""></a>
                    <!-- Single Partner Logo -->
                    <a href="#" class="partner-logo"><img src="img/p2.png" alt=""></a>
                    <!-- Single Partner Logo -->
                    <a href="#" class="partner-logo"><img src="img/p3.png" alt=""></a>
                    <!-- Single Partner Logo -->
                    <a href="#" class="partner-logo"><img src="img/p4.png" alt=""></a>
                    <!-- Single Partner Logo -->
                    <a href="#" class="partner-logo"><img src="img/p5.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partner Area End -->

@endsection
