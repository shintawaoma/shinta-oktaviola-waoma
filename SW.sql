-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2019 at 12:09 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SW`
--

-- --------------------------------------------------------

--
-- Table structure for table `SWlogin`
--

CREATE TABLE `SWlogin` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SWlogin`
--

INSERT INTO `SWlogin` (`Username`, `Password`, `Status`) VALUES
('admin', 'admin12345', 'Admin'),
('user', 'user12345', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `SWMovie`
--

CREATE TABLE `SWMovie` (
  `Title` varchar(50) NOT NULL,
  `Actor` varchar(50) NOT NULL,
  `Genre` varchar(50) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SWMovie`
--

INSERT INTO `SWMovie` (`Title`, `Actor`, `Genre`, `Date`, `Duration`) VALUES
('2 Garis Biru', 'Zara JKT48', 'Education', '2019-09-13', '120 Minutes'),
('Doctor Sleep', 'Ewan Mcgregor ', 'Horror', '2000-12-13', '117 Minutes'),
('The Internship', 'Owen Wilson', 'Comedy', '2012-09-28', '108 Minutes'),
('Frozen', 'Kristen Bell', 'Comedy , Fantasy', '2013-07-20', '109 Minutes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `SWlogin`
--
ALTER TABLE `SWlogin`
  ADD PRIMARY KEY (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
