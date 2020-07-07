-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 10:53 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websmartdoor`
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
(51, '101', '00000000', '00000010', '10', '100', '33', '2020-07-01', '0000-00-00', '1', '07'),
(52, '102', '00000000', '00000020', '20', '100', '35', '2020-07-01', '0000-00-00', '1', '07'),
(56, '103', '00000000', '00000030', '30', '100', '36', '2020-07-01', '0000-00-00', '1', '07'),
(57, '104', '00000000', '00000040', '40', '100', '37', '2020-07-01', '0000-00-00', '1', '07');

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
  `address_user` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `member` (`id_mem`, `user`, `address_user`, `pass`, `img_user`, `status_member`, `email_user`, `phone_user`, `room`) VALUES
(33, 'สิงหา  ดวงแก้ว', 'อ.แม่จัน จ.เชียงราย', '1234', 'profile_01072020013830_mem.jpg', '2', 'singha@hotmail.com', '0966791113', '101'),
(34, 'admin', '', 'admin', 'profile_01072020014047_mem.jpg', '1', 'admin', 'admin', '-'),
(35, 'อนุชิต ดอยไพรสณฑณ์', 'อ.เมือง จ.ตาก', '1234', 'profile_01072020014212_mem.jpg', '2', 'anuchit@hotmail.com', '0966791113', '102'),
(36, 'กณพ เชี่ยววัฒนกุล', 'จ.พะเยา อ.จุน', '1234', 'profile_01072020014450_mem.jpg', '2', 'tor@hotmail.com', '0966791113', '103'),
(37, 'อรงกรณ์ เวียงชัย', 'อ.เมื่อง จ.เชียงราย', '1234', 'profile_01072020014822_mem.jpg', '2', 'mos@hotmail.com', '0966791113', '104');

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
(2, '102', '2', '00000000'),
(3, '103', '2', '00000000'),
(4, '104', '2', '00000000'),
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
(3, '50', 'img_01072020003554_s', '1'),
(4, '50', 'img_01072020004049_s', '1'),
(5, '50', 'img_01072020005307_s', '1'),
(6, '50', 'img_01072020005336_s', '1'),
(7, '50', 'img_01072020010104_s', '1'),
(8, '50', 'img_01072020010122_s', '1'),
(9, '50', 'img_01072020010131_s', '1'),
(10, '50', 'img_01072020010135_s', '1'),
(11, '50', 'img_01072020010208_s', '1'),
(12, '50', 'img_01072020010247_s', '1'),
(13, '50', 'img_01072020010350_s', '1'),
(14, '50', 'img_01072020010425_s', '1'),
(15, '50', 'img_01072020010703_s', '1'),
(16, '50', 'img_01072020010736_s', '1'),
(17, '50', 'img_01072020010748_s', '1'),
(18, '50', 'img_01072020010931_s', '1'),
(19, '50', 'img_01072020011208_s', '1'),
(20, '50', 'img_01072020011251_s', '1'),
(21, '50', 'img_01072020011407_s', '1');

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
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `amount`
--
ALTER TABLE `amount`
  MODIFY `id_amount` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_mem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71233;

--
-- AUTO_INCREMENT for table `send_money`
--
ALTER TABLE `send_money`
  MODIFY `id_send` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `status_mem`
--
ALTER TABLE `status_mem`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
