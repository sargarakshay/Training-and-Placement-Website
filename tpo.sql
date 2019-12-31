-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2016 at 01:34 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpo`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied`
--

CREATE TABLE `applied` (
  `id` int(50) NOT NULL,
  `company` varchar(80) NOT NULL,
  `student` varchar(50) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied`
--

INSERT INTO `applied` (`id`, `company`, `student`, `flag`) VALUES
(30, 'c1', 's1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(15) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `Field1` varchar(15) NOT NULL,
  `Field2` varchar(15) NOT NULL,
  `Field3` varchar(15) NOT NULL,
  `Location` varchar(200) NOT NULL,
  `Cpi` float NOT NULL,
  `BackNo` int(11) NOT NULL,
  `Info` text NOT NULL,
  `Date` date NOT NULL,
  `DreamC` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `Name`, `Email`, `Contact`, `Field1`, `Field2`, `Field3`, `Location`, `Cpi`, `BackNo`, `Info`, `Date`, `DreamC`) VALUES
(9, 'c1', '1', 112354, 'Comp', 'Elex', 'IT', 'pune', 5, 1, '', '2016-10-10', 'yes'),
(11, 'c3', '', 0, '', '', '', '', 0, 0, '', '0000-00-00', 'yes'),
(12, 'c4', '1', 1, 'Comp', '', '', '1', 5, 0, '', '2016-11-11', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `id` int(20) NOT NULL,
  `File` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `File`) VALUES
(5, 'tpoupload/CN1.docx');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role`) VALUES
(1, 'tpo', '123456', 'admin'),
(12, 'c1', '1', 'Company'),
(14, 'c3', '1', 'Company'),
(15, 'c4', '1', 'Company'),
(17, 's1', '1', 'Student'),
(18, 's1', '1', 'Student'),
(19, 's2', '1', 'Student'),
(20, 's3', '1', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Grno` int(6) NOT NULL,
  `Field` varchar(15) NOT NULL,
  `Cpi` double NOT NULL,
  `Backlogs` int(2) NOT NULL,
  `ExtraC` text NOT NULL,
  `Achievements` text NOT NULL,
  `Blocked` smallint(1) NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `Company` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `cv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `Name`, `Username`, `Password`, `Grno`, `Field`, `Cpi`, `Backlogs`, `ExtraC`, `Achievements`, `Blocked`, `Contact`, `Company`, `Email`, `pic`, `cv`) VALUES
(5, 's1', 's1', '1', 1, 'Comp', 5, 0, '', '', 0, 9876543210, ' ', '', 'def', ''),
(6, '', 's2', '1', 2, 'Comp', 0, 0, '', '', 0, 0, '', '', 'def', ''),
(7, '', 's3', '1', 3, 'Comp', 0, 0, '', '', 0, 0, '', '', 'def', '');

-- --------------------------------------------------------

--
-- Table structure for table `talk`
--

CREATE TABLE `talk` (
  `id` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Company` varchar(50) NOT NULL,
  `Feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talk`
--

INSERT INTO `talk` (`id`, `Name`, `Company`, `Feedback`) VALUES
(6, 's1', ' ', 'good company');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied`
--
ALTER TABLE `applied`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talk`
--
ALTER TABLE `talk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applied`
--
ALTER TABLE `applied`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `talk`
--
ALTER TABLE `talk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
