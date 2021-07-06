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

$LoginClientID = $_SESSION['Login_id'];



/* Doctors */
$query = "SELECT COUNT(*)  FROM Doctors ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($doc);
$stmt->fetch();
$stmt->close();

$ret = "SELECT * FROM `Clients`  WHERE Client_Login_id = '$LoginClientID'  ";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($client_Id = $res->fetch_object()) {

    /* Logged In Client Bookings */
    $query = "SELECT COUNT(*)  FROM Bookings WHERE Booking_Client_Id = '$client_Id->Client_id'";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($Bookings);
    $stmt->fetch();
    $stmt->close();
}


/* Hospital Services */
$query = "SELECT COUNT(*)  FROM Hospital_Services ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Hospital_Services);
$stmt->fetch();
$stmt->close();
