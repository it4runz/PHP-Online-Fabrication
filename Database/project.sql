-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2018 at 08:52 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_sales`
--

CREATE TABLE `admin_sales` (
  `bill_no` varchar(30) NOT NULL,
  `uid` varchar(30) NOT NULL,
  `total_amt` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `uid` varchar(30) NOT NULL,
  `item_no` varchar(30) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_sp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_info`
--

CREATE TABLE `item_info` (
  `item_no` varchar(30) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_img` varchar(30) NOT NULL,
  `item_decp` text NOT NULL,
  `item_cp` varchar(30) NOT NULL,
  `item_sp` varchar(30) NOT NULL,
  `utem_qty` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_info`
--

INSERT INTO `item_info` (`item_no`, `item_name`, `item_img`, `item_decp`, `item_cp`, `item_sp`, `utem_qty`) VALUES
('257', 'window', 'img.jpg', 'this is green rose with beautiful fragnence and the world\'s best rose u have ever seen before this is green rose with beautiful fragnence and the world\'s best rose u have ever seen before this is green rose with beautiful fragnence and the world\'s best rose u have ever seen before ', '89', '100', '80'),
('909', 'Gate', 'img2.jpg', 'ksaxzncxm,', '90', '100', '80'),
('9092', 'Bed', 'img3.jpg', 'this is violet rose', '30', '80', '900');

-- --------------------------------------------------------

--
-- Table structure for table `pharmainfo`
--

CREATE TABLE `pharmainfo` (
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT 'yes',
  `pic` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmainfo`
--

INSERT INTO `pharmainfo` (`fname`, `lname`, `email`, `address`, `password`, `uid`, `active`, `pic`) VALUES
('shubham', 'patel', 'admin@admin.com', 'x-402 shukhdham recidency', '21232f297a57a5a743894a0e4a801fc3', '64640', 'yes', 'img.jpg'),
('shubham', 'patel', 'shubham@patel.com', 'x-402 shukhdham ', '21232f297a57a5a743894a0e4a801fc3', '60887', 'yes', 'download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sales12015`
--

CREATE TABLE `sales12015` (
  `bill_no` varchar(30) NOT NULL,
  `item` varchar(30) NOT NULL,
  `total_amt` varchar(30) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales56159`
--

CREATE TABLE `sales56159` (
  `bill_no` varchar(30) NOT NULL,
  `item` varchar(30) NOT NULL,
  `total_amt` varchar(30) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales60887`
--

CREATE TABLE `sales60887` (
  `bill_no` varchar(30) NOT NULL,
  `item` varchar(30) NOT NULL,
  `total_amt` varchar(30) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales64640`
--

CREATE TABLE `sales64640` (
  `bill_no` varchar(30) NOT NULL,
  `item` varchar(30) NOT NULL,
  `total_amt` varchar(30) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_sales`
--
ALTER TABLE `admin_sales`
  ADD PRIMARY KEY (`bill_no`);

--
-- Indexes for table `item_info`
--
ALTER TABLE `item_info`
  ADD PRIMARY KEY (`item_no`);

--
-- Indexes for table `pharmainfo`
--
ALTER TABLE `pharmainfo`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
