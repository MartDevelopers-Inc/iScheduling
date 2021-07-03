<?php
/*
 * Created on Sat Jun 12 2021
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

/* Update Profile  Picture*/
if (isset($_POST['update_picture'])) {
    $id = $_SESSION['id'];
    /* Timestamp Every File Upload */
    $time = date("d-M-Y") . "-" . time();
    $profile_pic = $time . $_FILES['profile_pic']['name'];
    $upload_directory = "../public/uploads/user_data/admins/" . $profile_pic;
    $temp_name = $_FILES["profile_pic"]["tmp_name"];
    /* Move Uploaded File */
    move_uploaded_file($temp_name, $upload_directory);

    $query = "UPDATE ezanaLMS_Admins  SET  profile_pic =? WHERE id =?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ss', $profile_pic, $id);
    $stmt->execute();
    if ($stmt) {
        $success = "Profile Picture Updated";
    } else {
        $info = "Please Try Again Or Try Later";
    }
}

/* Update Profile Details */
if (isset($_POST['update_profile'])) {
    //Error Handling and prevention of posting double entries
    $error = 0;
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $id = mysqli_real_escape_string($mysqli, trim($_SESSION['id']));
    } else {
        $error = 1;
        $err = "ID Cannot Be Empty";
    }
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = mysqli_real_escape_string($mysqli, trim($_POST['name']));
    } else {
        $error = 1;
        $err = "Name Cannot Be Empty";
    }
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
    } else {
        $error = 1;
        $err = "Email Cannot Be Empty";
    }

    if (isset($_POST['rank']) && !empty($_POST['rank'])) {
        $rank = mysqli_real_escape_string($mysqli, trim($_POST['rank']));
    } else {
        $error = 1;
        $err = "Rank Cannot Be Empty";
    }
    if (isset($_POST['phone']) && !empty($_POST['phone'])) {
        $phone = mysqli_real_escape_string($mysqli, trim($_POST['phone']));
    } else {
        $error = 1;
        $err = "Phone Cannot Be Empty";
    }

    if (isset($_POST['adr']) && !empty($_POST['adr'])) {
        $adr = mysqli_real_escape_string($mysqli, trim($_POST['adr']));
    } else {
        $error = 1;
        $err = "Address Cannot Be Empty";
    }

    if (!$error) {

        $gender = $_POST['gender'];
        $employee_id = $_POST['employee_id'];
        $date_employed = $_POST['date_employed'];
        $school  = $_POST['school'];

        $query = "UPDATE ezanaLMS_Admins SET name =?, email =?,  rank =?, phone =?, adr =?, gender = ?, employee_id =?, date_employed =?, school =? WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('ssssssssss', $name, $email, $rank, $phone, $adr, $gender, $employee_id, $date_employed, $school, $id);
        $stmt->execute();
        if ($stmt) {
            $success = "Profile Updated";
        } else {
            $info = "Please Try Again Or Try Later";
        }
    }
}

/* Change Password */
if (isset($_POST['change_password'])) {
    $error = 0;
    if (isset($_POST['old_password']) && !empty($_POST['old_password'])) {
        $old_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['old_password']))));
    } else {
        $error = 1;
        $err = "Old Password Cannot Be Empty";
    }
    if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
        $new_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['new_password']))));
    } else {
        $error = 1;
        $err = "New Password Cannot Be Empty";
    }
    if (isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])) {
        $confirm_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['confirm_password']))));
    } else {
        $error = 1;
        $err = "Confirmation Password Cannot Be Empty";
    }

    if (!$error) {
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM  ezanaLMS_Admins  WHERE id = '$id'";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($old_password != $row['password']) {
                $err =  "Please Enter Correct Old Password";
            } elseif ($new_password != $confirm_password) {
                $err = "Confirmation Password Does Not Match";
            } else {
                $id = $_SESSION['id'];
                $new_password  = sha1(md5($_POST['new_password']));
                $query = "UPDATE ezanaLMS_Admins SET  password =? WHERE id =?";
                $stmt = $mysqli->prepare($query);
                $rc = $stmt->bind_param('ss', $new_password, $id);
                $stmt->execute();
                if ($stmt) {
                    $success = "Password Changed";
                } else {
                    $err = "Please Try Again Or Try Later";
                }
            }
        }
    }
}
require_once('../partials/head.php');
?>

