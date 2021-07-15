-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 15, 2021 at 11:16 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iScheduling`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bookings`
--

CREATE TABLE `Bookings` (
  `Booking_id` int(200) NOT NULL,
  `Booking_Ref` varchar(200) NOT NULL,
  `Booking_Date` varchar(200) NOT NULL,
  `Booking_Service_Id` int(200) NOT NULL,
  `Booking_Service_Date` varchar(200) NOT NULL,
  `Booking_Client_Id` int(200) NOT NULL,
  `Booking_Status` varchar(200) NOT NULL,
  `Booking_Review_Date` varchar(200) DEFAULT NULL,
  `Booking_Reviewd_By_Login_Id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Clients`
--

CREATE TABLE `Clients` (
  `Client_id` int(20) NOT NULL,
  `Client_full_name` varchar(200) NOT NULL,
  `Client_login_id` varchar(200) NOT NULL,
  `Client_phone_no` varchar(200) NOT NULL,
  `Client_gender` varchar(200) NOT NULL,
  `Client_email` varchar(200) NOT NULL,
  `Client_location` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Clinic_Staff`
--

CREATE TABLE `Clinic_Staff` (
  `Staff_id` int(20) NOT NULL,
  `Staff_full_name` varchar(200) NOT NULL,
  `Staff_id_no` varchar(200) NOT NULL,
  `Staff_login_id` varchar(200) NOT NULL,
  `Staff_phone_no` varchar(200) NOT NULL,
  `Staff_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Clinic_Staff`
--

INSERT INTO `Clinic_Staff` (`Staff_id`, `Staff_full_name`, `Staff_id_no`, `Staff_login_id`, `Staff_phone_no`, `Staff_email`) VALUES
(1, 'Clinic Administrator', '90100934', 'a87of334ae130217fea4505fd3c994f5683f', '07901399924', 'cadmin@ischeduling.com');

-- --------------------------------------------------------

--
-- Table structure for table `Doctors`
--

CREATE TABLE `Doctors` (
  `Doctor_id` int(20) NOT NULL,
  `Doctor_login_id` varchar(200) NOT NULL,
  `Doctor_full_name` varchar(200) NOT NULL,
  `Doctor_specialization` longtext NOT NULL,
  `Doctor_phone_no` varchar(200) NOT NULL,
  `Doctor_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Hospital_Services`
--

CREATE TABLE `Hospital_Services` (
  `Service_id` int(200) NOT NULL,
  `Service_name` varchar(200) NOT NULL,
  `Service_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Hospital_Services`
--

INSERT INTO `Hospital_Services` (`Service_id`, `Service_name`, `Service_desc`) VALUES
(1, 'Therapist', 'A therapist is a broad designation that refers to professionals who are trained to provide treatment and rehabilitation. The term is often applied to psychologists, but it can include others who provide a variety of services, including social workers, counselors, life coaches, and many others.'),
(2, 'Cardio Therapy', 'A therapist is a broad designation that refers to professionals who are trained to provide treatment and rehabilitation. The term is often applied to psychologists, but it can include others who provide a variety of services, including social workers, counselors, life coaches, and many others.'),
(3, 'Optician', 'cs-ischeduling@gmail.comcs-ischeduling@gmail.comcs-ischeduling@gmail.comcs-ischeduling@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `Login_id` varchar(200) NOT NULL,
  `Login_user_name` varchar(200) NOT NULL,
  `Login_email` varchar(200) NOT NULL,
  `Login_password` varchar(200) NOT NULL,
  `Login_rank` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`Login_id`, `Login_user_name`, `Login_email`, `Login_password`, `Login_rank`) VALUES
('a87of334ae130217fea4505fd3c994f5683f', 'Clinic Administrator', 'cadmin@ischeduling.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bookings`
--
ALTER TABLE `Bookings`
  ADD PRIMARY KEY (`Booking_id`),
  ADD KEY `Booking_Client_Id` (`Booking_Client_Id`),
  ADD KEY `Booking_Reviewd_By_Login_Id` (`Booking_Reviewd_By_Login_Id`),
  ADD KEY `Booking_Service_Id` (`Booking_Service_Id`);

--
-- Indexes for table `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`Client_id`),
  ADD KEY `Client_login_id` (`Client_login_id`);

--
-- Indexes for table `Clinic_Staff`
--
ALTER TABLE `Clinic_Staff`
  ADD PRIMARY KEY (`Staff_id`),
  ADD KEY `Staff_login_id` (`Staff_login_id`);

--
-- Indexes for table `Doctors`
--
ALTER TABLE `Doctors`
  ADD PRIMARY KEY (`Doctor_id`),
  ADD KEY `Doctor_login_id` (`Doctor_login_id`);

--
-- Indexes for table `Hospital_Services`
--
ALTER TABLE `Hospital_Services`
  ADD PRIMARY KEY (`Service_id`);

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`Login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bookings`
--
ALTER TABLE `Bookings`
  MODIFY `Booking_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Clients`
--
ALTER TABLE `Clients`
  MODIFY `Client_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Clinic_Staff`
--
ALTER TABLE `Clinic_Staff`
  MODIFY `Staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Doctors`
--
ALTER TABLE `Doctors`
  MODIFY `Doctor_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Hospital_Services`
--
ALTER TABLE `Hospital_Services`
  MODIFY `Service_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Bookings`
--
ALTER TABLE `Bookings`
  ADD CONSTRAINT `Client_Id` FOREIGN KEY (`Booking_Client_Id`) REFERENCES `Clients` (`Client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `LoginId` FOREIGN KEY (`Booking_Reviewd_By_Login_Id`) REFERENCES `Login` (`Login_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ServiceID` FOREIGN KEY (`Booking_Service_Id`) REFERENCES `Hospital_Services` (`Service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Clients`
--
ALTER TABLE `Clients`
  ADD CONSTRAINT `ClientLogin` FOREIGN KEY (`Client_login_id`) REFERENCES `Login` (`Login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Clinic_Staff`
--
ALTER TABLE `Clinic_Staff`
  ADD CONSTRAINT `Staff_Login` FOREIGN KEY (`Staff_login_id`) REFERENCES `Login` (`Login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Doctors`
--
ALTER TABLE `Doctors`
  ADD CONSTRAINT `Doctor_Login` FOREIGN KEY (`Doctor_login_id`) REFERENCES `Login` (`Login_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
