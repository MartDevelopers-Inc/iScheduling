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
/* Update Profile */
if (isset($_POST['UpdateProfile'])) {

    $staff_full_name = $_POST['staff_full_name'];
    $staff_id_no = $_POST['staff_id_no'];
    $staff_phone_no = $_POST['staff_phone_no'];
    $staff_email  = $_POST['staff_email'];
    $staff_login_id = $_SESSION['login_id'];

    $query = "UPDATE Clinic_Staff SET staff_full_name =?, staff_id_no =?, staff_phone_no=?, staff_email =? WHERE staff_login_id = ? ";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sssss', $staff_full_name, $staff_id_no, $staff_phone_no, $staff_email, $staff_login_id);
    $stmt->execute();
    if ($stmt) {
        $success = "$staff_full_name Profile Updated";
    } else {
        $info = "Please Try Again Or Try Later";
    }
}

/* Update Login Details */
if (isset($_POST['UpdateAuth'])) {

    $login_user_name = $_POST['login_user_name'];
    $login_email = $_POST['login_email'];
    $login_password = sha1(md5($_POST['login_password']));
    $login_id = $_POST['login_id'];

    $query = "UPDATE Login SET login_user_name =?, login_email =?, login_password=? WHERE login_id = ? ";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssss', $login_user_name, $login_email, $login_password, $login_id);
    $stmt->execute();
    if ($stmt) {
        $success = "$login_user_name Login  Details Updated";
    } else {
        $info = "Please Try Again Or Try Later";
    }
}

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
    <?php require_once('../partials/staff_side_nav.php');
    $login_id = $_SESSION['login_id'];
    $ret = "SELECT *  FROM Clinic_Staff WHERE staff_login_id = '$login_id' ";
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
                                <h5 class="mb-1"><?php echo $user->staff_full_name; ?> Profile</h5></span>
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
                                <input class="form-control" required name="staff_full_name" type="text" value="<?php echo $user->staff_full_name; ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="email">Email Address</label>
                                <input class="form-control" required name="staff_email" type="email" value="<?php echo $user->staff_email; ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="job">ID Number</label>
                                <input class="form-control" required type="text" value="<?php echo $user->staff_id_no; ?>" name="staff_id_no">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="job">Phone Number</label>
                                <input class="form-control" required name="staff_phone_no" type="text" value="<?php echo $user->staff_phone_no; ?>">
                            </div>

                            <button class="btn btn-success w-100" name="UpdateProfile" type="submit">Update Now</button>
                        </form>
                    </div>
                </div>
                <br>
                <?php
                $ret = "SELECT *  FROM Login WHERE Login_id = '$user->staff_login_id' ";
                $stmt = $mysqli->prepare($ret);
                $stmt->execute(); //ok
                $res = $stmt->get_result();
                while ($login = $res->fetch_object()) {
                ?>
                    <div class="card user-data-card">
                        <h5 class="text-center">Staff Authentication Details</h5>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="Username">Login Username</label>
                                    <input class="form-control" required value="<?php echo $login->login_user_name; ?>" name="login_user_name">
                                    <input class="form-control" required value="<?php echo $user->staff_login_id; ?>" type="hidden" name="login_id">

                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="Username">Login Email</label>
                                    <input class="form-control" required name="login_email" value="<?php echo $login->login_email; ?>" type="email">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="fullname">Login Password</label>
                                    <input class="form-control" required name="login_password" type="password">
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
    require_once('../partials/staff_footer_nav.php'); ?>
    <!-- All JavaScript Files-->
    <?php require_once('../partials/scripts.php'); ?>
    <!-- All JavaScript Files-->
</body>


</html>