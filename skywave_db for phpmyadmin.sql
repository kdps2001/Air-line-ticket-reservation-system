-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 04:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skywave_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `airline`
--

CREATE TABLE `airline` (
  `airline_id` varchar(5) NOT NULL,
  `airline_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `web_site` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airline`
--

INSERT INTO `airline` (`airline_id`, `airline_name`, `email`, `contact_no`, `web_site`) VALUES
('air01', 'SriLankan Airlines', 'reservations@srilankan.com', '+94117771979', 'www.srilankan.com'),
('air02', 'Emirates Airline', 'customer.affairs@emirates.com', '+919167003333', 'accounts.emirates.com'),
('air03', 'Qatar Airways', 'tell-us@qatarairways.com.qa', '+974 4144 5555', 'vwww.qatarairways.com'),
('air04', 'Singapore Airlines', 'customer_service@singaporeair.com.sg', '+6562218888', 'www.singaporeair.com'),
('air05', 'British Airways', 'customer.relations@ba.com', '+448443920787', 'www.britishairways.com');

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `airport_id` varchar(3) NOT NULL,
  `airport_name` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`airport_id`, `airport_name`, `country`) VALUES
('CBR', 'Canberra - Canberra Airport', 'Australia'),
('CMB', 'Colombo - Bandaranaike International Airport', 'Sri Lanka'),
('DEL', 'Delhi - Indira Gandhi International Airport', 'India'),
('ICN', 'Seoul - Incheon International Airport', 'South Korea'),
('JFK', 'New York - New York International Airport', 'United States (US)'),
('NRT', 'Tokyo - Tokyo International Airport', 'Japan');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `flight_no` int(11) NOT NULL,
  `seat_no` varchar(3) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `book_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `booking_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `flight_no`, `seat_no`, `payment_id`, `book_timestamp`, `booking_status`) VALUES
(7, 17, 3, 'A07', 12, '2024-10-08 05:08:08', 'completed'),
(8, 17, 3, 'A08', 13, '2024-10-08 11:02:38', 'completed'),
(9, 17, 3, 'A09', 14, '2024-10-08 11:02:03', 'completed'),
(10, 22, 3, 'A10', 15, '2024-10-08 15:02:40', 'completed'),
(11, 23, 1, 'A07', 16, '2024-10-10 14:41:39', 'completed'),
(12, 22, 3, 'A05', 17, '2024-10-10 14:42:10', 'completed'),
(13, 17, 1, 'A08', 18, '2024-10-11 07:17:17', 'completed'),
(14, 3, 1, 'A09', 19, '2024-10-11 11:31:36', 'completed'),
(15, 3, 1, 'A10', 20, '2024-10-11 11:50:27', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` varchar(7) NOT NULL,
  `class_type` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_type`) VALUES
('class01', 'Economy class'),
('class02', 'Premium Economy class'),
('class03', 'business class'),
('class04', 'First class');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_user`
--

CREATE TABLE `deleted_user` (
  `d_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deleted_user`
--

INSERT INTO `deleted_user` (`d_id`, `user_id`, `user_name`, `user_email`) VALUES
(2, 22, 'irudika', 'irudika@gmail.com'),
(4, 2, 'support', 'semini@gmail.com'),
(5, 23, 'sahan', 'sahan@gmail.com'),
(7, 24, 'sachintha', 'sachintha@gmail.com'),
(8, 25, 'shan', 'shan@gmail.com'),
(9, 26, 'shan', 'shan@gjhj'),
(10, 27, 'paw', 'paw@gmal.com');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(3) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `question`, `answer`) VALUES
(3, 'How can I book a flight on SkyWave?', 'To book a flight, sign in to your account, use the search feature to find available flights by selecting your departure and destination airports, and follow the steps to confirm your booking.'),
(4, 'What payment methods does SkyWave accept?', 'SkyWave accepts credit cards, debit cards, and online payment platforms such as PayPal and Stripe.'),
(5, 'How do I change or cancel my booking?', 'To change or cancel a booking, go to the \"Manage Bookings\" section in your account. Select the booking you wish to modify and follow the on-screen instructions.'),
(6, 'How can I contact customer support?', 'You can reach SkyWave customer support via email, phone, or live chat. Visit our \"Contact Us\" page for details.'),
(7, 'What is SkyWave’s baggage policy?', 'SkyWave allows one carry-on bag and one checked bag for free. Additional bags or oversized luggage may incur extra fees, which you can view during the booking process.');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flight_no` int(11) NOT NULL,
  `flight_name` varchar(20) NOT NULL,
  `departure` varchar(20) NOT NULL,
  `dip_date` date NOT NULL,
  `dip_time` time NOT NULL,
  `arrival` varchar(20) NOT NULL,
  `arr_date` date NOT NULL,
  `arr_time` time NOT NULL,
  `airline_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flight_no`, `flight_name`, `departure`, `dip_date`, `dip_time`, `arrival`, `arr_date`, `arr_time`, `airline_id`) VALUES
