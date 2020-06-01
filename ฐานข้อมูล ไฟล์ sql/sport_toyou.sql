-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 09:04 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cartstock_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `sp_member_dt`
--

CREATE TABLE `sp_member_dt` (
  `member_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `member_username` varchar(50) NOT NULL,
  `member_password` varchar(50) NOT NULL,
  `member_fullname` varchar(150) NOT NULL,
  `member_email` varchar(250) NOT NULL,
  `member_tel` int(20) NOT NULL,
  `member_address` text NOT NULL,
  `member_status` enum('0','1') NOT NULL DEFAULT '0',
  `titlename_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `member_photo` varchar(120) NOT NULL,
  `member_datesave` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sp_member_dt`
--

INSERT INTO `sp_member_dt` (`member_id`, `member_username`, `member_password`, `member_fullname`, `member_email`, `member_tel`, `member_address`, `member_status`, `titlename_id`, `member_photo`, `member_datesave`) VALUES
(00001, 'admin', '123456', 'admin firstmember', 'admin@hotmail.com', 12345678, 'thailand', '1', 001, 'Member_5ed0c4ab5dbee.png', '2020-05-29 15:15:39'),
(00002, 'user', '123456', 'user user', 'user@gmail.com', 23456789, 'thailand', '0', 001, 'Member_5ed2a0357df78.png', '2020-05-31 01:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `sp_orderdetail_dt`
--

CREATE TABLE `sp_orderdetail_dt` (
  `detail_id` int(10) NOT NULL,
  `order_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `product_id` int(7) UNSIGNED ZEROFILL NOT NULL,
  `product_qty` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sp_order_dt`
--

CREATE TABLE `sp_order_dt` (
  `order_id` int(2) NOT NULL,
  `order_status` enum('0','1') NOT NULL DEFAULT '0',
  `member_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `order_slip` varchar(150) NOT NULL,
  `order_datesave` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sp_producttype_dt`
--

CREATE TABLE `sp_producttype_dt` (
  `producttype_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `producttype_detail` varchar(100) NOT NULL,
  `producttype_datesave` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sp_product_dt`
--

CREATE TABLE `sp_product_dt` (
  `product_id` int(7) UNSIGNED ZEROFILL NOT NULL,
  `product_topic` varchar(100) NOT NULL,
  `product_detail` text NOT NULL,
  `product_price` decimal(30,2) NOT NULL,
  `product_quantity` int(20) NOT NULL DEFAULT 0,
  `product_filename` varchar(150) NOT NULL,
  `product_status` enum('0','1') NOT NULL DEFAULT '0',
  `producttype_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_datesave` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sp_titlename_dt`
--

CREATE TABLE `sp_titlename_dt` (
  `titlename_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `titlename_detail` varchar(250) NOT NULL,
  `titlename_datesave` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sp_titlename_dt`
--

INSERT INTO `sp_titlename_dt` (`titlename_id`, `titlename_detail`, `titlename_datesave`) VALUES
(001, 'นาย', '2020-05-28 03:43:31'),
(002, 'นางสาว', '2020-05-28 03:43:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sp_member_dt`
--
ALTER TABLE `sp_member_dt`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `member_username` (`member_username`),
  ADD UNIQUE KEY `member_fullname` (`member_fullname`),
  ADD UNIQUE KEY `member_email` (`member_email`),
  ADD UNIQUE KEY `member_tel` (`member_tel`);

--
-- Indexes for table `sp_orderdetail_dt`
--
ALTER TABLE `sp_orderdetail_dt`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `sp_order_dt`
--
ALTER TABLE `sp_order_dt`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `sp_producttype_dt`
--
ALTER TABLE `sp_producttype_dt`
  ADD PRIMARY KEY (`producttype_id`),
  ADD UNIQUE KEY `producttype_detail` (`producttype_detail`);

--
-- Indexes for table `sp_product_dt`
--
ALTER TABLE `sp_product_dt`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_topic` (`product_topic`);

--
-- Indexes for table `sp_titlename_dt`
--
ALTER TABLE `sp_titlename_dt`
  ADD PRIMARY KEY (`titlename_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sp_member_dt`
--
ALTER TABLE `sp_member_dt`
  MODIFY `member_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sp_orderdetail_dt`
--
ALTER TABLE `sp_orderdetail_dt`
  MODIFY `detail_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp_order_dt`
--
ALTER TABLE `sp_order_dt`
  MODIFY `order_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp_producttype_dt`
--
ALTER TABLE `sp_producttype_dt`
  MODIFY `producttype_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp_product_dt`
--
ALTER TABLE `sp_product_dt`
  MODIFY `product_id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp_titlename_dt`
--
ALTER TABLE `sp_titlename_dt`
  MODIFY `titlename_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
