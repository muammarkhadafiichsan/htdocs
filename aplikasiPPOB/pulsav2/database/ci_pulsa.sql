-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 05:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_pulsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `email`, `password`, `active`) VALUES
(1, 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(2, 'adhe@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `operator_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `operator_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`operator_id`, `admin_id`, `operator_name`, `active`) VALUES
(12, 2, 'XL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `price_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `buy_price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`price_id`, `admin_id`, `operator_id`, `price`, `buy_price`, `sell_price`, `active`) VALUES
(22, 2, 12, 10000, 10500, 11000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL,
  `setting_code` varchar(255) NOT NULL,
  `setting_value` varchar(255) NOT NULL,
  `setting_description` text NOT NULL,
  `setting_group` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `setting_code`, `setting_value`, `setting_description`, `setting_group`, `active`) VALUES
(1, 'format_datetime_js', 'DD/MM/YYYY HH:mm:ss', 'When you change the format datetime, you must also update:\r\n- format_datetime_js\r\n- format_datetime_php\r\n- format_datetime_sql', '', 1),
(2, 'format_datetime_php', 'd/m/Y H:i:s', 'When you change the format datetime, you must also update:\r\n- format_datetime_js\r\n- format_datetime_php\r\n- format_datetime_sql', '', 1),
(3, 'format_datetime_sql', '%d-%m-%Y %H:%i:%s', 'When you change the format datetime, you must also update:\r\n- format_datetime_js\r\n- format_datetime_php\r\n- format_datetime_sql', '', 1),
(4, 'format_date_js', 'DD/MM/YYYY', 'When you change the format date, you must also update:\r\n- format_date_js\r\n- format_date_php\r\n- format_date_sql', '', 1),
(5, 'format_date_php', 'd/m/Y', 'When you change the format date, you must also update:\r\n- format_date_js\r\n- format_date_php\r\n- format_date_sql', '', 1),
(6, 'format_date_sql', '%d-%m-%Y', 'When you change the format date, you must also update:\r\n- format_date_js\r\n- format_date_php\r\n- format_date_sql', '', 1),
(7, 'label_active', '1', '', 'status_active', 1),
(8, 'label_inactive', '0', '', 'status_active', 1),
(9, 'transactions_label_status_paid', '1', '', 'transaction_status', 1),
(10, 'transactions_label_status_unpaid', '2', '', 'transaction_status', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `price_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `buy_price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `transaction_date`, `admin_id`, `name`, `phone_number`, `operator_id`, `price_id`, `price`, `buy_price`, `sell_price`, `status`) VALUES
(1, '2019-06-30 16:23:03', 1, 'ega', '089648934873', 2, 6, 25000, 23000, 25000, 1),
(2, '2019-06-30 16:24:15', 1, 'adhe', '089648934873', 3, 10, 25000, 23000, 25000, 1),
(3, '2019-07-01 16:49:41', 2, 'adhe', '087791702441', 11, 21, 10000, 10500, 11000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`operator_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `operator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
