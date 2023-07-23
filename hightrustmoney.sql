-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 10:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hightrustmoney`
--

-- --------------------------------------------------------

--
-- Table structure for table `bankaccount_information`
--

CREATE TABLE `bankaccount_information` (
  `ba_id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `account_holder_name` varchar(100) NOT NULL,
  `account_holder_email` varchar(255) NOT NULL,
  `account_holder_mobilenum` varchar(20) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `account_type` varchar(20) NOT NULL,
  `account_datecreated` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `remaining_balance` double NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bankaccount_information`
--

INSERT INTO `bankaccount_information` (`ba_id`, `title`, `account_holder_name`, `account_holder_email`, `account_holder_mobilenum`, `account_number`, `account_type`, `account_datecreated`, `Address`, `remaining_balance`, `notes`) VALUES
(1, 'Mr', 'Water', 'waterweight@gmail.com', '09123456789', '123456789', '', '2015-05-20', 'Antipolo', 70000, ''),
(2, 'Ms', 'Hazel Ann B. Baong', 'hazel.baong@gmail.com', '09150697910', '201810045', 'Savings', '2019-01-18', '56 Guyabano St., Gloryville Subd., Brgy. Silangan, San Mateo, Rizal', 55000, 'Your Regular Savings Passbook account\'s required monthly minimum maintaining balance will be adjusted from 10,000 to 25,000.'),
(5, 'Ms', 'Maria Isabel Baong', 'isabelbaong@gmail.com', '09364661089', 'BA-0220-21-ONG', 'Savings', '2023-07-20', 'San Mateo, Rizal', 50000, '');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_applications`
--

