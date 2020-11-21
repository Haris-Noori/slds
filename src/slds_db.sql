-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2020 at 02:05 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slds_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `act_id` int(5) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `act_name` varchar(100) NOT NULL,
  `act_desc` varchar(200) NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_id`, `cat_id`, `std_id`, `act_name`, `act_desc`, `start_date`, `end_date`) VALUES
(1, 1, 1, 'Team Head', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16'),
(2, 1, 2, 'Team Head', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16'),
(11, 0, 1, 'Team Head', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16'),
(13, 0, 2, 'Team Head', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16'),
(14, 0, 2, 'Team Head', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16'),
(15, 0, 2, 'Team Head', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16'),
(16, 0, 2, 'Team Head', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16'),
(17, 0, 2, 'Team Head', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16'),
(18, 0, 2, 'Team Head', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16'),
(19, 0, 2, 'Team Head', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16'),
(20, 0, 2, 'Team Head', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16'),
(21, 0, 2, 'Team Head', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16'),
(22, 3, 2, 'Team Head', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16'),
(23, 0, 2, 'Team Head', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16'),
(80, 1, 3, 'Team Head', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_password`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Student Leadership'),
(2, 'Global Engagement'),
(3, 'Sports & Recreation'),
(5, 'Career Development'),
(6, 'Publication/Creative Activity'),
(7, 'Awards & Scholarships');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `std_id` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`std_id`, `file_name`) VALUES
(3, 'DSC_0054.NEF');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` int(11) NOT NULL,
  `std_password` varchar(50) NOT NULL,
  `std_name` varchar(50) DEFAULT NULL,
  `std_email` varchar(50) DEFAULT NULL,
  `std_ind_year` int(10) DEFAULT NULL,
  `std_phone` varchar(20) DEFAULT NULL,
  `std_program` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `std_password`, `std_name`, `std_email`, `std_ind_year`, `std_phone`, `std_program`) VALUES
(1, 'student', 'M.Haris Noori', 'harisnoori20@gmail.com', 2018, '+92 310 562 5584', 'BSCS'),
(2, '123', 'Salihah Shamez', 'salihah@gamil.com', 2019, '+47 012 789 3456', 'BSIT'),
(3, 'hhh', 'Haider Tamsil', 'haidertamsil98@yahoo.com', 2017, '0336 9190 377', 'BSCS');

-- --------------------------------------------------------

--
-- Table structure for table `transcript`
--

CREATE TABLE `transcript` (
  `std_id` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transcript`
--

INSERT INTO `transcript` (`std_id`, `status`) VALUES
(1, 'approved'),
(2, 'requested'),
(3, 'disapproved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`act_id`),
  ADD KEY `act_cat_id` (`cat_id`),
  ADD KEY `act_std_id` (`std_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD KEY `files_std_id` (`std_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `transcript`
--
ALTER TABLE `transcript`
  ADD KEY `trans_std_id` (`std_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `act_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `file_std_id` FOREIGN KEY (`std_id`) REFERENCES `student` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transcript`
--
ALTER TABLE `transcript`
  ADD CONSTRAINT `std_id` FOREIGN KEY (`std_id`) REFERENCES `student` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
