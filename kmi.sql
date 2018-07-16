-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2018 at 08:27 AM
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
(2, 'viceheadexternal@gmail.com', 'qwepoi', 'Assistant Manager', 'HRD'),
(3, 'requester3@gmail.com', 'qwepoi', 'Dept Head', 'HRD'),
(4, 'sem.hutabarat@gmail.com', 'qwepoi', 'Staff', 'Information System'),
(5, 'requester5@gmail.com', 'qwepoi', 'Assistant Manager', 'Information System'),
(6, 'requester6@gmail.com', 'qwepoi', 'Dept Head', 'Information System');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `noticket` int(11) NOT NULL,
  `dari` varchar(50) NOT NULL,
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
(143, 'Rizal (HR)', 'SWD', '2018-07-12', 'Software Package', 'Additional / Change / Delete', '2018-07-26', 'yes', 'normal', 'Untuk rekap data karyawan yang sudah mau pensiunthx', 'Approved', 'On Process'),
(144, 'Donna (Produksi)', 'SWD', '2018-07-12', 'Software Package', 'Installation', '0000-00-00', 'no', 'immedietly', 'Word saya need activation keythx', 'Approved', 'Not Processed'),
(147, 'Toto', 'ICT', '2018-07-13', 'Software Package', 'Additional / Change / Delete', '2018-07-13', 'yes', 'normal', 'test123', 'Approved', 'Not Processed'),
(152, 'Fika (purchasing)', 'ICT', '2018-07-16', 'Software Package', 'Installation', '2018-07-16', 'no', 'immedietly', 'driver printer tidak terbaca tolong dibantu thx', 'Pending', 'Not Processed'),
(154, 'Jenny (QC)', 'SWD', '2018-07-16', 'Software Package', 'Problem Solving', '2018-07-16', 'yes', 'immedietly', 'selalu eror saat submit data', 'Pending', 'Not Processed');

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
  MODIFY `noticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
