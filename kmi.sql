-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2018 at 09:31 AM
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
  `id_jabatan` int(1) NOT NULL,
  `Departemen` enum('Financial & Accounting','HRD','PR','Information System','Production') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_account`, `email`, `password`, `Jabatan`, `id_jabatan`, `Departemen`) VALUES
(1, 'khairulrizal39@gmail.com', 'qwepoi', 'Staff', 1, 'HRD'),
(2, 'viceheadexternal@gmail.com', 'qwepoi', 'Assistant Manager', 2, 'HRD'),
(3, 'fahrezi182@gmail.com', 'qwepoi', 'Dept Head', 3, 'HRD'),
(4, 'sem.hutabarat@gmail.com', 'qwepoi', 'Staff', 1, 'Information System'),
(5, 'requester5@gmail.com', 'qwepoi', 'Assistant Manager', 2, 'Information System'),
(6, 'requester6@gmail.com', 'qwepoi', 'Dept Head', 3, 'Information System'),
(7, 'semarthur@student.ub.ac.id', 'qwepoi', 'Staff', 1, 'HRD'),
(8, 'indoprydee@gmail.com', 'qwepoi', 'Staff', 1, 'Financial & Accounting'),
(9, 'helena.desembra@gmail.com', 'qwepoi', 'Assistant Manager', 2, 'Financial & Accounting'),
(10, 'anandafn8@gmail.com', 'qwepoi', 'Dept Head', 3, 'Financial & Accounting');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `noticket` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `untuk` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `kasus` varchar(50) NOT NULL,
  `duty` varchar(50) NOT NULL,
  `dateoec` date NOT NULL,
  `systemint` varchar(300) NOT NULL,
  `urgency` varchar(10) NOT NULL,
  `description` varchar(300) NOT NULL,
  `approvalstatus` enum('Pending','Not Approved','Approved by A. Manager','Approved by Dept. Head') NOT NULL,
  `process` enum('Not Processed','On Process','Done','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`noticket`, `nama`, `dari`, `e_mail`, `untuk`, `date`, `kasus`, `duty`, `dateoec`, `systemint`, `urgency`, `description`, `approvalstatus`, `process`) VALUES
(2, 'Khairul Rizal', 'HRD', 'khairulrizal39@gmail.com', 'SWD', '2018-07-23', 'System Application', 'Additional / Change / Delete', '2018-08-23', 'yes', 'normal', 'untuk merekap data karyawan yang baru', 'Approved by Dept. Head', 'On Process'),
(4, 'Samuel Arthur', 'HRD', 'semarthur@student.ub.ac.id', 'ICT', '2018-07-23', 'Software Package', 'Installation', '2018-07-23', 'no', 'immedietly', 'word 2013 error tolong di install ulang dengan lisensi thx', 'Pending', 'Not Processed'),
(5, 'Josua Fernando', 'Financial & Accounting', 'indoprydee@gmail.com', 'SWD', '2018-07-23', 'System Application', 'Additional / Change / Delete', '2018-08-20', 'yes', 'normal', 'untuk merubah data penjualan dari datababase ke excel dan pdf thx', 'Approved by Dept. Head', 'On Process'),
(6, 'Josua Fernando', 'Financial & Accounting', 'indoprydee@gmail.com', 'ICT', '2018-07-23', 'Order Catridge / Toner', 'Additional / Change / Delete', '0000-00-00', 'no', 'immedietly', 'catridge rusak soalnya kalau ngeprint ada garis dan ada bocor sedikit', 'Pending', 'Not Processed'),
(10, 'vice head', 'HRD', 'viceheadexternal@gmail.com', 'ICT', '2018-08-07', 'Order Catridge / Toner', 'Additional / Change / Delete', '2018-08-07', 'no', 'normal', 'tinta printer habis', 'Approved by A. Manager', 'Not Processed');

-- --------------------------------------------------------

--
-- Table structure for table `form_done`
--

CREATE TABLE `form_done` (
  `noticket` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `untuk` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `kasus` varchar(50) NOT NULL,
  `duty` varchar(50) NOT NULL,
  `dateoec` date NOT NULL,
  `systemint` varchar(300) NOT NULL,
  `urgency` varchar(10) NOT NULL,
  `description` varchar(300) NOT NULL,
  `approvalstatus` varchar(50) NOT NULL,
  `process` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_done`
--

INSERT INTO `form_done` (`noticket`, `nama`, `dari`, `e_mail`, `untuk`, `date`, `kasus`, `duty`, `dateoec`, `systemint`, `urgency`, `description`, `approvalstatus`, `process`) VALUES
(1, 'Khairul Rizal', 'HRD', 'khairulrizal39@gmail.com', 'ICT', '2018-07-23', 'Order Catridge / Toner', 'Service / Repair', '2018-07-23', 'no', 'immedietly', 'tinta printer HR habis tolong diganti thx', 'Approved by Dept. Head', 'Done'),
(3, 'Samuel Arthur', 'HRD', 'semarthur@student.ub.ac.id', 'ICT', '2018-07-23', 'Hardware', 'Service / Repair', '2018-07-23', 'no', 'immedietly', 'UPS tidak nyala tolong diganti thx', 'Approved by Dept. Head', 'Done'),
(8, 'Samuel Arthur', 'Information System', 'sem.hutabarat@gmail.com', 'ICT', '2018-08-07', 'Order Catridge / Toner', 'Additional / Change / Delete', '2018-08-07', 'no', 'normal', 'tinta printer habis', 'Pending', 'Done'),
(9, 'Khairul Rizal', 'HRD', 'khairulrizal39@gmail.com', 'ICT', '2018-08-07', 'Order Catridge / Toner', 'Additional / Change / Delete', '2018-08-07', 'no', 'normal', 'tinta printer habis', 'Approved by Dept. Head', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `form_na`
--

CREATE TABLE `form_na` (
  `noticket` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `untuk` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `kasus` varchar(50) NOT NULL,
  `duty` varchar(50) NOT NULL,
  `dateoec` date NOT NULL,
  `systemint` varchar(300) NOT NULL,
  `urgency` varchar(10) NOT NULL,
  `description` varchar(300) NOT NULL,
  `approvalstatus` varchar(50) NOT NULL,
  `process` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_na`
--

INSERT INTO `form_na` (`noticket`, `nama`, `dari`, `e_mail`, `untuk`, `date`, `kasus`, `duty`, `dateoec`, `systemint`, `urgency`, `description`, `approvalstatus`, `process`) VALUES
(7, 'Samuel Arthur', 'HRD', 'semarthur@student.ub.ac.id', 'ICT', '2018-07-26', 'Order Catridge / Toner', 'Additional / Change / Delete', '2018-07-26', 'no', 'immedietly', 'habis tolong diganti thx', 'Not Approved', 'Not Processed');

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
-- Indexes for table `form_done`
--
ALTER TABLE `form_done`
  ADD PRIMARY KEY (`noticket`);

--
-- Indexes for table `form_na`
--
ALTER TABLE `form_na`
  ADD PRIMARY KEY (`noticket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `noticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
