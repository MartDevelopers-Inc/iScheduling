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
require_once('../config/config.php');
require_once('../config/checklogin.php');
check_login();
require_once('../config/codeGen.php');
require_once('../partials/analytics.php');
require_once('../partials/head.php');
?>

<body>
    <!-- leftbar-tab-menu -->
    <?php require_once('../partials/sidebar.php'); ?>
    <!-- end leftbar-tab-menu-->

    <!-- Top Bar Start -->
    <?php require_once('../partials/topbar.php'); ?>
    <!-- Top Bar End -->

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="float-right">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item active">Admin Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Administrator Dashboard</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <div class="icon-info">
                                            <i class="fas fa-university align-self-center icon-lg icon-dual-warning"></i>
                                        </div>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <p class="mb-1 text-muted">Faculties</p>
                                            <h3 class="mt-0 mb-1 font-weight-semibold"><?php echo $faculties; ?></h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <div class="icon-info">
                                            <i class="fas fa-building align-self-center icon-lg icon-dual-purple"></i>
                                        </div>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <p class="mb-1 text-muted">Departments</p>
                                            <h3 class="mt-0 mb-1 font-weight-semibold"><?php echo $departments; ?></h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <div class="icon-info">
                                            <i class=" fas fa-chalkboard-teacher align-self-center icon-lg icon-dual-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <p class="mb-0 text-muted">Courses</p>
                                            <h3 class="mt-0 mb-1 font-weight-semibold d-inline-block"><?php echo $courses; ?></h3>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 col-4 align-self-center">
                                        <div class="icon-info">
                                            <i class="fas fa-chalkboard align-self-center icon-lg icon-dual-pink"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <p class="mb-1 text-muted">Modules</p>
                                            <h3 class="mt-0 mb-1 font-weight-semibold"><?php echo $modules; ?></h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 col-4 align-self-center">
                                        <div class="icon-info">
                                            <i class="fas fa-calendar align-self-center icon-lg icon-dual-warning"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <p class="mb-1 text-muted">Important Dates</p>
                                            <h3 class="mt-0 mb-1 font-weight-semibold"></h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 col-4 align-self-center">
                                        <div class="icon-info">
                                            <i class="fas fa-user-secret align-self-center icon-lg icon-dual-purple"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <p class="mb-1 text-muted">Administrators</p>
                                            <h3 class="mt-0 mb-1 font-weight-semibold"><?php echo $admins; ?></h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 col-4 align-self-center">
                                        <div class="icon-info">
                                            <i class="fas fa-user-tie align-self-center icon-lg icon-dual-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <p class="mb-1 text-muted">Lecturers</p>
                                            <h3 class="mt-0 mb-1 font-weight-semibold"><?php echo $lecs; ?></h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->

                    </div>
                    <!--end col-->

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 col-4 align-self-center">
                                        <div class="icon-info">
                                            <i class="fas fa-user-graduate align-self-center icon-lg icon-dual-pink"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <p class="mb-1 text-muted">Students</p>
                                            <h3 class="mt-0 mb-1 font-weight-semibold"><?php echo $students; ?></h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->

                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0">Users Login Activity</h4>
                                <div class="">
                                    <div id="liveVisits" class="apex-charts"></div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body dash-info-carousel">
                                <h4 class="mt-0 header-title mb-4">System And Database Server Status</h4>
                                <div class="bg-light p-3 d-flex justify-content-between">
                                    <?php
                                    $server_info = mysqli_get_server_info($mysqli);
                                    $array = explode("  ", mysqli_stat($mysqli));
                                    ?>
                                    <div>
                                        <p class="text-muted mb-0">Server Version</p>
                                        <h5 class="mb-1 font-weight-semibold"><?php echo $server_info; ?></h5>
                                    </div>
                                </div>
                                <div class="media mt-3">
                                    <div class="media-body align-self-center">
                                        <?php
                                        foreach ($array as $value) {
                                            echo "<p class='text-muted mb-0'> <i class='fas fa-check'></i> Server " . $value . "<br /></p>";
                                        }; ?>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <hr class="hr-dashed">
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->

                </div>
                <!--end row-->


                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Recent Users Requests</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>User Request</th>
                                                <th>Created At</th>
                                                <th>Progress</th>
                                                <th>Action</th>
                                            </tr>
                                            <!--end tr-->
                                        </thead>

                                        <tbody>
                                            <?php
                                            /* Load User Requests */
                                            $ret = "SELECT * FROM `ezanaLMS_UserRequests` ORDER BY `created_at` ASC   ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($req = $res->fetch_object()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $req->request; ?></td>
                                                    <td><span class="badge badge-md badge-soft-purple"><?php echo date('d M Y - g:ia', strtotime($req->created_at)); ?></span></td>
                                                    <td>
                                                        <small class="float-right text-muted ml-3 font-13"><?php echo $req->progress; ?>%</small>
                                                        <div class="progress mt-2" style="height:3px;">
                                                            <div class="progress-bar bg-pink" role="progressbar" style="width: <?php echo $req->progress; ?>%; border-radius:5px;" aria-valuenow="<?php echo $req->progress; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="mr-2"><i class="fas fa-eye text-info font-16"></i></a>
                                                        <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">System Bugs / Halts Reports</h4>
                                <div class="slimscroll crm-dash-activity">
                                    <div class="activity">
                                        <?php
                                        /* Load Crashlytics */
                                        $ret = "SELECT * FROM `ezanaLMS_BugReports` WHERE status  = 'Pending Fix'   ORDER BY `date_reported` DESC  ";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        while ($bugs = $res->fetch_object()) {
                                        ?>
                                            <a href="">
                                                <div class="activity-info">

                                                    <div class="icon-info-activity">
                                                        <i class="mdi mdi-checkbox-marked-circle-outline bg-soft-danger"></i>
                                                    </div>
                                                    <div class="activity-info-text">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <h6 class="m-0 w-75"><?php echo $bugs->bug_title; ?></h6>
                                                            <small class="text-muted d-block"><?php echo date('d M Y - g:ia', strtotime($bugs->date_reported)); ?></small>
                                                        </div>
                                                        <p class="text-muted mt-3">
                                                            <?php echo $bugs->bug_details; ?>
                                                        </p>
                                                    </div>

                                                </div>
                                            </a>
                                            <hr class="hr-dashed">
                                        <?php
                                        } ?>
                                    </div>
                                    <!--end activity-->
                                </div>
                                <!--end crm-dash-activity-->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

            </div><!-- container -->
            <!-- Footer -->
            <?php require_once('../partials/footer.php'); ?>
            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->
    <!-- Scripts -->
    <?php require_once('../partials/scripts.php'); ?>

</body>


</html>