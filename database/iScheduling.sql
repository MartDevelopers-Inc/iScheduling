-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 06, 2021 at 11:11 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `Booking_Review_Date` varchar(200) NOT NULL,
  `Booking_Reviewd_By_Login_Id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Bookings`
--

INSERT INTO `Bookings` (`Booking_id`, `Booking_Ref`, `Booking_Date`, `Booking_Service_Id`, `Booking_Service_Date`, `Booking_Client_Id`, `Booking_Status`, `Booking_Review_Date`, `Booking_Reviewd_By_Login_Id`) VALUES
(2, 'KGPBO36270', '2021-07-06', 1, '2021-07-07', 7, 'Authorized', '2021-07-06', '066cae625a9a8236e6f8cc4d4fde17ab35d9478b7a'),
(3, 'FNIWP40956', '2021-07-06', 2, '2021-07-20', 7, 'New', '', ''),
(4, 'THNIV76801', '2021-07-06', 3, '2021-07-06', 7, 'Rejected', '2021-07-13', '066cae625a9a8236e6f8cc4d4fde17ab35d9478b7a');

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

--
-- Dumping data for table `Clients`
--

INSERT INTO `Clients` (`Client_id`, `Client_full_name`, `Client_login_id`, `Client_phone_no`, `Client_gender`, `Client_email`, `Client_location`) VALUES
(6, 'Client 001', 'f25857fd337aae18274da795d45581b18a03c7c226', '0737228765', 'Male', 'client001@gmail.com', '127001 Localhost'),
(7, 'Client 002', '0bd8807b619ef359e37f6f359ca5525d33690450ff', '09888765', 'Female', 'client002@mail.com', '127.0.0.1 Localhost'),
(8, 'Janet Doe', '6b9b52a7b27a6643188389242f6f00eacd192c5130', '071009012873', 'Female', 'janetdoe@gmail.com', '90127 Localhost');

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
(5, 'Clinic Administrator', '901009', 'c1cb7f7e55df665b34e6088ea4c6a470f28180ba8a', '0710080731', 'clinicadmin@ischeduling.org'),
(6, 'James Doe', '12890765', '03ce0a1a903c6c374cf7346fd41d4c9babd74d51c5', '090019883', 'jamesdoe@gmail.com');

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

--
-- Dumping data for table `Doctors`
--

INSERT INTO `Doctors` (`Doctor_id`, `Doctor_login_id`, `Doctor_full_name`, `Doctor_specialization`, `Doctor_phone_no`, `Doctor_email`) VALUES
(3, '5029cc1c4acc51d2967faf98051be46492b272379a', 'Doctor 001', 'Certified Cardio-Therapist.', '+254737229776', 'doc001@gmail.com'),
(4, '066cae625a9a8236e6f8cc4d4fde17ab35d9478b7a', 'Doctor James Doe', 'Certified Dentist', '+2547896543', 'doc002@gmail.com');

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
(1, 'Cardio-therapy', 'Already designed more than 35+ pages for your needs. Such as - Authentication, Chats, eCommerce, Blog & Miscellaneous pages.Already designed more than 35+ pages for your needs. Such as - Authentication, Chats, eCommerce, Blog & Miscellaneous pages.Already designed more than 35+ pages for your needs. Such as - Authentication, Chats, eCommerce, Blog & Miscellaneous pages.Already designed more than 35+ pages for your needs. Such as - Authentication, Chats, eCommerce, Blog & Miscellaneous pages.Already designed more than 35+ pages for your needs. Such as - Authentication, Chats, eCommerce, Blog & Miscellaneous pages.'),
(2, 'Dental Care', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'),
(3, 'Eye Care', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'),
(4, 'Physio-Therapy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc consequat interdum varius sit amet mattis vulputate enim. Volutpat lacus laoreet non curabitur gravida arcu ac tortor dignissim. Aliquam eleifend mi in nulla posuere sollicitudin. Dolor sit amet consectetur adipiscing elit duis tristique sollicitudin. Aliquet bibendum enim facilisis gravida. Morbi non arcu risus quis varius quam quisque id. Amet nulla facilisi morbi tempus iaculis. Tristique et egestas quis ipsum suspendisse ultrices gravida. Vitae justo eget magna fermentum iaculis eu non diam. Ut etiam sit amet nisl purus in mollis nunc.\r\n\r\nSuspendisse faucibus interdum posuere lorem ipsum dolor sit. Ac orci phasellus egestas tellus rutrum. Nibh tortor id aliquet lectus proin nibh nisl condimentum id. Congue nisi vitae suscipit tellus. Ac placerat vestibulum lectus mauris. Purus viverra accumsan in nisl. Purus gravida quis blandit turpis cursus in hac habitasse. Urna porttitor rhoncus dolor purus non enim. Enim praesent elementum facilisis leo vel. Odio facilisis mauris sit amet massa vitae tortor condimentum lacinia. Egestas egestas fringilla phasellus faucibus scelerisque eleifend donec pretium. Elit duis tristique sollicitudin nibh sit. Fermentum iaculis eu non diam phasellus. Phasellus egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam.');

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
('03ce0a1a903c6c374cf7346fd41d4c9babd74d51c5', 'Staff 001', 'staff001@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Staff'),
('066cae625a9a8236e6f8cc4d4fde17ab35d9478b7a', 'Doctor 002', 'doc002@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Doctor'),
('0bd8807b619ef359e37f6f359ca5525d33690450ff', 'Client 002', 'client002@mail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Client'),
('5029cc1c4acc51d2967faf98051be46492b272379a', 'Doctor 001', 'doc001@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Doctor'),
('6b9b52a7b27a6643188389242f6f00eacd192c5130', 'Janet Doe', 'janetdoe@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Client'),
('c1cb7f7e55df665b34e6088ea4c6a470f28180ba8a', 'Clinic Administrator', 'clinicadmin@ischeduling.org', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Administrator'),
('f25857fd337aae18274da795d45581b18a03c7c226', 'Client 001', 'client001@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Client');

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
  MODIFY `Booking_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Clients`
--
ALTER TABLE `Clients`
  MODIFY `Client_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Clinic_Staff`
--
ALTER TABLE `Clinic_Staff`
  MODIFY `Staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Doctors`
--
ALTER TABLE `Doctors`
  MODIFY `Doctor_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Hospital_Services`
--
ALTER TABLE `Hospital_Services`
  MODIFY `Service_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Bookings`
--
ALTER TABLE `Bookings`
  ADD CONSTRAINT `ClientID` FOREIGN KEY (`Booking_Client_Id`) REFERENCES `Clients` (`Client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