<body>
    <!-- leftbar-tab-menu -->
    <?php require_once('../partials/sidebar.php'); ?>
    <!-- end leftbar-tab-menu-->

    <!-- Top Bar Start -->
    <?php require_once('../partials/topbar.php');
    /* Load Logged In User Session */
    $id  = $_SESSION['id'];
    $ret = "SELECT * FROM `ezanaLMS_Admins` WHERE id ='$id' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($logged_in_user = $res->fetch_object()) {
        /* Has Profile Picture */
        if ($logged_in_user->profile_pic == '') {
            $url = "../public/images/no-profile.png";
        } else {
            $url = "../public/uploads/user_data/admins/$logged_in_user->profile_pic";
        }
    ?>
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
                                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Profile</a></li>
                                        <li class="breadcrumb-item active"><?php echo $logged_in_user->name; ?></li>
                                    </ol>
                                </div>
                                <h4 class="page-title"><?php echo $logged_in_user->name; ?> Profile</h4>
                            </div>
                            <!--end page-title-box-->
                        </div>
                        <!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body  met-pro-bg">
                                    <div class="met-profile">
                                        <div class="row">
                                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                                <div class="met-profile-main">
                                                    <div class="met-profile-main-pic">
                                                        <img src="<?php echo $url; ?>" height="120" width="120" alt="" class="rounded-circle">
                                                        <a href="#edit-profile-pic" data-toggle="modal" class="fro-profile_main-pic-change">
                                                            <i class="fas fa-camera"></i>
                                                        </a>
                                                    </div>
                                                    <!-- Update Profile Pic Modal -->
                                                    <div class="modal fade" id="edit-profile-pic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title " id="exampleModalLabel">Upload Profile Picture</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method='post' enctype="multipart/form-data" class="form-horizontal">
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-10">
                                                                                <div class="input-group">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" name="profile_pic" class="custom-file-input" id="exampleInputFile">
                                                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group text-right row">
                                                                            <div class="offset-sm-2 col-sm-10">
                                                                                <button type="submit" name="update_picture" class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal -->
                                                    <div class="met-profile_user-detail">
                                                        <h5 class="met-user-name"><?php echo $logged_in_user->name; ?></h5>
                                                        <p class="mb-0 met-user-name-post"><?php echo $logged_in_user->rank; ?></p>
                                                        <p class="mb-0 met-user-name-post"><?php echo $logged_in_user->school; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4 ml-auto">
                                                <ul class="list-unstyled personal-detail">
                                                    <li class="mt-2"><i class="dripicons-tags text-info font-18 mt-2 mr-2"></i> <b>Employee ID</b> : <?php echo $logged_in_user->employee_id; ?></li>
                                                    <li class="mt-2"><i class="dripicons-calendar text-info font-18 mt-2 mr-2"></i> <b>Date Employed</b> : <?php echo date('d M Y', strtotime($logged_in_user->date_employed)); ?></li>
                                                    <li class="mt-2"><i class="dripicons-user text-info font-18 mt-2 mr-2"></i> <b>Gender</b> : <?php echo $logged_in_user->gender; ?></li>
                                                    <li class="mt-2"><i class="dripicons-phone mr-2 text-info font-18"></i> <b> Phone </b> : <?php echo $logged_in_user->phone; ?></li>
                                                    <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : <?php echo $logged_in_user->email; ?></li>
                                                    <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i> <b>Address</b> : <?php echo $logged_in_user->adr; ?></li>
                                                </ul>

                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end f_profile-->
                                </div>
                                <!--end card-body-->
                                <div class="card-body">
                                    <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                                        
                                        <li class="nav-item">
                                            <a class="nav-link active" id="settings_detail_tab" data-toggle="pill" href="#settings_detail">Profile Settings</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="settings_detail_tab" data-toggle="pill" href="#change_password">Change Password</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content detail-list" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="settings_detail">
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-12 mx-auto">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form method="post" enctype="multipart/form-data" role="form">
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label for="">Name</label>
                                                                <input type="text" required value="<?php echo $logged_in_user->name; ?>" name="name" class="form-control" id="exampleInputEmail1">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="">Work Email</label>
                                                                <input type="text" value="<?php echo $logged_in_user->email; ?>" required name="email" class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="">Phone Number</label>
                                                                <input type="text" value="<?php echo $logged_in_user->phone; ?>" required name="phone" class="form-control">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="">School / Faculty</label>
                                                                <input type="text" value="<?php echo $logged_in_user->school; ?>" required name="school" class="form-control">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="">Rank</label>
                                                                <select class="form-control basic" style="width: 100%" name="rank">
                                                                    <option><?php echo $logged_in_user->rank; ?></option>
                                                                    <option>System Administrator</option>
                                                                    <option>Education Administrator</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="">Gender</label>
                                                                <select class="form-control basic" style="width: 100%" name="gender">
                                                                    <option><?php echo $logged_in_user->gender; ?></option>
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="">Employee ID</label>
                                                                <input type="text" value="<?php echo $logged_in_user->employee_id; ?>" required name="employee_id" class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="">Date Employed</label>
                                                                <input type="date" placeholder="DD-MM-YYYY" value="<?php echo $logged_in_user->date_employed; ?>" required name="date_employed" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputPassword1">Address</label>
                                                                <textarea required name="adr" rows="2" class="form-control Summernote"><?php echo $logged_in_user->adr; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="text-right">
                                                            <button type="submit" name="update_profile" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>

                                <div class="tab-pane fade" id="change_password">
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-12 mx-auto">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form method='post' class="form-horizontal">
                                                        <div class="form-group row">
                                                            <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                                                            <div class="col-sm-10">
                                                                <input type="password" name="old_password" required class="form-control" id="inputName">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                                                            <div class="col-sm-10">
                                                                <input type="password" name="new_password" required class="form-control" id="inputEmail">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputName2" class="col-sm-2 col-form-label">Confirm New Password</label>
                                                            <div class="col-sm-10">
                                                                <input type="password" name="confirm_password" required class="form-control" id="inputName2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row text-right">
                                                            <div class="offset-sm-2 col-sm-10">
                                                                <button type="submit" name="change_password" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                            <!--end tab-content-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div><!-- container -->

                <?php require_once('../partials/footer.php'); ?>
                <!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        <!-- Scripts -->
    <?php
    }
    require_once('../partials/scripts.php'); ?>
</body>

</html>