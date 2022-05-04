-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 11:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_atk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251');

-- --------------------------------------------------------

--
-- Table structure for table `atk_booking`
--

CREATE TABLE `atk_booking` (
  `Book_ID` int(10) NOT NULL,
  `atopen_id` int(10) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `atk_booking`
--

INSERT INTO `atk_booking` (`Book_ID`, `atopen_id`, `user_id`, `Date`, `time`) VALUES
(2, 1, '6330611007', '2022-05-04', '13.30-14.00'),
(4, 1, 'ุ6530611003', '2022-05-06', '13.00-15.30'),
(5, 23, 'ุ6530611003', '2022-05-06', ' 13.00-15.30 '),
(6, 28, '6330611008', '2022-05-06', '13.00-15.30'),
(7, 26, '6330611008', '2022-05-03', '12.00-13.00'),
(8, 26, '6330611008', '2022-05-03', '12.00-13.00'),
(9, 26, '6330611008', '2022-05-03', '12.00-13.00'),
(10, 26, '6330611008', '2022-05-03', '12.00-13.00'),
(11, 26, '6330611008', '2022-05-03', '12.00-13.00'),
(12, 26, '6330611008', '2022-05-03', '12.00-13.00'),
(13, 26, '6330611008', '2022-05-03', '12.00-13.00'),
(14, 26, '6330611008', '2022-05-03', '12.00-13.00');

-- --------------------------------------------------------

--
-- Table structure for table `atk_open`
--

CREATE TABLE `atk_open` (
  `atopen_id` int(10) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `atk_open`
--

INSERT INTO `atk_open` (`atopen_id`, `date`, `time`, `location`, `faculty`, `brand`, `amount`) VALUES
(26, '2022-05-03', '12.00-13.00', 'ตึก 1', 'CoC', 'สุดยอด ATK', 8),
(27, '2022-05-05', '13.00-15.30', 'ตึก 222', 'CoC', 'นาสิ atk', 10),
(28, '2022-05-06', '13.00-15.30', 'ตึก 1', 'FHT', 'ซิโนยิ้ม atk', 10),
(29, '2022-05-07', '13.00-15.30', 'ตึก 7', 'FHT', 'ซิโนยิ้ม atk', 100),
(31, '2022-05-07', '13.00-15.30', 'ตึก 7', 'FHT', 'สุดยอด ATK', 100),
(32, '2022-05-05', '13.00-15.30', 'ตึก 222', 'CoC', 'นาสิ atk', 10),
(33, '2022-05-05', '13.00-15.30', 'ตึก 222', 'CoC', 'นาสิ atk', 10);

-- --------------------------------------------------------

--
-- Table structure for table `atk_test`
--

CREATE TABLE `atk_test` (
  `AT_ID` int(10) NOT NULL,
  `atopen_id` int(10) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `result` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `atk_test`
--

INSERT INTO `atk_test` (`AT_ID`, `atopen_id`, `user_id`, `Date`, `result`) VALUES
(8, 1, '6330611007', '2022-05-04', 'ไม่ติดเชื้อ (1ขีด) '),
(9, 1, '6330611009', '2022-05-07', ' ติดเชื้อ (2ขีด)'),
(10, 1, '6330611009', '2022-05-06', 'ไม่ติดเชื้อ (1ขีด) '),
(11, 1, '6330611009', '2022-04-30', 'ไม่ติดเชื้อ (1ขีด) '),
(12, 2, '6330611007', '2022-05-07', 'ไม่ติดเชื้อ (1ขีด) '),
(14, 1, '6330611009', '2022-04-30', 'ไม่ติดเชื้อ (1ขีด) '),
(15, 1, '6330611009', '2022-04-30', 'ไม่ติดเชื้อ (1ขีด) ');

-- --------------------------------------------------------

--
-- Table structure for table `report_date`
--

CREATE TABLE `report_date` (
  `report_id` int(10) NOT NULL,
  `p1` varchar(100) NOT NULL,
  `p2` varchar(100) NOT NULL,
  `p3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report_date`
--

INSERT INTO `report_date` (`report_id`, `p1`, `p2`, `p3`) VALUES
(1, '2022-05-07', '2022-04-30', '2022-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `system_setting`
--

CREATE TABLE `system_setting` (
  `sys_id` int(10) NOT NULL,
  `name_setting` varchar(100) NOT NULL,
  `book_atk_allow` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_setting`
--

INSERT INTO `system_setting` (`sys_id`, `name_setting`, `book_atk_allow`) VALUES
(1, 'main', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(20) NOT NULL,
  `prefix` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `prefix`, `name`, `lname`, `Email`, `password`, `sex`, `phone`, `faculty`, `img`) VALUES
('6330611007', 'นาย', 'ธนกร ', 'ประสมกิจ', 's6330611007@email.psu.ac.th', '1234', 'ชาย', '09876543211', 'CoC', '6330611007.jpg'),
('6330611008', 'นางสาว', 'มนัสนันท์', 'ไกรโกญน์จนาถ', 's6330611008@email.psu.ac.th', '1234', 'หญิง', '0950215004', 'CoE', '6330611008.jpg'),
('6330611099', 'นาย', 'ธนานิน', 'มาจิกา', 's6330611005@email.psu.ac.th', '1234', 'ชาย', '0612340912', 'CoC', '6330611005.jpg'),
('64052959245', 'นาง', 'สานิโร', 'โรสเมรี่', 's64052959245@email.psu.ac.th', '1234', 'หญิง', '0645781945', 'FIS', '64052959245.png');

-- --------------------------------------------------------

--
-- Table structure for table `vacc_log`
--

CREATE TABLE `vacc_log` (
  `VL_ID` int(10) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `vacnum` int(8) NOT NULL,
  `vac1` varchar(100) NOT NULL,
  `vac2` varchar(100) NOT NULL,
  `vac3` varchar(100) NOT NULL,
  `vac4` varchar(100) NOT NULL,
  `vac5` varchar(100) NOT NULL,
  `vac6` varchar(100) NOT NULL,
  `vac7` varchar(100) NOT NULL,
  `vac8` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vacc_log`
--

INSERT INTO `vacc_log` (`VL_ID`, `Email`, `vacnum`, `vac1`, `vac2`, `vac3`, `vac4`, `vac5`, `vac6`, `vac7`, `vac8`) VALUES
(1, 's6330611008@email.psu.ac.th', 8, 'Moderna', 'Sputnik V', 'JnJ', 'Moderna', 'Sinopharm', 'Sputnik V', 'Astrazeneca', 'Sinovac'),
(2, 's6330611005@email.psu.ac.th', 2, 'ซิโนแวก', 'J&T', '', '', '', '', '', ''),
(3, 's6330611003@email.psu.ac.th', 2, 'ซิโนแวก', 'ซิโนแวก', '', '', '', '', '', ''),
(9, 's64052959245@email.psu.ac.th', 2, 'JnJ', 'Moderna', '', '', '', '', '', ''),
(10, 's6330611007@email.psu.ac.th', 4, 'Sinovac', 'Sinovac', 'Astrazeneca', 'Pfizer', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atk_booking`
--
ALTER TABLE `atk_booking`
  ADD PRIMARY KEY (`Book_ID`);

--
-- Indexes for table `atk_open`
--
ALTER TABLE `atk_open`
  ADD PRIMARY KEY (`atopen_id`);

--
-- Indexes for table `atk_test`
--
ALTER TABLE `atk_test`
  ADD PRIMARY KEY (`AT_ID`);

--
-- Indexes for table `report_date`
--
ALTER TABLE `report_date`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `system_setting`
--
ALTER TABLE `system_setting`
  ADD PRIMARY KEY (`sys_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vacc_log`
--
ALTER TABLE `vacc_log`
  ADD PRIMARY KEY (`VL_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `atk_booking`
--
ALTER TABLE `atk_booking`
  MODIFY `Book_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `atk_open`
--
ALTER TABLE `atk_open`
  MODIFY `atopen_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `atk_test`
--
ALTER TABLE `atk_test`
  MODIFY `AT_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `report_date`
--
ALTER TABLE `report_date`
  MODIFY `report_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_setting`
--
ALTER TABLE `system_setting`
  MODIFY `sys_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vacc_log`
--
ALTER TABLE `vacc_log`
  MODIFY `VL_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
