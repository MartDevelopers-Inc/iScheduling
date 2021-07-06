<?php
/*
 * Created on Tue Jul 06 2021
 *
 * The MIT License (MIT)
 * Copyright (c) 2021 MartDevelopers Inc
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software
 * and associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial
 * portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED
 * TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
check_login();
require_once('../partials/client_analytics.php');
require_once('../partials/head.php');
?>

<body>
    <!-- Preloader-->
    <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
        <div class="spinner-grow text-primary" role="status">
            <div class="sr-only">Loading...</div>
        </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Header Area-->
    <?php require_once('../partials/header.php'); ?>
    <!-- Sidenav Black Overlay-->
    <div class="sidenav-black-overlay"></div>
    <!-- Side Nav Wrapper-->
    <?php require_once('../partials/client_side_nav.php'); ?>

    <div class="page-content-wrapper">
        <!-- Hero Slides-->
        <div class="owl-carousel-one owl-carousel">
            <div class="single-hero-slide bg-overlay" style="background-image: url('../public/img/bg-img/doctors.png')">
                <div class="slide-content h-100 d-flex align-items-center text-center">
                    <div class="container">
                        <h4 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Qualified Doctors</h4>
                        <a class="btn btn-creative btn-warning" href="" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="500ms"><?php echo $doc; ?></a>
                    </div>
                </div>
            </div>
            <div class="single-hero-slide bg-overlay" style="background-image: url('../public/img/bg-img/hospital_services.webp')">
                <div class="slide-content h-100 d-flex align-items-center text-center">
                    <div class="container">
                        <h4 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Hospital Services</h4>
                        <a class="btn btn-creative btn-warning" href="client_hospital_services" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="500ms"><?php echo $Hospital_Services; ?></a>
                    </div>
                </div>
            </div>
            <div class="single-hero-slide bg-overlay" style="background-image: url('../public/img/bg-img/booking.jpg')">
                <div class="slide-content h-100 d-flex align-items-center text-center">
                    <div class="container">
                        <h4 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">My Bookings</h4>
                        <a class="btn btn-creative btn-warning" href="client_bookings" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="500ms"><?php echo $Bookings; ?></a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h2>My Recent Bookings</h2>
                    <div class="testimonial-slide owl-carousel testimonial-style3">
                        <?php
                        $Login_id = $_SESSION['Login_id'];
                        $ret = "SELECT Clients.Client_full_name, Clients.Client_phone_no, Clients.Client_email, Hospital_Services.Service_name, Bookings.Booking_Ref,
                        Bookings.Booking_Date, Bookings.Booking_Status, Bookings.Booking_id
                         FROM Bookings LEFT JOIN Clients ON Bookings.Booking_Client_Id LEFT JOIN Hospital_Services ON Bookings.Booking_Service_Id
                         WHERE Clients.Client_login_id = '$Login_id' AND Clients.Client_id = Bookings.Booking_Client_Id AND Hospital_Services.Service_id = Bookings.Booking_Service_Id
                        ORDER BY Booking_Date ASC LIMIT 10   ";
                        $stmt = $mysqli->prepare($ret);
                        $stmt->execute(); //ok
                        $res = $stmt->get_result();
                        while ($booking = $res->fetch_object()) {
                        ?>

                            <div class="single-testimonial-slide">
                                <a href="client_booking?view=<?php echo $booking->Booking_id; ?>">
                                    <div class="text-content">
                                        <span class="d-inline-block badge bg-warning mb-2"><i class="bi bi-tag-fill"></i> Ref: <?php echo $booking->Booking_Ref; ?></span>
                                        <span class="d-block">Booking Status : <?php echo $booking->Booking_Status; ?></span>
                                        <span class="d-block">Booked Hospital Service : <?php echo $booking->Service_name; ?></span>
                                        <span class="d-block">Booking Date : <?php echo date('d-M-Y', strtotime($booking->Booking_Date)); ?></span>
                                    </div>
                                </a>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h2>Avaiable Hospital Services</h2>
                    <div class="testimonial-slide owl-carousel testimonial-style3">
                        <?php
                        $ret = "SELECT * FROM `Hospital_Services`  ORDER BY RAND() ASC LIMIT 10   ";
                        $stmt = $mysqli->prepare($ret);
                        $stmt->execute(); //ok
                        $res = $stmt->get_result();
                        while ($service = $res->fetch_object()) {
                        ?>
                            <a href="hospital_service?view=<?php echo $service->Service_id; ?>">
                                <div class="single-testimonial-slide">
                                    <div class="text-content">
                                        <span class="d-inline-block badge bg-warning mb-2"><i class="bi bi-check"></i> <?php echo $service->Service_name; ?></span>
                                        <h6 class="mb-2"><?php echo substr($service->Service_desc, 0, 50); ?>...</h6>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-3"></div>
    </div>
    <!-- Footer Nav-->
    <?php require_once('../partials/client_footer_nav.php'); ?>
    <!-- All JavaScript Files-->
    <?php require_once('../partials/scripts.php'); ?>
</body>


</html>