(1, 'UL195', 'CMB', '2024-10-11', '10:20:00', 'DEL', '2024-10-11', '11:10:00', 'air01'),
(2, 'EK699', 'CMB', '2024-10-07', '09:10:00', 'JFK', '2024-10-07', '19:00:00', 'air02'),
(3, 'UL200', 'CMB', '2024-10-11', '12:22:00', 'DEL', '2024-10-11', '13:28:00', 'air01'),
(4, 'A-0987', 'NRT', '2024-10-01', '18:19:00', 'JFK', '2024-10-02', '16:23:00', 'air01'),
(5, 'S-654', 'ICN', '2024-10-09', '20:20:00', 'JFK', '2024-10-17', '18:21:00', 'air02'),
(6, 'B-345', 'JFK', '2024-10-13', '18:21:00', 'DEL', '2024-10-09', '19:22:00', 'air04');

-- --------------------------------------------------------

--
-- Table structure for table `flight_class`
--

CREATE TABLE `flight_class` (
  `flight_no` int(11) NOT NULL,
  `class_id` varchar(7) NOT NULL,
  `fee` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight_class`
--

INSERT INTO `flight_class` (`flight_no`, `class_id`, `fee`) VALUES
(1, 'class01', 209.98),
(1, 'class02', 254.56),
(2, 'class01', 500.95),
(2, 'class02', 559.69),
(2, 'class03', 630.99),
(2, 'class04', 801.89),
(3, 'class01', 210),
(3, 'class02', 260),
(3, 'class03', 320),
(3, 'class04', 450);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `msg_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `msg_sender_id` int(11) NOT NULL,
  `msg_receiver_id` int(11) NOT NULL,
  `msg_content` text NOT NULL,
  `msg_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` varchar(4) NOT NULL,
  `module_name` varchar(100) NOT NULL,
  `module_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`, `module_description`) VALUES
('m001', 'user manage', 'update user , user remove, hold'),
('m002', 'booking manage', 'booking manage, delete booking, status update '),
('m003', 'FAQ manage', 'FAQ add update delete'),
('m004', 'flight details', 'add flight details , remove , update'),
('m005', 'payment accept', 'view payment details accept');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `passenger_id` int(11) NOT NULL,
  `passenger_name` varchar(100) NOT NULL,
  `passport_no` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`passenger_id`, `passenger_name`, `passport_no`, `phone`) VALUES
(1, 'kasun shamika', '12345678', '0771231231'),
(2, 'kamal perera', '0987654321', '0912342345');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `pay_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `amount` double NOT NULL,
  `payment_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `pay_timestamp`, `amount`, `payment_status`) VALUES
