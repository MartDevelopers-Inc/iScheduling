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


/*Load System Settings On Header  */
$ret = "SELECT * FROM `ezanaLMS_Settings` ";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($system_settings = $res->fetch_object()) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title><?php echo $system_settings->sysname; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="" name="MartDevelopers Inc" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- SEO META TAGS -->
        <meta name="title" content="Ezana LMS">
        <meta name="description" content="Ezana Learning Management System">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://ezana.org">
        <meta property="og:title" content="<?php echo $system_settings->sysname; ?>">
        <meta property="og:description" content="Ezana Learning Management System">
        <meta property="og:image" content="../public/images/<?php echo $system_settings->logo; ?>">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://ezana.org">
        <meta property="twitter:title" content="<?php echo $system_settings->sysname; ?>">
        <meta property="twitter:description" content="Ezana Learning Management System">
        <meta property="twitter:image" content="../public/images/<?php echo $system_settings->logo; ?>">

        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="180x180" href="../public/images/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../public/images/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../public/images/favicons/favicon-16x16.png">
        <link rel="manifest" href="../public/images/favicons/site.webmanifest">

        <!-- Bootstrap Css -->
        <link href="../public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- JQuerry Css -->
        <link href="../public/css/jquery-ui.min.css" rel="stylesheet">
        <!-- Icons Css -->
        <link href="../public/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- Mentis Menu Css -->
        <link href="../public/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css -->
        <link href="../public/css/app.min.css" rel="stylesheet" type="text/css" />
        <!-- Izi Toast Css -->
        <link href="../public/css/iziToast.min.css" rel="stylesheet" type="text/css" />
        <!-- Dropify Css -->
        <link href="../public/plugins/dropify/dropify.min.css" rel="stylesheet">
        <!-- Magic Pop Css -->
        <link href="../plugins/filter/magnific-popup.css" rel="stylesheet" type="text/css" />
        <!-- Light Pick Css -->
        <link href="../plugins/lightpick/lightpick.css" rel="stylesheet" />
        <!-- Select2 -->
        <link rel="stylesheet" href="../public/plugins/select2/css/select2.min.css">
    </head>
<?php
} ?>