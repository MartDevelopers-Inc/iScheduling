-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2021 at 03:57 PM
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
-- Database: `ischeduling`
--

-- --------------------------------------------------------

--
-- Table structure for table `Accepted_Booking`
--

CREATE TABLE `Accepted_Booking` (
  `accepted_booking_id` int(20) NOT NULL,
  `accepted_booking_booking_id` int(20) NOT NULL,
  `accepted_booking_staff_id` int(20) NOT NULL,
  `accepted_booking_doctor_id` int(20) NOT NULL,
  `accepted_booking_actual_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Accepted_Booking`
--

INSERT INTO `Accepted_Booking` (`accepted_booking_id`, `accepted_booking_booking_id`, `accepted_booking_staff_id`, `accepted_booking_doctor_id`, `accepted_booking_actual_date`) VALUES
(1, 1, 1, 1, '2021-08-02'),
(2, 3, 1, 1, '2021-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `Bookings`
--

CREATE TABLE `Bookings` (
  `booking_id` int(200) NOT NULL,
  `booking_ref` varchar(200) NOT NULL,
  `booking_date` varchar(200) NOT NULL,
  `booking_hos_serv_id` int(20) NOT NULL,
  `booking_service_date` varchar(200) NOT NULL,
  `booking_client_id` int(20) NOT NULL,
  `booking_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Bookings`
--

INSERT INTO `Bookings` (`booking_id`, `booking_ref`, `booking_date`, `booking_hos_serv_id`, `booking_service_date`, `booking_client_id`, `booking_status`) VALUES
(1, 'ATFG9012', '12/12/2021', 2, '12/12/2021', 1, 'Accepted'),
(2, 'EYHIJ53268', '2021-07-26', 2, '2021-08-02', 1, 'New'),
(3, 'QVUHE98427', '2021-07-26', 9, '2021-08-02', 2, 'Accepted'),
(4, 'MOHRB50638', '2021-08-03', 8, '2021-08-05', 2, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `Clients`
--

CREATE TABLE `Clients` (
  `client_id` int(20) NOT NULL,
  `client_full_name` varchar(200) NOT NULL,
  `client_login_id` varchar(200) NOT NULL,
  `client_phone_no` varchar(200) NOT NULL,
  `client_gender` varchar(200) NOT NULL,
  `client_email` varchar(200) NOT NULL,
  `client_location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Clients`
--

INSERT INTO `Clients` (`client_id`, `client_full_name`, `client_login_id`, `client_phone_no`, `client_gender`, `client_email`, `client_location`) VALUES
(1, 'James Doe', '0bec5afefb8240920393e00832df59f815b032387f', '0727372297', 'Male', 'jamesdoe@mail.com', '127.0.0.1 Localhost'),
(2, 'Janet Doe', '8164374e9607be2306412ab78959ce0f426489021f', '0729123456', 'Female', 'janetdoe@mail.com', '127.0.0.1 Localhost'),
(3, 'Doe James G ', 'e3a425667401f1a54c30e318319af8715b865650dc', '0790897342', 'Male', 'djg@mail.com', '90127 Localhost'),
(4, 'Test Client', 'aaada535be21ddc6e38e6697b2a3ad1a52ce9ec581', '07942313', 'Male', 'test@mail.com', '12 LOc'),
(5, 'Test Client', 'c1cff4f4d8db2651585361e90c97698d63e10408b9', '07123908645', 'Male', 'test@testmail.com', '127001 Demo');

-- --------------------------------------------------------

--
-- Table structure for table `Clinic_Staff`
--

CREATE TABLE `Clinic_Staff` (
  `staff_id` int(20) NOT NULL,
  `staff_full_name` varchar(200) NOT NULL,
  `staff_id_no` varchar(200) NOT NULL,
  `staff_login_id` varchar(200) NOT NULL,
  `staff_phone_no` varchar(200) NOT NULL,
  `staff_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Clinic_Staff`
--

INSERT INTO `Clinic_Staff` (`staff_id`, `staff_full_name`, `staff_id_no`, `staff_login_id`, `staff_phone_no`, `staff_email`) VALUES
(1, 'System Admin', '39039090', 'a87of334ae130217fea4505fd3c994f5683f', '0737229765', 'admin@ischeduling.com'),
(2, 'Doe James', '900126', '9734910d430ac16ca537eb20af20fd39bcd6e85daf', '0712345678', 'djames@mail.com'),
(3, 'Doe Janet', '90012674', '33c80738b4f22954474917bb64eb45f0420c71670e', '0710090090', 'doej@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Doctors`
--

CREATE TABLE `Doctors` (
  `doctor_id` int(20) NOT NULL,
  `doctor_login_id` varchar(200) NOT NULL,
  `doctor_full_name` varchar(200) NOT NULL,
  `doctor_specialization` varchar(200) NOT NULL,
  `doctor_phone_no` varchar(200) NOT NULL,
  `doctor_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Doctors`
--

INSERT INTO `Doctors` (`doctor_id`, `doctor_login_id`, `doctor_full_name`, `doctor_specialization`, `doctor_phone_no`, `doctor_email`) VALUES
(1, 'e36bde2a8b8edacc2579b36e62560fe0e322ee0013', 'Doc Jane Doe ', 'Optician ', '0737228723', 'docjanedoe@mail.com'),
(2, 'c301aabf40da5603ecdb1d2b7f3f033d04c9ada258', 'Doc James Doe', 'Dentist', '079087654', 'docjames@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Hospital`
--

CREATE TABLE `Hospital` (
  `hospital_id` int(20) NOT NULL,
  `hospital_name` varchar(200) NOT NULL,
  `hospital_desc` longtext NOT NULL,
  `hospital_email` varchar(200) NOT NULL,
  `hospital_contact` varchar(200) NOT NULL,
  `hospital_mobile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Hospital`
--

INSERT INTO `Hospital` (`hospital_id`, `hospital_name`, `hospital_desc`, `hospital_email`, `hospital_contact`, `hospital_mobile`) VALUES
(1, 'The Kenyatta National Hospital', 'The Kenyatta National Hospital is the oldest hospital in Kenya. It is a public, tertiary, referral hospital for the Ministry of Health. It is also the teaching hospital of the University of Nairobi College of Health Sciences. It is the largest hospital in the country and East Africa as well.', 'hello@knh.go.ke', '09001290923', '+254737228765'),
(2, 'The Matter Hospital', 'Mater Misericordiae Hospital is committed to be a leading healthcare provider in East and Central Africa', 'hello@matterhosp.com', '089762352', '+25473722236'),
(4, 'Bristol Park Hospital', 'Bristol Park Hospital exists to provide Excellent Healthcare Solutions.Currently, we are running 4 branches; Fedha, Tassia, Utawala, and Machakos. We endeavor to help our patients identify their Healthcare needs, provide care that meets their expectations; and assist them to maintain their good health. ', 'mail@bristol.com', '90087512', '+254737229087'),
(5, 'The German Hospital', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing elit ut aliquam purus sit amet luctus. Neque volutpat ac tincidunt vitae. Ornare quam viverra orci sagittis. Quam lacus suspendisse faucibus interdum posuere. Egestas pretium aenean pharetra magna ac placerat vestibulum lectus. Nec ultrices dui sapien eget mi. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Vitae et leo duis ut. Venenatis cras sed felis eget. Sed felis eget velit aliquet sagittis. Egestas sed sed risus pretium quam vulputate dignissim. Fringilla ut morbi tincidunt augue interdum velit. Nulla facilisi morbi tempus iaculis urna id volutpat lacus laoreet. Eu non diam phasellus vestibulum lorem sed risus. Ut consequat semper viverra nam libero justo laoreet sit amet. Pharetra magna ac placerat vestibulum lectus mauris ultrices. Consequat interdum varius sit amet mattis vulputate enim nulla aliquet. A cras semper auctor neque vitae. Suspendisse ultrices gravida dictum fusce ut placerat orci nulla pellentesque.', 'hello@germanhospital.com', '0998823124', '+25473128745');

-- --------------------------------------------------------

--
-- Table structure for table `Hospital_Service`
--

CREATE TABLE `Hospital_Service` (
  `hos_serv_id` int(20) NOT NULL,
  `hos_serv_hospital_id` int(20) NOT NULL,
  `hos_serv_service_id` int(20) NOT NULL,
  `hos_serv_cost` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Hospital_Service`
--

INSERT INTO `Hospital_Service` (`hos_serv_id`, `hos_serv_hospital_id`, `hos_serv_service_id`, `hos_serv_cost`) VALUES
(2, 1, 2, 'Ksh 50,000'),
(3, 1, 3, 'Ksh 20,000'),
(4, 2, 1, 'Ksh 4,500'),
(5, 2, 2, 'Ksh 100,000'),
(6, 4, 1, 'Ksh 1,200'),
(7, 4, 2, 'Ksh 120,000'),
(8, 4, 3, 'KSh 150,000'),
(9, 5, 5, 'Ksh 50,000');

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `login_id` varchar(200) NOT NULL,
  `login_user_name` varchar(200) NOT NULL,
  `login_email` varchar(200) NOT NULL,
  `login_password` varchar(200) NOT NULL,
  `login_rank` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`login_id`, `login_user_name`, `login_email`, `login_password`, `login_rank`) VALUES
('0bec5afefb8240920393e00832df59f815b032387f', 'James_doe', 'jamesdoe@mail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Client'),
('33c80738b4f22954474917bb64eb45f0420c71670e', 'Doe Jane', 'doej@mail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Staff'),
('8164374e9607be2306412ab78959ce0f426489021f', 'Janet Doe', 'janetdoe@mail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Client'),
('9734910d430ac16ca537eb20af20fd39bcd6e85daf', 'Doe_James', 'djames@mail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Staff'),
('a87of334ae130217fea4505fd3c994f5683f', 'System Admin', 'admin@ischeduling.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Administrator'),
('c1cff4f4d8db2651585361e90c97698d63e10408b9', 'Test Client', 'test@testmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Client'),
('c301aabf40da5603ecdb1d2b7f3f033d04c9ada258', 'Doc James Doe', 'docjames@mail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Doctor'),
('e36bde2a8b8edacc2579b36e62560fe0e322ee0013', 'Doc Jane Doe ', 'docjanedoe@mail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Doctor'),
('e3a425667401f1a54c30e318319af8715b865650dc', 'Doe James G', 'djg@mail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `Services`
--

CREATE TABLE `Services` (
  `service_id` int(20) NOT NULL,
  `service_name` varchar(200) NOT NULL,
  `service_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Services`
--

INSERT INTO `Services` (`service_id`, `service_name`, `service_desc`) VALUES
(1, 'Dental Care', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id velit ut tortor pretium viverra suspendisse potenti. Donec adipiscing tristique risus nec feugiat in. Sed turpis tincidunt id aliquet. Congue mauris rhoncus aenean vel elit scelerisque. Ac placerat vestibulum lectus mauris ultrices eros in. Amet volutpat consequat mauris nunc congue. Sed blandit libero volutpat sed cras ornare arcu dui. Pellentesque nec nam aliquam sem et tortor consequat id porta. Dictum at tempor commodo ullamcorper. Eget sit amet tellus cras adipiscing enim eu turpis. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan.'),
(2, 'MRI', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id velit ut tortor pretium viverra suspendisse potenti. Donec adipiscing tristique risus nec feugiat in. Sed turpis tincidunt id aliquet. Congue mauris rhoncus aenean vel elit scelerisque. Ac placerat vestibulum lectus mauris ultrices eros in. Amet volutpat consequat mauris nunc congue. Sed blandit libero volutpat sed cras ornare arcu dui. Pellentesque nec nam aliquam sem et tortor consequat id porta. Dictum at tempor commodo ullamcorper. Eget sit amet tellus cras adipiscing enim eu turpis. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan.'),
(3, 'CT Scan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id velit ut tortor pretium viverra suspendisse potenti. Donec adipiscing tristique risus nec feugiat in. Sed turpis tincidunt id aliquet. Congue mauris rhoncus aenean vel elit scelerisque. Ac placerat vestibulum lectus mauris ultrices eros in. Amet volutpat consequat mauris nunc congue. Sed blandit libero volutpat sed cras ornare arcu dui. Pellentesque nec nam aliquam sem et tortor consequat id porta. Dictum at tempor commodo ullamcorper. Eget sit amet tellus cras adipiscing enim eu turpis. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan.'),
(5, 'Gynaecology ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing elit ut aliquam purus sit amet luctus. Neque volutpat ac tincidunt vitae. Ornare quam viverra orci sagittis. Quam lacus suspendisse faucibus interdum posuere. Egestas pretium aenean pharetra magna ac placerat vestibulum lectus. Nec ultrices dui sapien eget mi. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Vitae et leo duis ut. Venenatis cras sed felis eget. Sed felis eget velit aliquet sagittis. Egestas sed sed risus pretium quam vulputate dignissim. Fringilla ut morbi tincidunt augue interdum velit. Nulla facilisi morbi tempus iaculis urna id volutpat lacus laoreet. Eu non diam phasellus vestibulum lorem sed risus. Ut consequat semper viverra nam libero justo laoreet sit amet. Pharetra magna ac placerat vestibulum lectus mauris ultrices. Consequat interdum varius sit amet mattis vulputate enim nulla aliquet. A cras semper auctor neque vitae. Suspendisse ultrices gravida dictum fusce ut placerat orci nulla pellentesque.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Accepted_Booking`
--
ALTER TABLE `Accepted_Booking`
  ADD PRIMARY KEY (`accepted_booking_id`),
  ADD KEY `BookingID` (`accepted_booking_booking_id`),
  ADD KEY `DoctorID` (`accepted_booking_doctor_id`),
  ADD KEY `StaffID` (`accepted_booking_staff_id`);

--
-- Indexes for table `Bookings`
--
ALTER TABLE `Bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `ClientID` (`booking_client_id`),
  ADD KEY `booking_hos_serv_id` (`booking_hos_serv_id`);

--
-- Indexes for table `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `client_login_id` (`client_login_id`);

--
-- Indexes for table `Clinic_Staff`
--
ALTER TABLE `Clinic_Staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `staff_login_id` (`staff_login_id`);

--
-- Indexes for table `Doctors`
--
ALTER TABLE `Doctors`
  ADD PRIMARY KEY (`doctor_id`),
  ADD KEY `doctor_login_id` (`doctor_login_id`);

--
-- Indexes for table `Hospital`
--
ALTER TABLE `Hospital`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `Hospital_Service`
--
ALTER TABLE `Hospital_Service`
  ADD PRIMARY KEY (`hos_serv_id`),
  ADD KEY `hos_serv_hospital_id` (`hos_serv_hospital_id`,`hos_serv_service_id`);

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `Services`
--
ALTER TABLE `Services`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Accepted_Booking`
--
ALTER TABLE `Accepted_Booking`
  MODIFY `accepted_booking_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Bookings`
--
ALTER TABLE `Bookings`
  MODIFY `booking_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Clients`
--
ALTER TABLE `Clients`
  MODIFY `client_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Clinic_Staff`
--
ALTER TABLE `Clinic_Staff`
  MODIFY `staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Doctors`
--
ALTER TABLE `Doctors`
  MODIFY `doctor_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Hospital`
--
ALTER TABLE `Hospital`
  MODIFY `hospital_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Hospital_Service`
--
ALTER TABLE `Hospital_Service`
  MODIFY `hos_serv_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Services`
--
ALTER TABLE `Services`
  MODIFY `service_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Accepted_Booking`
--
ALTER TABLE `Accepted_Booking`
  ADD CONSTRAINT `BookingID` FOREIGN KEY (`accepted_booking_booking_id`) REFERENCES `Bookings` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `DoctorID` FOREIGN KEY (`accepted_booking_doctor_id`) REFERENCES `Doctors` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `StaffID` FOREIGN KEY (`accepted_booking_staff_id`) REFERENCES `Clinic_Staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Bookings`
--
ALTER TABLE `Bookings`
  ADD CONSTRAINT `ClientID` FOREIGN KEY (`booking_client_id`) REFERENCES `Clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Hospital_Service`
--
ALTER TABLE `Hospital_Service`
  ADD CONSTRAINT `HospitalID` FOREIGN KEY (`hos_serv_hospital_id`) REFERENCES `Hospital` (`hospital_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