(12, '2024-10-08 05:06:45', 216.3, 'approved'),
(13, '2024-10-08 11:02:38', 216.3, 'approved'),
(14, '2024-10-08 11:02:03', 216.3, 'approved'),
(15, '2024-10-08 15:02:40', 216.3, 'approved'),
(16, '2024-10-10 14:41:39', 216.2794, 'approved'),
(17, '2024-10-10 14:42:10', 267.8, 'approved'),
(18, '2024-10-11 07:17:17', 432.5588, 'approved'),
(19, '2024-10-11 11:31:36', 216.2794, 'approved'),
(20, '2024-10-11 11:50:27', 216.2794, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` varchar(6) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
('role00', 'registered_user'),
('role01', 'admin'),
('role02', 'customer_support'),
('role03', 'finance_manage'),
('role04', 'data_entry_manage');

-- --------------------------------------------------------

--
-- Table structure for table `rolemodule`
--

CREATE TABLE `rolemodule` (
  `role_id` varchar(6) NOT NULL,
  `module_id` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rolemodule`
--

INSERT INTO `rolemodule` (`role_id`, `module_id`) VALUES
('role01', 'm001'),
('role01', 'm002'),
('role01', 'm003'),
('role01', 'm004'),
('role01', 'm005'),
('role02', 'm003'),
('role03', 'm002'),
('role04', 'm004');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seat_no` varchar(3) NOT NULL,
  `window` varchar(1) NOT NULL,
  `class_id` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`seat_no`, `window`, `class_id`) VALUES
('A01', 'W', 'class04'),
('A02', 'W', 'class04'),
('A03', 'W', 'class03'),
('A04', 'W', 'class03'),
('A05', 'W', 'class02'),
('A06', 'W', 'class02'),
('A07', 'W', 'class01'),
('A08', 'W', 'class01'),
('A09', 'W', 'class01'),
('A10', 'W', 'class01'),
('B01', 'N', 'class04'),
('B02', 'N', 'class04'),
('B03', 'N', 'class03'),
('B04', 'N', 'class03'),
('B05', 'N', 'class02'),
('B06', 'N', 'class02'),
('B07', 'N', 'class01'),
('B08', 'N', 'class01'),
('B09', 'N', 'class01'),
('B10', 'N', 'class01'),
('C01', 'N', 'class04'),
('C02', 'N', 'class04'),
('C03', 'N', 'class03'),
('C04', 'N', 'class03'),
('C05', 'N', 'class02'),
('C06', 'N', 'class02'),
('C07', 'N', 'class01'),
('C08', 'N', 'class01'),
('C09', 'N', 'class01'),
('C10', 'N', 'class01'),
('D01', 'W', 'class04'),
('D02', 'W', 'class04'),
('D03', 'W', 'class03'),
('D04', 'W', 'class03'),
('D05', 'W', 'class02'),
('D06', 'W', 'class02'),
('D07', 'W', 'class01'),
('D08', 'W', 'class01'),
('D09', 'W', 'class01'),
('D10', 'W', 'class01');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `passenger_id` int(11) DEFAULT NULL,
  `ticket_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `booking_id`, `passenger_id`, `ticket_status`) VALUES
