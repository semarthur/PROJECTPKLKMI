-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2018 at 04:30 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kmi`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_account` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(16) NOT NULL,
  `Jabatan` enum('Staff','Assistant Manager','Dept Head','') NOT NULL,
  `Departemen` enum('Financial & Acconting','HRD','PR','Information System','Production') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_account`, `email`, `password`, `Jabatan`, `Departemen`) VALUES
(1, 'khairulrizal39@gmail.com', 'qwepoi', 'Staff', 'HRD'),
(2, 'viceheadexternal@gmail.com', 'qwepoi', 'Assistant Manager', 'Financial & Acconting'),
(3, 'sem.hutabarat@gmail.com', 'qwepoi', 'Dept Head', 'Production'),
(4, 'requester4@gmail.com', 'qwepoi', 'Staff', 'Information System'),
(5, 'requester5@gmail.com', 'qwepoi', 'Assistant Manager', 'Information System'),
(6, 'requester6@gmail.com', 'qwepoi', 'Dept Head', 'Information System');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `noticket` int(11) NOT NULL,
  `dari` varchar(20) NOT NULL,
  `untuk` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `kasus` varchar(50) NOT NULL,
  `duty` varchar(50) NOT NULL,
  `dateoec` date NOT NULL,
  `systemint` varchar(300) NOT NULL,
  `urgency` varchar(10) NOT NULL,
  `description` varchar(300) NOT NULL,
  `approvalstatus` enum('Pending','Not Approved','Approved','') NOT NULL,
  `process` enum('Not Processed','On Process','Done','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`noticket`, `dari`, `untuk`, `date`, `kasus`, `duty`, `dateoec`, `systemint`, `urgency`, `description`, `approvalstatus`, `process`) VALUES
(34, 'Sonia (PR)', 'SWD', '2018-07-10', 'LAN / WAN / Communication', 'Problem Solving', '2018-07-10', 'yes', 'immedietly', 'tidak bisa konek internet', 'Pending', 'Not Processed'),
(35, 'Andini (HR)', 'ICT', '2018-07-10', 'Order Catridge / Toner', 'Additional / Change / Delete', '2018-07-10', 'no', 'immedietly', 'Tolong ganti catridge karena sudah habis thx', 'Pending', 'Not Processed'),
(36, 'Hanni (Finance)', 'SWD', '2018-07-10', 'Software Package', 'Installation', '2018-07-11', 'yes', 'normal', 'install software', 'Pending', 'Not Processed'),
(37, 'Rini (PR)', 'ICT', '2018-07-11', 'LAN / WAN / Communication', 'Problem Solving', '2018-07-11', 'yes', 'immedietly', 'tidak bisa konek internet tolong bantu perbaiki thx', 'Pending', 'Not Processed'),
(38, 'Endang (F&A)', 'ICT', '2018-07-11', 'Hardware', 'Service / Repair', '2018-07-14', 'no', 'normal', 'Printer eror padahal driver jalan dan tinta masih banyak', 'Pending', 'Not Processed'),
(40, 'John (M&S)', 'SWD', '2018-07-11', 'System Application', 'Additional / Change / Delete', '2018-08-10', 'yes', 'normal', 'tolong buatkan program untuk rekap data penjualan dari dealer yang ada', 'Pending', 'Not Processed'),
(41, 'Indra (HRD)', 'ICT', '2018-07-11', 'LAN / WAN / Communication', 'Service / Repair', '2018-07-11', 'yes', 'immedietly', 'tidak bisa konek internet', 'Pending', 'Not Processed'),
(102, 'Dini (HR)', 'ICT', '2018-07-11', 'Software Package', 'Installation', '2018-07-11', 'Yes', 'Immedietly', 'Office gak bisa\r\nmohon dibantu thx', 'Pending', 'Not Processed'),
(103, 'Yuni (Produksi)', 'ICT', '2018-07-11', 'Hardware', 'Service / Repair', '2018-08-01', 'no', 'normal', 'Kamera untuk foto pabrik rusak\r\ntolong diperbaiki thx', 'Pending', 'Not Processed');

-- --------------------------------------------------------

--
-- Table structure for table `form_done`
--

CREATE TABLE `form_done` (
  `noticket` int(100) NOT NULL,
  `dari` varchar(20) NOT NULL,
  `untuk` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `kasus` varchar(50) NOT NULL,
  `duty` varchar(50) NOT NULL,
  `dateoec` date NOT NULL,
  `systemint` varchar(300) NOT NULL,
  `urgency` varchar(10) NOT NULL,
  `description` varchar(300) NOT NULL,
  `approvalstatus` varchar(15) NOT NULL,
  `process` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`noticket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `noticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
