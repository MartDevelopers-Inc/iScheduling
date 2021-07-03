<?php
/*
 * Created on Fri Jun 11 2021
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
include('../config/config.php');
require_once('../config/codeGen.php');

if (isset($_POST['reset_password'])) {
    //prevent posting blank value for email
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
    } else {
        $error = 1;
        $err = "Enter Email Address";
    }
    $query = mysqli_query($mysqli, "SELECT * from `ezanaLMS_Admins` WHERE email='" . $email . "'");
    $num_rows = mysqli_num_rows($query);

    if ($num_rows > 0) {
        /* Mail User Plain Password */
        $mailed_password = $defaultPass;
        /* Hash Password  */
        $hashed_password = sha1(md5($mailed_password));
        $query = "UPDATE ezanaLMS_Admins SET  password =? WHERE  email =?";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('ss', $hashed_password, $email);
        $stmt->execute();
        /* Load Mailer */
        require_once('../config/password_reset_mailer.php');
        if ($stmt && $mail->send()) {
            $success = "Password Reset Instructions Sent To Your Mail";
        } else {
            $err = "Password Reset Failed!, Try again $mail->ErrorInfo";
        }
    } else {
        /* User Does Not Exist */
        $err = "Sorry, User Account With That Email Does Not Exist";
    }
}
/* Load Head Partial */
require_once('../partials/head.php');

/* Load System Settings On Admin Login Page */
$ret = "SELECT * FROM `ezanaLMS_Settings` ";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($system_settings = $res->fetch_object()) {
?>

    <body class="account-body accountbg">

        <!-- Log In page -->
        <div class="container">
            <div class="row vh-100 ">
                <div class="col-12 align-self-center">
                    <div class="auth-page">
                        <div class="card auth-card shadow-lg">
                            <div class="card-body">
                                <div class="px-3">
                                    <div class="auth-logo-box">
                                        <a href="" class="logo logo-admin"><img src="../public/images/<?php echo $system_settings->logo; ?>" height="90" alt="logo" class="auth-logo"></a>
                                    </div>
                                    <!--end auth-logo-box-->

                                    <div class="text-center auth-logo-text">
                                        <h4 class="mt-0 mb-3 mt-5"><?php echo $system_settings->sysname; ?> | Reset Password </h4>
                                        <p class="text-muted mb-0">Enter your Email and instructions will be sent to you!</p>
                                    </div>
                                    <!--end auth-logo-text-->
                                    <form class="form-horizontal auth-form my-4" method="POST">

                                        <div class="form-group">
                                            <label for="username">Email</label>
                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i data-feather="user" class="icon-xs"></i>
                                                </span>
                                                <input type="text" name="email" class="form-control" required id="username">
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 row">
                                            <div class="col-12 mt-2">
                                                <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" name="reset_password" type="submit">
                                                    Reset
                                                    <i class="fas fa-user-lock ml-1"></i>
                                                </button>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end form-group-->
                                    </form>
                                    <!--end form-->
                                </div>
                                <!--end /div-->

                                <div class="m-3 text-center text-muted">
                                    <p class="">Remembered password ? <a href="admn_login" class="text-primary ml-2">Sign In</a></p>
                                </div>

                            </div>
                            <!--end card-body-->
                        </div>

                    </div>
                    <!--end auth-page-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
        <!-- Scripts -->
        <?php require_once('../partials/scripts.php'); ?>

    </body>
<?php
} ?>

</html>