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

if (isset($_POST['login'])) {
    /* Secure Login */
    $error = 0;
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
    } else {
        $error = 1;
        $err = "Email Cannot  Be Empty";
    }
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['password']))));
    } else {
        $error = 1;
        $err = "Password Cannot  Be Empty";
    }
    if (!$error) {
        $ret = mysqli_query($mysqli, "SELECT * FROM ezanaLMS_Admins WHERE email='$email'  AND password='$password' AND rank = 'System Administrator' ");
        $num = mysqli_fetch_array($ret);
        if ($num > 0) {
            /* Load Sessions */
            $_SESSION['id'] = $num['id'];
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;

            /* Load Login Logs */
            $uip = $_SERVER['REMOTE_ADDR'];
            $User_Rank = 'Administrator';
            $loginTime = date('Y-m-d');

            /* Persist Auth Logs */
            mysqli_query($mysqli, "INSERT INTO ezanaLMS_UserLog(user_id, name, ip, User_Rank, loginTime) values('" . $_SESSION['id'] . "','" . $_SESSION['email'] . "','$uip', '$User_Rank', '$loginTime')");
            $extra = "dashboard";
            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            header("location:http://$host$uri/$extra");
            exit();
        } else {
            $err = "Invalid credentials. Please try again.";
        }
    }
}

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
                                        <h4 class="mt-0 mb-3 mt-5"><?php echo $system_settings->sysname;?> | Admininistrator Panel </h4>
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
                                        <!--end form-group-->

                                        <div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i data-feather="key" class="icon-xs"></i>
                                                </span>
                                                <input type="password" name="password" required class="form-control" id="userpassword">
                                            </div>
                                        </div>
                                        <!--end form-group-->

                                        <div class="form-group row mt-4">
                                            <!-- Disable This For Now 
                                                <div class="col-sm-6">
                                                <div class="custom-control custom-switch switch-success">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitchSuccess">
                                                    <label class="custom-control-label text-muted" for="customSwitchSuccess">Remember me</label>
                                                </div>
                                            </div> -->
                                            <!--end col-->
                                            <div class="col-sm-6 text-right">
                                                <a href="admn_forgot_password" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end form-group-->

                                        <div class="form-group mb-0 row">
                                            <div class="col-12 mt-2">
                                                <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" name="login" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end form-group-->
                                    </form>
                                    <!--end form-->
                                </div>
                                <!--end /div-->

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