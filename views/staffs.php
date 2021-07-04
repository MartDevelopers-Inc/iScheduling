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

/* Delete Staff */
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $login = $_GET['login'];
    $adn = "DELETE FROM Clinic_Staff WHERE Staff_id=?";
    $delete_auth = "DELETE FROM Login WHERE Login_id = ?";
    $stmt = $mysqli->prepare($adn);
    $auth_stmt = $mysqli->prepare($delete_auth);
    $stmt->bind_param('s', $delete);
    $auth_stmt->bind_param('s', $login);
    $stmt->execute();
    $auth_stmt->execute();
    $stmt->close();
    $auth_stmt->close();
    if ($stmt && $auth_stmt) {
        $success = "Deleted" && header("refresh:1; url=staffs");
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

    <!-- Header Area-->
    <div class="header-area" id="headerArea">
        <div class="container">
            <!-- Header Content-->
            <div class="header-content position-relative d-flex align-items-center justify-content-between">
                <!-- Back Button-->
                <div class="back-button">
                    <a href="home">
                        <svg width="32" height="32" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                        </svg>
                    </a>
                </div>
                <!-- Page Title-->
                <div class="page-heading">
                    <h6 class="mb-0">Staffs</h6>
                </div>
                <!-- Settings-->
                <div class="setting-wrapper">
                </div>
            </div>
        </div>
    </div>

    <!-- Add Staff Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="staticBackdropLabel">Add Staff</h6>
                    <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group mb-3">
                            <label class="form-label" for="fullname">Full Name</label>
                            <input class="form-control" required name="Staff_full_name" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="email">Email Address</label>
                            <input class="form-control" required name="Staff_email" type="email">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="job">ID Number</label>
                            <input class="form-control" required type="text" name="Staff_id_no">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="job">Phone Number</label>
                            <input class="form-control" required name="Staff_phone_no" type="text">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="Username">Login Username</label>
                            <input class="form-control" required name="Login_user_name">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="Username">Login Email</label>
                            <input class="form-control" required name="Login_email" type="email">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="fullname">Login Password</label>
                            <input class="form-control" required name="Login_password" type="password">
                        </div>
                        <button class="btn btn-success w-100" name="AddStaff" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <div class="page-content-wrapper py-3">
        <div class="container">
            <div class="text-center">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Staff</button>
            </div>
            <br>
            <div class="card">
                <div class="card-body p-3">
                    <table class="data-table w-100" id="dataTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>ID No</th>
                                <th>Phone No</th>
                                <th>Email</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ret = "SELECT * FROM `Clinic_Staff`";
                            $stmt = $mysqli->prepare($ret);
                            $stmt->execute(); //ok
                            $res = $stmt->get_result();
                            while ($staff = $res->fetch_object()) {
                            ?>
                                <tr>
                                    <td><?php echo $staff->Staff_full_name; ?></td>
                                    <td><?php echo $staff->Staff_id_no; ?></td>
                                    <td><?php echo $staff->Staff_phone_no; ?></td>
                                    <td><?php echo $staff->Staff_email; ?></td>
                                    <td>
                                        <a href="staff?view=<?php echo $staff->Staff_id; ?>" class="badge rounded-pill bg-warning">Update</a>
                                        <br>
                                        <a href="staffs?delete=<?php echo $staff->Staff_id; ?>&login=<?php echo $staff->Staff_login_id; ?>" class="badge rounded-pill bg-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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