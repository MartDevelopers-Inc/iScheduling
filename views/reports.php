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
    <div class="header-area" id="headerArea">
        <div class="container">
            <!-- Header Content-->
            <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
                <!-- Back Button-->
                <div class="back-button"><a href="home"><svg width="32" height="32" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                        </svg></a></div>
                <!-- Page Title-->
                <div class="page-heading">
                    <h6 class="mb-0">Reports</h6>
                </div>
                <!-- Navbar Toggler-->
                <div class="navbar--toggler" id="affanNavbarToggler"><span class="d-block"></span><span class="d-block"></span><span class="d-block"></span></div>
            </div>
        </div>
    </div>
    <!-- Dark mode switching-->
    <div class="dark-mode-switching">
        <div class="d-flex w-100 h-100 align-items-center justify-content-center">
            <div class="dark-mode-text text-center"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.53 10.53a7 7 0 0 1-9.058-9.058A7.003 7.003 0 0 0 8 15a7.002 7.002 0 0 0 6.53-4.47z" />
                </svg>
                <p class="mb-0">Switching to dark mode</p>
            </div>
            <div class="light-mode-text text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
                    <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                </svg>
                <p class="mb-0">Switching to light mode</p>
            </div>
        </div>
    </div>
    <!-- Sidenav Black Overlay-->
    <div class="sidenav-black-overlay"></div>
    <!-- Side Nav Wrapper-->
    <?php require_once('../partials/side_nav.php'); ?>
    <div class="page-content-wrapper py-3">
        <!-- Pagination-->
        <div class="top-products-area">
            <div class="container">
                <div class="row g-3">
                    <?php
                    if ($_SESSION['login_rank'] == 'Administrator') {
                        echo
                        '
                        <div class="col-6 col-sm-4 col-lg-3">
                            <div class="card single-product-card">
                                <div class="card-body p-3">
                                    <a class="product-thumbnail d-block" href="report_staffs"><img src="../public/img/bg-img/Clinic_staffs.svg" alt="">
                                        <a class="product-title d-block text-truncate" href="report_staffs">Clinic Staffs</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3">
                            <div class="card single-product-card">
                                <div class="card-body p-3">
                                    <a class="product-thumbnail d-block" href="report_doctors"><img src="../public/img/bg-img/doctors.svg" alt="">
                                        <a class="product-title d-block text-truncate" href="report_doctors">Doctors</a>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                    ?>

                    <div class="col-6 col-sm-4 col-lg-3">
                        <div class="card single-product-card">
                            <div class="card-body p-3">
                                <a class="product-thumbnail d-block" href="report_clients"><img src="../public/img/bg-img/users.svg" alt="">
                                    <a class="product-title d-block text-truncate" href="report_clients">Clients</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-3">
                        <div class="card single-product-card">
                            <div class="card-body p-3">
                                <a class="product-thumbnail d-block" href="reports_bookings"><img src="../public/img/bg-img/bookings.svg" alt="">
                                    <a class="product-title d-block text-truncate" href="reports_bookings">Bookings</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-3">
                        <div class="card single-product-card">
                            <div class="card-body p-3">
                                <a class="product-thumbnail d-block" href="reports_accepted_bookings"><img src="../public/img/bg-img/appointments.svg" alt="">
                                    <a class="product-title d-block text-truncate" href="reports_accepted_bookings">Accepted Bookings</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-3">
                        <div class="card single-product-card">
                            <div class="card-body p-3">
                                <a class="product-thumbnail d-block" href="reports_hospital_services"><img src="../public/img/bg-img/insurance.svg" alt="">
                                    <a class="product-title d-block text-truncate" href="reports_hospital_services">Hospital Services</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-3">
                        <div class="card single-product-card">
                            <div class="card-body p-3">
                                <a class="product-thumbnail d-block" href="reports_hospitals"><img src="../public/img/bg-img/hospital.svg" alt="">
                                    <a class="product-title d-block text-truncate" href="reports_hospitals">Hospitals</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Nav-->
    <?php require_once('../partials/footer_nav.php'); ?>
    <!-- All JavaScript Files-->
    <?php require_once('../partials/scripts.php'); ?>
</body>

</html>