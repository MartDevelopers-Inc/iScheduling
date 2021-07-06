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
/* Update Profile */
if (isset($_POST['UpdateProfile'])) {

    $Doctor_full_name = $_POST['Doctor_full_name'];
    $Doctor_specialization = $_POST['Doctor_specialization'];
    $Doctor_phone_no = $_POST['Doctor_phone_no'];
    $Doctor_email  = $_POST['Doctor_email'];
    $Doctor_id = $_SESSION['Login_id'];

    $query = "UPDATE Doctors SET Doctor_full_name =?, Doctor_specialization =?, Doctor_phone_no=?, Doctor_email =? WHERE Doctor_login_id = ? ";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sssss', $Doctor_full_name, $Doctor_specialization, $Doctor_phone_no, $Doctor_email, $Doctor_id);
    $stmt->execute();
    if ($stmt) {
        $success = "$Doctor_full_name Profile Updated";
    } else {
        $info = "Please Try Again Or Try Later";
    }
}
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
    $view = $_SESSION['Login_id'];
    $ret = "SELECT *  FROM Doctors WHERE Doctor_login_id = '$view' ";
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
                                <h5 class="mb-1"><?php echo $user->Doctor_full_name; ?> Profile</h5></span>
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
                                <input class="form-control" required name="Doctor_full_name" type="text" value="<?php echo $user->Doctor_full_name; ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="email">Email Address</label>
                                <input class="form-control" required name="Doctor_email" type="email" value="<?php echo $user->Doctor_email; ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="job">Phone Number</label>
                                <input class="form-control" required name="Doctor_phone_no" type="text" value="<?php echo $user->Doctor_phone_no; ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="job">Doctor Specialization</label>
                                <textarea rows="5" class="form-control" required name="Doctor_specialization" type="text" value=""><?php echo $user->Doctor_specialization; ?></textarea>
                            </div>

                            <button class="btn btn-success w-100" name="UpdateProfile" type="submit">Update Now</button>
                        </form>
                    </div>
                </div>
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