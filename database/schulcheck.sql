-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2018 at 03:02 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schulcheck`
--

-- --------------------------------------------------------

--
-- Table structure for table `beta`
--

CREATE TABLE `beta` (
  `ID` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `url` varchar(250) NOT NULL,
  `school` varchar(40) NOT NULL,
  `phone_number` varchar(45) NOT NULL,
  `options` varchar(200) NOT NULL,
  `newsletter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beta`
--

INSERT INTO `beta` (`ID`, `name`, `email`, `url`, `school`, `phone_number`, `options`, `newsletter`) VALUES
(219, 'stefan333', 'test1', '', '', '', '', ''),
(220, 'stefan1', 'test2', '', '', '', '', ''),
(226, 'sssss', 'dddddd', '', '', '', '', ''),
(248, 'stefan14443232', 'sdadsa', '', '', '', '', ''),
(250, '121312', 'sdada', '', '', '', '', ''),
(251, 'aaaa', '23232', '', '', '', '', ''),
(252, 'dsdsd', '22323', '', '', '', '', ''),
(253, 'dsdsd', '23151', '', '', '', '', ''),
(254, '213123', 'sda', '', '', '', '', ''),
(255, '2313213', 'sdad', '', '', '', '', ''),
(256, 'sdada', 'eeee', '', '', '', '', ''),
(257, 'sdad', '2312314', '', '', '', '', ''),
(261, 'stefan323', 'surovi93@hotmail.com', '', '', '', '', ''),
(262, '332323', '1111123', 'https://phptherightway.com/#date_and_time', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `state_id`, `status`) VALUES
(1, 'Belgrade', 1, 1),
(2, 'Nis', 2, 1),
(3, 'Novi Sad', 3, 1),
(4, 'Subotica', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `username`, `password`, `email`) VALUES
(1, 'Stefan', 'stefan23', 'sl@mediavuk.com'),
(2, 'Dejan', 'dejanmediavuk', 'dp@mediavuk.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beta`
--
ALTER TABLE `beta`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beta`
--
ALTER TABLE `beta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
