<?php
/*
 * Created on Sun Jul 04 2021
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
    <!-- Header Area-->
    <?php require_once('../partials/header.php'); ?>
    <!-- Sidenav Black Overlay-->
    <div class="sidenav-black-overlay"></div>
    <!-- Side Nav Wrapper-->
    <?php require_once('../partials/side_nav.php');
    $Login_id = $_SESSION['Login_id'];
    $ret = "SELECT *  FROM Clinic_Staff WHERE Staff_login_id = '$Login_id' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($user = $res->fetch_object()) {
    ?>

        <div class="page-content-wrapper py-3">
            <div class="container">
                <!-- User Information-->
                <div class="card user-info-card mb-3">
                    <div class="card-body d-flex align-items-center">
                        <div class="user-profile me-3"><img src="../public/img/bg-img/profile.svg" alt="">
                        </div>
                        <div class="user-info">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-1"><?php echo $user->Staff_full_name; ?></h5><span class="badge bg-warning ms-2 rounded-pill"><?php echo $_SESSION['Login_rank']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- User Meta Data-->
                <div class="card user-data-card">
                    <h5 class="text-center">User Profile Details</h5>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group mb-3">
                                <label class="form-label" for="fullname">Full Name</label>
                                <input class="form-control" type="text" value="<?php echo $staff->Staff_full_name; ?>" placeholder="Full Name">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="email">Email Address</label>
                                <input class="form-control" id="email" type="text" placeholder="Email Address" value="<?php echo $user->Staff_email; ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="job">ID Number</label>
                                <input class="form-control" type="text" value="<?php echo $user->Staff_id_no; ?>" name="Staff_id_no" placeholder="Job Title">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="job">Phone Number</label>
                                <input class="form-control" name="Staff_phone_no" type="text" value="<?php echo $user->Staff_phone_no; ?>" placeholder="Job Title">
                            </div>

                            <button class="btn btn-success w-100" name="UpdateProfile" type="submit">Update Now</button>
                        </form>
                    </div>
                </div>
                <?php
                $ret = "SELECT *  FROM Clinic_Staff WHERE Staff_login_id = '$Login_id' ";
                $stmt = $mysqli->prepare($ret);
                $stmt->execute(); //ok
                $res = $stmt->get_result();
                while ($user = $res->fetch_object()) {
                ?>
                    <div class="card user-data-card">
                        <h5 class="text-center"> Authentication Details</h5>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="Username">Login Username</label>
                                    <input class="form-control" id="Username" type="text" value="@designing-world" placeholder="Username">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="Username">Login Email</label>
                                    <input class="form-control" name="Login_email" type="email">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="fullname">Login Password</label>
                                    <input class="form-control" name="Login_password" type="password" name="<?php echo $user->Login_password; ?>">
                                </div>
                                <button class="btn btn-success w-100" name="UpdateAuth" type="submit">Update Login Details</button>
                            </form>
                        </div>
                    </div>
                <?php
                } ?>
            </div>
        </div>
        <!-- Footer Nav-->
        <!-- Footer Nav-->
    <?php
    }
    require_once('../partials/footer_nav.php'); ?>
    <!-- All JavaScript Files-->
    <?php require_once('../partials/scripts.php'); ?>
    <!-- All JavaScript Files-->
</body>


</html>