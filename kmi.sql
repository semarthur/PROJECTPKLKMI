-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2018 at 10:32 AM
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
  `Departemen` enum('Financial & Acconting','HRD','PR','Information System','Production') NOT NULL
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
(8, 'indoprydee@gmail.com', 'qwepoi', 'Staff', 1, 'Financial & Acconting'),
(9, 'helena.desembra@gmail.com', 'qwepoi', 'Assistant Manager', 2, 'Financial & Acconting'),
(10, 'anandafn8@gmail.com', 'qwepoi', 'Dept Head', 3, 'Financial & Acconting');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `noticket` int(11) NOT NULL,
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

INSERT INTO `form` (`noticket`, `dari`, `e_mail`, `untuk`, `date`, `kasus`, `duty`, `dateoec`, `systemint`, `urgency`, `description`, `approvalstatus`, `process`) VALUES
(159, 'Rizal (HR)', 'khairulrizal39@gmail.com', 'ICT', '2018-07-18', 'Data Communication / Internet', 'Problem Solving', '2018-07-18', 'yes', 'immedietly', 'tidak bisa masuk server untuk lihat datathx', 'Approved by A. Manager', 'Done'),
(165, 'Doni (HR)', 'viceheadexternal@gmail.com', 'ICT', '2018-07-18', 'Data Communication / Internet', 'Problem Solving', '2018-07-18', 'yes', 'immedietly', 'Tidak bisa konek internet mohon bantuannya terimakasih', 'Approved by A. Manager', 'Done'),
(166, 'Samuel Arthur (HR)', 'semarthur@student.ub.ac.id', 'ICT', '2018-07-18', 'LAN / WAN / Communication', 'Problem Solving', '2018-07-18', 'yes', 'normal', 'untuk masuk ke sistem sangat lambat tolong di cek thx', 'Approved by Dept. Head', 'Done'),
(167, 'Elkaf Fahrezi (HR)', 'fahrezi182@gmail.com', 'SWD', '2018-07-18', 'Software Package', 'Installation', '2018-07-18', 'no', 'immedietly', 'Word saya eror tolong dilihat dan diperbaiki thx', 'Approved by Dept. Head', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `form_done`
--

CREATE TABLE `form_done` (
  `noticket` int(11) NOT NULL,
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

INSERT INTO `form_done` (`noticket`, `dari`, `e_mail`, `untuk`, `date`, `kasus`, `duty`, `dateoec`, `systemint`, `urgency`, `description`, `approvalstatus`, `process`) VALUES
(169, 'Josua Fernando (F&A)', 'indoprydee@gmail.com', 'ICT', '2018-07-19', 'Hardware', 'Service / Repair', '2018-07-19', 'no', 'immedietly', 'Printer rusak tolong diservice dan diganti sementara dulu thx', 'Approved by Dept. Head', 'Done'),
(170, 'Helena Desembra (F&A)', 'helena.desembra@gmail.com', 'SWD', '2018-07-19', 'System Application', 'Additional / Change / Delete', '2018-08-19', 'yes', 'normal', 'tolong buatkan program untuk bisa ubah data excel jadi pdf thx', 'Approved by A. Manager', 'Done'),
(171, 'Ananda Fitri (F&A)', 'anandafn8@gmail.com', 'ICT', '2018-07-19', 'Data Communication / Internet', 'Problem Solving', '2018-07-19', 'yes', 'immedietly', 'disini tertulis connected, tapi tak bisa masuk server, tolong dibantu thx', 'Approved by Dept. Head', 'Done');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `noticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