(3, 7, NULL, 'created'),
(4, 9, NULL, 'created'),
(5, 8, NULL, 'created'),
(6, 10, NULL, 'created'),
(7, 11, NULL, 'created'),
(8, 12, NULL, 'created'),
(9, 13, NULL, 'created'),
(10, 14, NULL, 'created'),
(11, 15, NULL, 'created');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `user_address` varchar(250) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `role_id` varchar(6) NOT NULL,
  `user_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `dob`, `email`, `user_address`, `phone`, `user_name`, `user_password`, `role_id`, `user_status`) VALUES
(1, 'pawan', 'sachintha', '2001-11-27', 'pawan@gmail.com', '  255/A, kahaduwa', '0781433525', 'admin', 'admin123', 'role01', 'active'),
(2, 'semini', 'himaya ', '2021-10-07', 'semini@gmail.com', '2345/A, Rathnapura.', '0771234567', 'support', 'support123', 'role02', 'active'),
(3, 'fgfg', 'bbbv', '2015-10-15', 'rasindu@gmail.com', '   dsdsd', '0786789123', 'rasindu', 'rasindu123', 'role00', 'active'),
(4, 'kavishka', 'dilshan', '2017-10-05', 'kavishka@gmail.com', '456/C.Kegalle', '0780987654', 'finance', 'finance123', 'role03', 'active'),
(5, 'shehan', 'madusanka', '2017-10-09', 'shehan@gmail.com', '546/c,Rathnapura.', '0783456789', 'dataentry', 'dataentry123', 'role04', 'active'),
(17, 'pawan', 'sachintha', NULL, 'qwepawan@gmail.com', NULL, NULL, 'pawan', 'pawan123', 'role00', 'active'),
(22, 'irudika', 'nirmal', '2001-08-13', 'irudika@gmail.com', ' elpitiya.', '1234567890', 'irudika', 'irudika123', 'role00', 'active'),
(23, 'sahan', 'thisantha', NULL, 'sahan@gmail.com', NULL, NULL, 'sahan', 'sahan123', 'role00', 'active'),
(28, 'uytre', 'iuytr', NULL, 'hgfd@ghh', NULL, NULL, 'qwe', 'qwe123', 'role00', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airline`
--
ALTER TABLE `airline`
  ADD PRIMARY KEY (`airline_id`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`airport_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `booking_user_fk` (`user_id`),
  ADD KEY `booking_flight_fk` (`flight_no`),
  ADD KEY `booking_seat_fk` (`seat_no`),
  ADD KEY `booking_paymeny_fk` (`payment_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `deleted_user`
--
ALTER TABLE `deleted_user`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_no`),
  ADD KEY `flight_airline_fk` (`airline_id`),
  ADD KEY `flight_arrival_airport_fk` (`arrival`),
  ADD KEY `flight_departure_airport_fk` (`departure`);

--
-- Indexes for table `flight_class`
--
ALTER TABLE `flight_class`
  ADD PRIMARY KEY (`flight_no`,`class_id`),
  ADD KEY `flight_class_class_fk` (`class_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `message_sender_user` (`msg_sender_id`),
  ADD KEY `message_receiver_user` (`msg_receiver_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`passenger_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `rolemodule`
--
ALTER TABLE `rolemodule`
  ADD PRIMARY KEY (`role_id`,`module_id`),
  ADD KEY `rolemodule_module_fk` (`module_id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seat_no`),
  ADD KEY `seat_class_fk` (`class_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `ticket_booking_fk` (`booking_id`),
  ADD KEY `ticket_passenger_fk` (`passenger_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_ role_fk` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `deleted_user`
--
ALTER TABLE `deleted_user`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `flight_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `passenger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_flight_fk` FOREIGN KEY (`flight_no`) REFERENCES `flight` (`flight_no`),
  ADD CONSTRAINT `booking_paymeny_fk` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`),
  ADD CONSTRAINT `booking_seat_fk` FOREIGN KEY (`seat_no`) REFERENCES `seat` (`seat_no`),
  ADD CONSTRAINT `booking_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_airline_fk` FOREIGN KEY (`airline_id`) REFERENCES `airline` (`airline_id`),
  ADD CONSTRAINT `flight_arrival_airport_fk` FOREIGN KEY (`arrival`) REFERENCES `airport` (`airport_id`),
  ADD CONSTRAINT `flight_departure_airport_fk` FOREIGN KEY (`departure`) REFERENCES `airport` (`airport_id`);

--
-- Constraints for table `flight_class`
--
ALTER TABLE `flight_class`
  ADD CONSTRAINT `flight_class_class_fk` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `flight_class_flight_fk` FOREIGN KEY (`flight_no`) REFERENCES `flight` (`flight_no`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_receiver_user` FOREIGN KEY (`msg_receiver_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `message_sender_user` FOREIGN KEY (`msg_sender_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `rolemodule`
--
ALTER TABLE `rolemodule`
  ADD CONSTRAINT `rolemodule_module_fk` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`),
  ADD CONSTRAINT `rolemodule_role_fk` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_class_fk` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_booking_fk` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`),
  ADD CONSTRAINT `ticket_passenger_fk` FOREIGN KEY (`passenger_id`) REFERENCES `passenger` (`passenger_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ role_fk` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
