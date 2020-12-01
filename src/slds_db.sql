-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 04:19 PM
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
  `act_desc` mediumtext NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_id`, `cat_id`, `std_id`, `act_name`, `act_desc`, `start_date`, `end_date`) VALUES
(1, 1, 1, 'Team Head', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16'),
(2, 1, 2, 'Team Head', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16'),
(22, 3, 2, 'Team lead', 'Web & IT Team Head - NUCES ACM', '2019-10-01', '2021-05-16'),
(87, 3, 1, 'Futsal Player', 'Participated in Sports Week 2020', '2020-11-02', '2020-11-06'),
(88, 6, 1, 'Blogging', 'My Website on imharis.wordpress.com', '2019-11-24', '2020-11-30'),
(89, 6, 1, 'Software Developed', 'Doomsday 2019', '2020-11-02', '2020-11-07'),
(90, 11, 1, 'Test Activity', 'Test Description', '2020-11-16', '2020-11-15'),
(91, 1, 1, 'Git Workshop', 'NUCES ACM Workshop', '2020-11-12', '2020-11-13'),
(94, 2, 1, 'Test 23kdckdcn', 'Desc changed', '2020-11-05', '2020-11-24'),
(95, 1, 1, 'Test Activity', 'Test Passed', '2020-11-07', '2020-11-24'),
(96, 1, 3, 'Graphic', 'NUCES ACM Graphic Designing Team', '2020-11-01', '2020-11-30'),
(98, 15, 2, 'Student Chairperson', 'Student Life Department', '2020-11-17', '2020-11-27');

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
(14, 'Community/Voluntary Services'),
(15, 'Career Development'),
(16, 'Publication/Creative Activity'),
(17, 'Awards & Scholarships'),
(19, 'Others');

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
(1, 95, 'Octocat.png'),
(1, 94, 'TortoiseCVS_Logo.png'),
(1, 94, 'mercurial_logo.png'),
(1, 94, 'GIT.png'),
(2, 22, 'pp.jpg');

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
(2, '12345', 'Salihah Shamez', 'salihah@gamil.com', 2019, '+47 012 789 3456', 'BSIT'),
(3, 'c3qwerty', 'Haider Tamsil', 'haidertamsil98@yahoo.com', 2017, '0336 9190 377', 'BSCS'),
(4, '123', 'Mubariz Khan', 'mubariz@gmail.com', 2018, '444578954613', 'BSCS');

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
(2, 'approved', 'Pay Your dues first');

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
  MODIFY `act_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
