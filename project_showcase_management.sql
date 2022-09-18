-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220810.35f421a69b
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2022 at 05:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_showcase_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` varchar(5) NOT NULL,
  `faculty_password` varchar(30) NOT NULL,
  `faculty_email` varchar(30) NOT NULL,
  `faculty_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_password`, `faculty_email`, `faculty_name`) VALUES
('1', '123456789', 'asda@sda', '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `group_category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `student_id`, `group_name`, `group_category`) VALUES
(0, 123, '1', 'Electronics'),
(0, 2, 'asdasd', 'Electronics'),
(0, 1, 'zawadbhai', 'Electronics'),
(1, 1, 'Error Sage', 'Software'),
(1, 2, 'Error Sage', 'Software'),
(4, 1, 'Error Sage', 'Software'),
(4, 2, 'Error Sage', 'Software'),
(4, 3, 'Error Sage', 'Software');

-- --------------------------------------------------------

--
-- Table structure for table `judge`
--

CREATE TABLE `judge` (
  `judge_id` int(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `assigned_to` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `judge`
--

INSERT INTO `judge` (`judge_id`, `password`, `category`, `assigned_to`) VALUES
(1, '12345678', 'Software', 'Sami');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `sl` int(11) NOT NULL,
  `notice` varchar(500) NOT NULL,
  `course` varchar(30) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`sl`, `notice`, `course`, `date`) VALUES
(2, 'sadasdawdawd', '', ''),
(3, 'sadasdawdawd', '', ''),
(5, '                                          asdawdasdaw      \r\n                                            ', '', ''),
(19, '', '', '09/17/2022 04:27:45 '),
(20, '                                                \r\n                                asdascaajhsdgajbc ajhkgwe            ', '', '09/17/2022 07:38:37 ');

-- --------------------------------------------------------

--
-- Table structure for table `oganizers`
--

CREATE TABLE `oganizers` (
  `id` int(11) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oganizers`
--

INSERT INTO `oganizers` (`id`, `password`) VALUES
(1, '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_title` varchar(60) NOT NULL,
  `project_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `category` varchar(30) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `final_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_title`, `project_id`, `group_id`, `marks`, `room_number`, `description`, `category`, `faculty_id`, `final_file`) VALUES
('project showcase', 15, 4, 16, 425, '                                                \r\n                        asdas                    ', 'Software', 1, 'final_uploads/api.zip');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `email`, `password`) VALUES
(1, 'Debo', 'DsAd', 'sdasd'),
(2, 'Alif', 'asdasd', 'asdsad'),
(3, 'Zawad', 'asdasd@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `update_no` varchar(30) NOT NULL,
  `project_id` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `feedback` varchar(250) NOT NULL,
  `file` varchar(500) NOT NULL,
  `status` varchar(11) NOT NULL,
  `uploaded_on` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`update_no`, `project_id`, `description`, `feedback`, `file`, `status`, `uploaded_on`) VALUES
('1', 1, 'dasdasd', 'wdwadawdas', '', 'accepted', ''),
('2', 1, 'asdasd', '', '', '', ''),
('mid', 15, 'asdasdwad', '', 'api.zip', '', ''),
('pre_final', 15, 'asdwadaw', '', 'project_updates/Organizer (2).', '', ''),
('proposal', 15, 'adwadaw', '', 'project_updates/WiFiManager-ma', '', ''),
('mid', 15, 'asdawdawda', '', 'project_updates/CT-2_Debopom_011201046.rar', '', ''),
('mid', 15, 'sdgfskajhfa', '', 'project_updates/api.zip', '', ''),
('mid', 15, 'sdgfskajhfa', '', 'project_updates/api.zip', '', ''),
('mid', 15, 'sdgfskajhfa', '', 'project_updates/AsyncTCP-master.zip', '', ''),
('pre_final', 15, 'asdwadawd', '', 'project_updates/Organizer (2).zip', '', '2022-09-18 20:06:33'),
('proposal', 15, 'sadwawd', '', 'project_updates/AsyncTCP-master.zip', '', '2022-09-18 20:09:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
