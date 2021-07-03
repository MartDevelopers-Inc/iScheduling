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

if (isset($_POST['Login'])) {
    $Login_email = $_POST['Login_email'];
    $Login_rank = $_POST['Login_rank'];
    $Login_password = sha1(md5($_POST['Login_password']));

    $stmt = $mysqli->prepare("SELECT Login_email, Login_password, Login_rank, Login_id  FROM Login  WHERE Login_email =? AND Login_password =? AND Login_rank = ?");
    $stmt->bind_param('sss', $Login_email, $Login_password, $Login_rank);
    $stmt->execute(); //execute bind

    $stmt->bind_result($Login_email, $Login_password, $Login_rank, $Login_id);
    $rs = $stmt->fetch();
    $_SESSION['Login_id'] = $Login_id;
    $_SESSION['Login_rank'] = $Login_rank;

    /* Decide Login User Dashboard Based On User Rank */
    if ($rs && $Login_rank == 'Administrator') {
        header("location:dashboard");
    } else if ($rs && $Login_rank == 'Staff') {
        header("location:dashboard");
    } else if ($rs && $Login_rank == 'Client') {
        header("location:client_dashboard");
    } else {
        $err = "Login Failed, Please Check Your Credentials And Login Permission ";
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
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
                    <div class="text-center px-4"><img class="login-intro-img" src="../public/img/bg-img/36.png" alt=""></div>
                    <!-- Register Form-->
                    <div class="register-form mt-4 px-4">
                        <h6 class="mb-3 text-center">Log In To Continue To iScheduling.</h6>
                        <form method="POST">
                            <div class="form-group">
                                <input class="form-control" required name="Login_email" type="email" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="Login_password" placeholder="Enter Password">
                                <input class="form-control" type="hidden" name="Login_rank" value="Administrator">
                            </div>
                            <button class="btn btn-primary w-100" name="Login" type="submit">Sign In</button>
                        </form>
                    </div>
                    <!-- Login Meta-->
                    <div class="login-meta-data text-center"><a class="stretched-link forgot-password d-block mt-3 mb-1" href="forget_password">Forgot Password?</a>
                        <!-- <p class="mb-0">Didn't have an account? <a class="stretched-link" href="page-register.html">Register Now</a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- All JavaScript Files-->
    <?php require_once('../partials/scripts.php'); ?>
</body>


</html>