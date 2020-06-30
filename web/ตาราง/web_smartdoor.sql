-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/

--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 06:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_smartdoor`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_bill`
--

CREATE TABLE `add_bill` (
  `id_bill` int(11) NOT NULL,
  `room` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `bill_old` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `electricity_bill` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `mitor` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `water_bill` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `member_bill` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_add` date NOT NULL,
  `date_pay` date NOT NULL,
  `status_bill` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `date_m` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_bill`
--

INSERT INTO `add_bill` (`id_bill`, `room`, `bill_old`, `electricity_bill`, `mitor`, `water_bill`, `member_bill`, `date_add`, `date_pay`, `status_bill`, `date_m`) VALUES
(50, '101', '00000000', '00000012', '12', '100', '30', '2020-05-16', '0000-00-00', '1', '05');

-- --------------------------------------------------------

--
-- Table structure for table `amount`
--

CREATE TABLE `amount` (
  `id_amount` int(11) NOT NULL,
  `electricity` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `water` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_mem` int(11) NOT NULL,
  `user` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status_member` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `email_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_user` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `room` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_mem`, `user`, `pass`, `img_user`, `status_member`, `email_user`, `phone_user`, `room`) VALUES
(1, 'admin', 'admin', 'profile_17042020190620_mem.jpg', '1', 'admin', 'admin', '0'),
(30, 'สิงหา  ดวงแก้ว', 'singha', 'profile_15052020183836_mem.jpg', '2', 'singha', '0966791113', '1');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id_room` int(11) NOT NULL,
  `name_room` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status_room` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `mitor` varchar(8) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id_room`, `name_room`, `status_room`, `mitor`) VALUES
(1, '101', '2', '00000000'),
(2, '102', '1', '00000000'),
(3, '103', '1', '00000000'),
(4, '104', '1', '00000000'),
(5, '201', '1', '00000000'),
(6, '202', '1', '00000000'),
(7, '203', '1', '00000000'),
(8, '204', '1', '00000000'),
(9, '205', '1', '00000000');

-- --------------------------------------------------------

--
-- Table structure for table `send_money`
--

CREATE TABLE `send_money` (
  `id_send` int(11) NOT NULL,
  `month_send` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `img_send` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status_send` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `send_money`
--

INSERT INTO `send_money` (`id_send`, `month_send`, `img_send`, `status_send`) VALUES
(1, '50', 'img_16052020181643_s', ''),
(2, '50', 'img_16052020181808_s', '');

-- --------------------------------------------------------

--
-- Table structure for table `status_mem`
--

CREATE TABLE `status_mem` (
  `id_status` int(11) NOT NULL,
  `name_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_mem`
--

INSERT INTO `status_mem` (`id_status`, `name_status`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_bill`
--
ALTER TABLE `add_bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Indexes for table `amount`
--
ALTER TABLE `amount`
  ADD PRIMARY KEY (`id_amount`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_mem`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`);

--
-- Indexes for table `send_money`
--
ALTER TABLE `send_money`
  ADD PRIMARY KEY (`id_send`);

--
-- Indexes for table `status_mem`
--
ALTER TABLE `status_mem`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_bill`
--
ALTER TABLE `add_bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `amount`
--
ALTER TABLE `amount`
  MODIFY `id_amount` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_mem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71233;

--
-- AUTO_INCREMENT for table `send_money`
--
ALTER TABLE `send_money`
  MODIFY `id_send` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_mem`
--
ALTER TABLE `status_mem`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
