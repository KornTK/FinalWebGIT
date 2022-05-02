-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 01:29 PM
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
  `user_id` int(11) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, '14/1/2022', '11.30', 'ใต้อาคาร6', 'COC', 'MOLO-ATK', 100),
(2, '20/1/2022', '13.30', 'เล้าไก่', 'FHT', 'SINO-ATK', 50);

-- --------------------------------------------------------

--
-- Table structure for table `atk_test`
--

CREATE TABLE `atk_test` (
  `AT_ID` int(10) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `result` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `atk_test`
--

INSERT INTO `atk_test` (`AT_ID`, `user_id`, `Date`, `result`) VALUES
(1, '6330611007', '15/1/2022', 'ไม่ติดเชื้อ (1ขีด)'),
(2, '6330611008', '15/1/2022', 'ไม่ติดเชื้อ (1ขีด)'),
(3, '6330611009', '15/1/2022', 'ติดเชื้อ (2ขีด)'),
(4, '6330611007', '30/1/2022', 'ไม่ติดเชื้อ (1ขีด)');

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `Log_ID` int(10) NOT NULL,
  `admin_ID` int(11) NOT NULL,
  `user_id` int(12) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `IP` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `img` varchar(100) NOT NULL,
  `VL_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `prefix`, `name`, `lname`, `Email`, `password`, `sex`, `phone`, `faculty`, `img`, `VL_ID`) VALUES
('63306110024', 'นางสาว', 'แพรวพรรณ', 'ไกรศรีสมบัติ', 's6330611024@email.psu.ac.th', 'ppkssb', 'หญิง', '0935597329', 'FHT', '6330611024.jpg', 3),
('6330611007', 'นาย', 'ธนกร', 'ประสมกิจ', 's6330611007@email.psu.ac.th', 'pokde111', 'ชาย', '0612249615', 'CoC', '6330611007.jpg', 1),
('6330611008', 'นาย', 'จิมาละ', 'โนโน', 's63306110055@email.psu.ac.th', 'opo111', 'ชาย', '0614224422', 'FHT', '6330611011.jpg', 2),
('6330611009', 'นางสาว', 'มนัสนันท์', 'ไกรโกญน์จนาถ', 's6330611008@email.psu.ac.th', 'p110644', 'หญิง', '0950215004', 'CoC', '6330611008.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `vacc_log`
--

CREATE TABLE `vacc_log` (
  `VL_ID` int(10) NOT NULL,
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
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`Log_ID`);

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
  MODIFY `Book_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `atk_open`
--
ALTER TABLE `atk_open`
  MODIFY `atopen_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `atk_test`
--
ALTER TABLE `atk_test`
  MODIFY `AT_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `Log_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacc_log`
--
ALTER TABLE `vacc_log`
  MODIFY `VL_ID` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
