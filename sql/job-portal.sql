-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2021 at 02:39 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job-portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `citizens`
--

CREATE TABLE `citizens` (
  `uid` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citizens`
--

INSERT INTO `citizens` (`uid`, `name`, `contact`, `address`, `city`, `state`, `pic`, `email`) VALUES
('9898989898', 'PQR', '9898989898', 'abcdefghijklmnopqrstuwxyz', ' Anakapalle ', 'Andhra Pradesh', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `citizenUid` varchar(100) DEFAULT NULL,
  `workerUid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`citizenUid`, `workerUid`) VALUES
('9898989898', '6655778899');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `rid` int(11) NOT NULL,
  `cust_uid` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `problem` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `dop` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`rid`, `cust_uid`, `category`, `problem`, `location`, `city`, `state`, `dop`) VALUES
(2, '9898989898', 'Carpenter', 'ha ha ', 'abcdefghijklmnopqrstuwxyz', ' Anakapalle ', 'Andhra Pradesh', '2021-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pwd` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `dos` date DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `email`, `pwd`, `category`, `dos`, `mobile`, `status`) VALUES
('6655778899', 'abcd@gmail.com', 'abcdefgh@1234', 'WORKER', '2021-08-03', '6655778899', 1),
('8888888888', NULL, 'abcdefgh@1234', 'ADMIN', '2021-08-03', '8888888888', 1),
('9898989898', '', 'abcdefgh@1234', 'CITIZEN', '2021-08-03', '9898989898', 1);

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `uid` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `wname` varchar(100) DEFAULT NULL,
  `cnumber` varchar(100) DEFAULT NULL,
  `firmshop` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `stat` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `spl` varchar(100) DEFAULT NULL,
  `exp` varchar(100) DEFAULT NULL,
  `otherinfo` varchar(100) DEFAULT NULL,
  `apic` varchar(100) DEFAULT NULL,
  `ppic` varchar(100) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`uid`, `email`, `wname`, `cnumber`, `firmshop`, `city`, `address`, `stat`, `category`, `spl`, `exp`, `otherinfo`, `apic`, `ppic`, `total`, `count`) VALUES
('6655778899', 'abcd@gmail.com', 'worker', '6655778899', 'lorem ipsum', ' South Delhi ', 'abcdefgh', 'Delhi', 'Carpenter', 'ss', '4', 'ss', '6655778899.png', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citizens`
--
ALTER TABLE `citizens`
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
