-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 09:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slds`
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
  `act_desc` mediumtext NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_id`, `cat_id`, `std_id`, `act_name`, `act_desc`, `start_date`, `end_date`) VALUES
(124, 4, 1209, 'Voluntary service', 'Volunteered at Dar-ul-sukoon (orphanage for differently abled individuals) for 18 days.', '2018-01-01', '2018-01-18'),
(126, 3, 1209, 'Badminton', 'Under 19 national badminton player.', '2021-03-06', '2021-03-03'),
(127, 5, 1209, 'Virtual Internship', 'Virtual internship at Aga Khan Foundation', '2020-12-01', '2020-12-20'),
(128, 1, 1209, 'Residential Captain', 'Residential Captain of Nzoia House', '2020-04-01', '2021-04-01'),
(130, 2, 7612, 'Internship', 'Residential Captain of Nzoia House', '2021-04-01', '2021-04-09');

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
(98, 'admin.098'),
(765, 'X.765x'),
(2324, 'Robert_Adminpassword1');

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
(4, 'Community/ Voluntary Services'),
(5, 'Career Development'),
(6, 'Publication/ Creative Activity'),
(7, 'Awards & Scholarships'),
(8, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `std_id` int(11) NOT NULL,
  `act_id` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`std_id`, `act_id`, `file_name`) VALUES
(1209, 124, 'img_20151103_105030.jpg'),
(1209, 126, 'Badminton.jpg');

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
(1209, 'Alice_password@1', 'Alice Steve', 'Alice.steve@gmail.com', 2018, '+92 335 332 7523', 'Bachelors of Arts'),
(7612, 'Sasha_Ali2021', NULL, NULL, NULL, NULL, NULL),
(45678, 'HUStudent.2021', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transcript`
--

CREATE TABLE `transcript` (
  `std_id` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transcript`
--

INSERT INTO `transcript` (`std_id`, `status`, `message`) VALUES
(7612, 'approved', ''),
(1209, 'approved', '');

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
  ADD KEY `files_std_id` (`std_id`),
  ADD KEY `files_act_id` (`act_id`);

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
  MODIFY `act_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2325;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45679;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_act_id` FOREIGN KEY (`act_id`) REFERENCES `activity` (`act_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transcript`
--
ALTER TABLE `transcript`
  ADD CONSTRAINT `std_id` FOREIGN KEY (`std_id`) REFERENCES `student` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
