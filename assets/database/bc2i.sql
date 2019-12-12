-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 02:55 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bc2i`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `adminid` varchar(15) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `adminid`, `password`) VALUES
(1, 'Sachin', 'BC2ISACH2019', '8970081804Sach$');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `cid` varchar(12) NOT NULL,
  `uid` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `doc` varchar(20) NOT NULL COMMENT 'Date of Complaint',
  `toc` varchar(20) NOT NULL COMMENT 'Time of Complaint',
  `subject` varchar(100) NOT NULL,
  `doi` varchar(20) NOT NULL COMMENT 'Date of Incident',
  `toi` varchar(20) NOT NULL COMMENT 'Time of Incident',
  `type` varchar(20) NOT NULL COMMENT 'Type of Crime',
  `complaint` text NOT NULL,
  `status_num` int(11) NOT NULL DEFAULT 1 COMMENT 'Status number  1 - Pending  2-Case Filed ',
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `cid`, `uid`, `email`, `doc`, `toc`, `subject`, `doi`, `toi`, `type`, `complaint`, `status_num`, `status`) VALUES
(27, '20191211W1PK', 22, 'satish@gmail.com', '11/12/2019', '10:11:08am', 'something happened at some place ', '2019-11-23', '08:56', 'Hacking', 'dsfgerytrsyr', 2, 'Case Filed');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL DEFAULT 1,
  `visits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `visits`) VALUES
(1, 68);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `num_comp` int(11) NOT NULL DEFAULT 0 COMMENT 'this is set after the complaint  has been registered by the user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `email`, `password`, `sex`, `dob`, `phone`, `num_comp`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', 'm', '01-01-01', NULL, 0),
(14, 'Sachin S Koparde', 'contactsachinkoparde@gmail.com', '1234', '', '', '8970081804', 0),
(22, 'Satish', 'satish@gmail.com', '123456', '', '', '8974458945', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