CREATE TABLE `insurance_applications` (
  `application_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `insurance_type` varchar(50) NOT NULL,
  `application_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insurance_applications`
--

INSERT INTO `insurance_applications` (`application_id`, `full_name`, `email`, `phone_number`, `insurance_type`, `application_date`) VALUES
(1, 'Water Weight', 'waterweight@gmail.com', '09123456789', 'High Trust Life', '2023-07-16 21:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `investment_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `investment_amount` decimal(10,2) NOT NULL,
  `investment_duration` int(11) NOT NULL,
  `investment_purpose` varchar(255) NOT NULL,
  `investment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`investment_id`, `full_name`, `email`, `phone_number`, `investment_amount`, `investment_duration`, `investment_purpose`, `investment_date`) VALUES
(1, 'Water Weight', 'waterweight@gmail.com', '09123456789', 1000000.00, 36, 'House and Lot', '2023-07-16 21:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `loan_applications`
--

CREATE TABLE `loan_applications` (
  `application_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `loan_amount` decimal(10,2) NOT NULL,
  `loan_term` int(11) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `file` varbinary(1000) DEFAULT NULL,
  `application_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan_applications`
--

INSERT INTO `loan_applications` (`application_id`, `full_name`, `email`, `phone_number`, `loan_amount`, `loan_term`, `purpose`, `file`, `application_date`) VALUES
(1, 'Water Weight', 'waterweight@gmail.com', '09123456789', 150000.00, 6, 'business', '', '2023-07-16 21:03:27'),
(2, 'Water Weight', 'waterweight@gmail.com', '09123456789', 150000.00, 6, 'business', '', '2023-07-16 21:05:07'),
(5, 'Hazel ann bautista baong', 'hazel.baong@gmail.com', '+639150697910', 30000.00, 24, 'Tuition Fee', 0x4c6f616e5f41677265656d656e745f42616f6e672e706466, '2023-07-18 21:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_user_num` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `option_selected` varchar(20) NOT NULL,
  `payment_amount` double NOT NULL,
  `cref_num` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_user_num`, `category`, `option_selected`, `payment_amount`, `cref_num`, `name`, `email`, `payment_date`) VALUES
(7, '201810045', 'Cable/Internet', 'CIGNAL', 1500, '2020-00011-MN-9', NULL, 'firellynapostle@gmail.com', '2023-07-18 04:17:51'),
(8, '201810045', 'Cable/Internet', 'GLOBE AT HOME', 2300, '2022-12344-MN-0', NULL, 'maximaxcruz@gmail.com', '2023-07-18 04:23:01'),
(10, '201810045', 'Electric Utilities', 'eu_option', 136, 'CNN-1243-534535', NULL, 'meme@gmail.com', '2023-07-18 04:29:26'),
(11, '201810045', 'Government', 'gv_option', 500, 'PSA-232413-34234', '', 'hazel.baong@gmail.com', '2023-07-18 04:34:47'),
(12, '201810045', 'Health Care', 'gv_option', 10000, 'TDH-qw323213-12313', 'Hazel Ann Baong', 'hazelann@gmail.com', '2023-07-18 04:38:46'),
(13, '201810045', 'Health Care', 'gv_option', 12333, 'M-ewe-12313', '', 'meme@gmail.com', '2023-07-18 04:39:37'),
(14, '201810045', 'Health Care', 'hc_option', 4334, '342413124', '', 'ahahah@gmail.com', '2023-07-18 04:40:37'),
(15, '201810045', 'Health Care', 'hc_option', 122313, '1231311', '', 'akoako@gmail.com', '2023-07-18 04:42:42'),
(16, '201810045', 'Health Care', 'FORTUNE MEDICARE', 12345, 'FM-123456789', '', 'fatima@yahoo.com', '2023-07-18 04:46:12'),
(17, '201810045', 'Telecoms', 'GLOBE POSTPAID', 500, 'GB-sfhrei8349213', NULL, 'firellyna@gmail.com', '2023-07-18 04:50:23'),
(18, '201810045', 'Water Utilities', 'MAYNILAD', 1000, 'MYN-123456789', NULL, 'hazellyn@gmail.com', '2023-07-18 04:54:02'),
(20, '201810045', 'Cable/Internet', 'CONVERGE ICT', 1000, 'CICT-2023719-1000', NULL, 'hazel.baong@gmail.com', '2023-07-19 21:25:13'),
(21, '201810045', 'Cable/Internet', 'CONVERGE ICT', 1000, 'CICT-2023719-1000', NULL, 'hazel.baong@gmail.com', '2023-07-19 21:25:40'),
(22, '201810045', 'Cable/Internet', 'CONVERGE ICT', 1000, 'CICT-2023719-1000', NULL, 'hazel.baong@gmail.com', '2023-07-19 21:27:00'),
(23, '201810045', 'Cable/Internet', 'CONVERGE ICT', 500, 'CICT-2023719-500', NULL, 'hazel.me@gmail.com', '2023-07-19 21:29:48'),
(24, '201810045', 'Cable/Internet', 'SKY FIBER', 400, 'SFBR-7192023-004', NULL, 'marya@gmail.com', '2023-07-19 21:32:06'),
(25, '201810045', 'Cable/Internet', 'SKY FIBER', 400, 'SFBR-7192023-004', NULL, 'marya@gmail.com', '2023-07-19 21:32:45'),
(26, '201810045', 'Cable/Internet', 'SKY FIBER', 400, 'SFBR-7192023-004', NULL, 'marya@gmail.com', '2023-07-19 21:34:52'),
(27, '201810045', 'Cable/Internet', 'SKY FIBER', 400, 'SFBR-7192023-004', NULL, 'marya@gmail.com', '2023-07-19 21:35:24'),
(28, '201810045', 'Cable/Internet', 'SKY FIBER', 400, 'SFBR-7192023-004', NULL, 'marya@gmail.com', '2023-07-19 21:36:50'),
(29, '201810045', 'Cable/Internet', 'SKY FIBER', 400, 'SFBR-7192023-004', NULL, 'marya@gmail.com', '2023-07-19 21:38:53'),
(30, '201810045', 'Cable/Internet', 'SKY FIBER', 400, 'SFBR-7192023-004', NULL, 'marya@gmail.com', '2023-07-19 21:40:11'),
(31, '201810045', 'Cable/Internet', 'SKY FIBER', 400, 'SFBR-7192023-004', NULL, 'marya@gmail.com', '2023-07-19 21:43:50'),
(32, '201810045', 'Cable/Internet', 'CONVERGE ICT', 500, 'CICT-719-500-2023', NULL, 'hesli@gmail.com', '2023-07-19 21:59:46'),
(33, '201810045', '', 'SKY FIBER', 300, 'SFBR-719-003-23', NULL, 'kitkat@gmail.com', '2023-07-19 22:01:07'),
(34, '201810045', 'Cable/Internet', 'GLOBE AT HOME', 1000, 'GATH-0001-719-23', NULL, 'hazel@gmail.com', '2023-07-19 22:03:21'),
(35, '201810045', 'Cable/Internet', 'CIGNAL', 500, 'CNL-005-719-23', NULL, 'panda@yahoo.com', '2023-07-19 22:12:01'),
(36, '201810045', 'Electric Utilities', 'MERALCO', 500, 'MRC-005-719-OAE', NULL, 'hazellyn@yahoo.com', '2023-07-19 22:16:58'),
(37, '201810045', 'Water Utilities', 'MANILA WATER', 100, 'MNL-001-197-WTR', NULL, 'gwuiying@gmail.com', '2023-07-19 22:18:15'),
(38, '201810045', 'Telecoms', 'PLDT', 300, 'PL-003-719-DT', NULL, 'edgarm@yahoo.com', '2023-07-19 22:20:34'),
(39, '201810045', 'Government', 'LTFRB', 800, 'LTF-008-2320-719', 'JM Dacanay', 'jmd@gmail.com', '2023-07-19 22:21:57'),
(40, '201810045', 'Health Care', 'KONSULTAMD', 1300, 'KMD-719-3001-TA', 'Ashy Mae R. Bautista', 'asmr_b@gmail.com', '2023-07-19 22:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `from_account` varchar(255) NOT NULL,
  `from_accountnum` varchar(20) NOT NULL,
  `to_account` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `transaction_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `from_account`, `from_accountnum`, `to_account`, `amount`, `purpose`, `transaction_date`) VALUES
(1, 'Water Weight', '', 'Hazel Ann Baong', 20000.00, 'Rental Payment ', '2023-07-16 21:14:23'),
(2, 'Water Weight', '', 'Hazel Ann Baong', 20000.00, 'Rental Payment ', '2023-07-16 21:14:49'),
(3, 'Hazel Ann', '', 'Trevor Liam', 1000.00, 'Food', '2023-07-17 01:59:57'),
(4, 'Water Weight', '123456789', '201810045', 25000.00, 'Tuition Fee', '2023-07-20 00:13:59'),
(5, 'Water Weight', '123456789', '201810045', 5000.00, 'Birthday Gift', '2023-07-20 00:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `mobile_number`, `account_number`, `password`, `registration_date`) VALUES
(1, 'Water', 'Weight', 'waterweight@gmail.com', '09123456789', '123456789', '$2y$10$YdUVVIGT7un44qLB2lQEPO6HQtF/z0xc7fMf07JEBFskQ9LahXv3G', '2023-07-16 12:33:58'),
(2, 'Hazel Ann', 'Baong', 'hazel.baong@gmail.com', '09150697910', '201810045', '$2y$10$zjZzS34G2uAXju5FVp9vWecyQoYGYstgAgmGKCqzFqxT0kr3M3Eu.', '2023-07-16 15:20:11'),
(3, 'Admin', 'Admin', 'administrator@gmail.com', '00000000001', 'ADMIN-001', '$2y$10$ENRptQGCEFcq89yf7G9Zc.QkIuMs.hDqenj4Pd3ZeK8mwBOeUfm.m', '2023-07-19 16:49:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bankaccount_information`
--
ALTER TABLE `bankaccount_information`
  ADD PRIMARY KEY (`ba_id`);

--
-- Indexes for table `insurance_applications`
--
ALTER TABLE `insurance_applications`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`investment_id`);

--
-- Indexes for table `loan_applications`
--
ALTER TABLE `loan_applications`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bankaccount_information`
--
ALTER TABLE `bankaccount_information`
  MODIFY `ba_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `insurance_applications`
--
ALTER TABLE `insurance_applications`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `investment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loan_applications`
--
ALTER TABLE `loan_applications`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
