<?php
/*
 * Created on Sat Jul 03 2021
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
require_once('../partials/analytics.php');
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
    <?php require_once('../partials/side_nav.php'); ?>

    <div class="page-content-wrapper">
        <!-- Hero Slides-->
        <div class="owl-carousel-one owl-carousel">
            <div class="single-hero-slide bg-overlay" style="background-image: url('img/bg-img/31.jpg')">
                <div class="slide-content h-100 d-flex align-items-center text-center">
                    <div class="container">
                        <h4 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="500ms">Clinic Staffs</h4>
                        <a class="btn btn-creative btn-warning" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="500ms"><?php echo $staff; ?></a>
                    </div>
                </div>
            </div>
            <div class="single-hero-slide bg-overlay" style="background-image: url('img/bg-img/32.jpg')">
                <div class="slide-content h-100 d-flex align-items-center text-center">
                    <div class="container">
                        <h4 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Qualified Doctors</h4>
                        <a class="btn btn-creative btn-warning" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="500ms"><?php echo $doc; ?></a>
                    </div>
                </div>
            </div>
            <div class="single-hero-slide bg-overlay" style="background-image: url('img/bg-img/33.jpg')">
                <div class="slide-content h-100 d-flex align-items-center text-center">
                    <div class="container">
                        <h4 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Registered Clients</h4>
                        <a class="btn btn-creative btn-warning" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="500ms"><?php echo $client; ?></a>
                    </div>
                </div>
            </div>
            <div class="single-hero-slide bg-overlay" style="background-image: url('img/bg-img/1.jpg')">
                <div class="slide-content h-100 d-flex align-items-center text-center">
                    <div class="container">
                        <h4 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Hospital Services</h4>
                        <a class="btn btn-creative btn-warning" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="500ms"><?php echo $Hospital_Services; ?></a>
                    </div>
                </div>
            </div>
            <div class="single-hero-slide bg-overlay" style="background-image: url('img/bg-img/1.jpg')">
                <div class="slide-content h-100 d-flex align-items-center text-center">
                    <div class="container">
                        <h4 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Client Bookings</h4>
                        <a class="btn btn-creative btn-warning" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="500ms"><?php echo $Bookings; ?></a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h2>Recent Clients Bookings</h2>
                    <div class="testimonial-slide owl-carousel testimonial-style3">
                        <!-- Single Testimonial Slide-->
                        <div class="single-testimonial-slide">
                            <div class="text-content">
                                <span class="d-inline-block badge bg-warning mb-2"><i class="bi bi-star-fill"></i></span>
                                <h6 class="mb-2">The code looks clean, and the designs are excellent. I recommend.</h6><span class="d-block">Mrrickez, Themeforest</span>
                            </div>
                        </div>

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
                        <!-- Single Testimonial Slide-->
                        <div class="single-testimonial-slide">
                            <div class="text-content">
                                <span class="d-inline-block badge bg-warning mb-2"><i class="bi bi-star-fill"></i></span>
                                <h6 class="mb-2">The code looks clean, and the designs are excellent. I recommend.</h6><span class="d-block">Mrrickez, Themeforest</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h2>My Clinic Staffs</h2>
                    <div class="testimonial-slide owl-carousel testimonial-style3">
                        <!-- Single Testimonial Slide-->
                        <?php
                        $ret = "SELECT * FROM `Clinic_Staff`  ORDER BY `Clinic_Staff`.`Staff_full_name` ASC   ";
                        $stmt = $mysqli->prepare($ret);
                        $stmt->execute(); //ok
                        $res = $stmt->get_result();
                        while ($staff = $res->fetch_object()) {
                        ?>
                            <a href="staff?view=<?php echo $staff->Staff_id; ?>">
                                <div class="single-testimonial-slide">
                                    <div class="text-content">
                                        <div class="col-12">
                                            <div class="card team-member-card shadow">
                                                <div class="card-body">
                                                    <!-- Member Image-->
                                                    <div class="team-member-img shadow-sm"><img src="../public/img/bg-img/profile.svg" alt=""></div>
                                                    <!-- Team Info-->
                                                    <div class="team-info">
                                                        <h6 class="mb-0"><?php echo $staff->Staff_full_name; ?></h6>
                                                        <p class="mb-0">Contacts: <?php echo $staff->Staff_phone_no; ?></p>
                                                        <p class="mb-0">ID No: <?php echo $staff->Staff_id_no; ?></p>
                                                    </div>
                                                </div>
                                                <!-- Contact Info-->
                                                <div class="contact-info bg-info">
                                                    <p class="mb-0 text-truncate"><?php echo $staff->Staff_email; ?></p>
                                                </div>
                                            </div>
                                        </div>
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
    <?php require_once('../partials/footer_nav.php'); ?>
    <!-- All JavaScript Files-->
    <?php require_once('../partials/scripts.php'); ?>
</body>


</html>