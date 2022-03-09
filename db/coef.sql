-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2017 at 03:29 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coef`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `add_id` int(11) NOT NULL,
  `add_name` varchar(50) NOT NULL,
  `add_email` varchar(30) NOT NULL,
  `add_pass` varchar(100) NOT NULL,
  `add_code` int(11) NOT NULL,
  `action_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `login_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `login_ip` varchar(40) NOT NULL,
  `logout_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`add_id`, `add_name`, `add_email`, `add_pass`, `add_code`, `action_time`, `login_time`, `login_ip`, `logout_time`) VALUES
(3, 'Ayesha Khan', 'usman151mrd@gmail.com', '$2y$10$4O2S5pf.goGZPg7YnNQn/.xTrOgGHDokZMzYsO5tURXenunU.oFc2', 0, '2017-05-26 06:01:26', '2017-05-26 11:00:59', '::1', '2017-05-26 05:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `basic_info`
--

CREATE TABLE `basic_info` (
  `basicinfo_id` int(11) NOT NULL,
  `networks` varchar(255) NOT NULL DEFAULT 'None',
  `interested_in` varchar(30) NOT NULL DEFAULT 'Women',
  `rel_stats` varchar(30) NOT NULL DEFAULT 'Single',
  `language` varchar(255) NOT NULL DEFAULT 'None',
  `religion` varchar(255) NOT NULL DEFAULT 'None',
  `rel_desc` text NOT NULL,
  `political_view` varchar(255) NOT NULL,
  `pol_desc` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `msg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Sender_name` varchar(50) NOT NULL,
  `Msg` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`msg_id`, `user_id`, `Sender_name`, `Msg`, `Date`) VALUES
(1, 1, 'Muhammad Usman', 'hy', '2017-05-23 18:09:11'),
(2, 2, 'Saba Hanif', 'hy2', '2017-05-23 18:40:43'),
(3, 2, 'Saba Hanif', 'i have a problem', '2017-05-23 18:41:59'),
(4, 1, 'Muhammad Usman', '', '2017-05-24 03:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `common_topic`
--

CREATE TABLE `common_topic` (
  `cp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cp_text` text NOT NULL,
  `cp_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `common_topic`
--

INSERT INTO `common_topic` (`cp_id`, `user_id`, `cp_text`, `cp_time`, `subject`) VALUES
(3, 7, 'hy', '2017-05-26 06:07:05', '1'),
(4, 6, 'dfgsdfgf', '2017-08-11 16:19:25', '1'),
(5, 6, 'how to call object in c++;', '2017-08-13 07:02:37', '2');

-- --------------------------------------------------------

--
-- Table structure for table `common_topic_comment`
--

CREATE TABLE `common_topic_comment` (
  `c_id` int(11) NOT NULL,
  `cp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `common_topic_comment`
--

INSERT INTO `common_topic_comment` (`c_id`, `cp_id`, `user_id`, `comment`, `time`) VALUES
(1, 3, 7, 'hy how are you', '2017-05-31 13:32:35'),
(2, 3, 6, 'ff f f', '2017-08-11 16:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `common_topic_status`
--

CREATE TABLE `common_topic_status` (
  `user_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `common_topic_status`
--

INSERT INTO `common_topic_status` (`user_id`, `c_id`, `status`) VALUES
(7, 1, 'unlike');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `Msg_ID` int(11) NOT NULL,
  `with_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `to_name` varchar(100) NOT NULL,
  `from_id` int(11) NOT NULL,
  `from_name` varchar(100) NOT NULL,
  `Msg` text,
  `status` varchar(50) DEFAULT 'send',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Msg_ID`, `with_id`, `to_id`, `to_name`, `from_id`, `from_name`, `Msg`, `status`, `date`) VALUES
(1, 7, 7, 'Ayesha Khan', 6, 'Muhammad Usman', 'text', 'seen', '2017-05-28 11:05:51'),
(2, 7, 7, 'Ayesha Khan', 6, 'Muhammad Usman', 'how are u', 'seen', '2017-05-28 11:05:51'),
(3, 6, 6, 'Muhammad Usman', 7, 'Ayesha Khan', 'text', 'seen', '2017-05-28 11:06:26'),
(4, 7, 7, 'Ayesha Khan', 6, 'Muhammad Usman', 'my message', 'seen', '2017-05-28 11:05:51'),
(5, 6, 6, 'Muhammad Usman', 7, 'Ayesha Khan', 'hy', 'seen', '2017-05-28 16:00:51'),
(6, 7, 7, 'Ayesha Khan', 6, 'Muhammad Usman', 'hy2', 'seen', '2017-05-28 16:01:13'),
(7, 7, 7, 'Ayesha Khan', 6, 'Muhammad Usman', 'rregfg\r\n\r\nfdgsfdgdf\r\nsgsdf\r\ngdf\r\ngdfs\r\ngdf\r\ngdf\r\ngfds\r\ngdfs\r\ngsdf\r\ng', 'seen', '2017-08-11 16:18:09'),
(8, 7, 7, 'Ayesha Khan', 6, 'Muhammad Usman', 'fdgfdgfdg', 'seen', '2017-08-11 16:18:17'),
(9, 7, 7, 'Ayesha Khan', 6, 'Muhammad Usman', 'hy', 'seen', '2017-08-13 07:26:01'),
(10, 6, 6, 'Muhammad Usman', 7, 'Ayesha Khan', 'kia hall he\r\n', 'seen', '2017-08-13 07:26:26'),
(11, 6, 6, 'Muhammad Usman', 7, 'Ayesha Khan', 'kia ho reha he', 'seen', '2017-08-13 07:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`p_id`, `p_name`) VALUES
(1, 'Mcs'),
(5, 'BCS');

-- --------------------------------------------------------

--
-- Table structure for table `programming`
--

CREATE TABLE `programming` (
  `pid` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programming`
--

INSERT INTO `programming` (`pid`, `pname`) VALUES
(1, 'c  sharp'),
(2, 'C++'),
(3, 'Java'),
(4, 'Html'),
(5, 'Css'),
(6, 'PHP'),
(8, 'Java script'),
(9, 'Asp.net');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_program` varchar(50) NOT NULL,
  `user_semester` varchar(20) NOT NULL,
  `user_dob` varchar(30) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_reset` int(11) NOT NULL DEFAULT '0',
  `user_ip` varchar(40) NOT NULL,
  `user_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_logout` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_reg` varchar(20) NOT NULL,
  `login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_name`, `user_pass`, `user_program`, `user_semester`, `user_dob`, `user_gender`, `user_reset`, `user_ip`, `user_update`, `user_logout`, `user_reg`, `login`) VALUES
(6, 'Muhammad', 'Usman', 'usman151m@gmail.com', 'usmanch', '$2y$10$EW/mAlZW83yAiwWMyS1MoO7q76KGsDmNCZKQvc.X.3bVpgS5x3GxS', '1', '4', '1997-1-16', 'Male', 0, '::1', '2017-09-07 12:20:58', '0000-00-00 00:00:00', '', '2017-09-07 12:19:47'),
(7, 'Ayesha', 'Khan', 'usman151mrd@gmail.com', 'ayesha', '$2y$10$fI6aNOR.zKHdW5mSoMgFLOTKJFP8jKwp0H29vbOc6SukJnz9w558i', '1', '4', '1996-1-16', 'Female', 0, '::1', '2017-08-13 07:23:35', '0000-00-00 00:00:00', '', '2017-08-13 07:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `related_topic`
--

CREATE TABLE `related_topic` (
  `t_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `discription` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `related_topic`
--

INSERT INTO `related_topic` (`t_id`, `user_id`, `subject`, `discription`, `time`) VALUES
(1, 7, '22', 'hy', '2017-05-28 16:01:35'),
(2, 6, '22', 'fg fdsgdfgdfs gdfsgsdfgfdsgdfsg', '2017-08-11 16:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `related_topic_comment`
--

CREATE TABLE `related_topic_comment` (
  `rtc_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `related_topic_comment`
--

INSERT INTO `related_topic_comment` (`rtc_id`, `t_id`, `user_id`, `comment`, `time`) VALUES
(1, 1, 7, 'this is answer.', '2017-05-28 16:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `related_topic_status`
--

CREATE TABLE `related_topic_status` (
  `rts_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `related_topic_status`
--

INSERT INTO `related_topic_status` (`rts_id`, `t_id`, `user_id`, `status`) VALUES
(1, 1, 7, 'unlike');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`s_id`, `s_name`, `p_id`) VALUES
(1, 'first', 1),
(2, 'second', 1),
(3, 'third', 1),
(4, 'fourth', 1),
(13, '1st', 5),
(14, '2nd', 5),
(15, '3rd', 5),
(16, '4th', 5),
(17, '5th', 5),
(18, '6th', 5),
(19, '7th', 5),
(20, '8th', 5);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sb_id` int(11) NOT NULL,
  `sb_name` varchar(50) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sb_id`, `sb_name`, `s_id`) VALUES
(2, 'intro to programming', 1),
(3, 'Database', 1),
(4, 'I.T computing', 1),
(6, 'D. Structure', 1),
(7, 'OOP', 2),
(8, 'Data Structure', 2),
(9, 'Autometa', 2),
(10, 'Assembly', 2),
(11, 'SE1', 2),
(12, 'CA', 3),
(13, 'ESD', 3),
(14, 'VP', 3),
(15, 'CCN', 3),
(16, 'SE2', 3),
(17, 'OS', 3),
(18, 'CC', 4),
(19, 'HCI', 4),
(20, 'AI', 4),
(21, 'CG', 4),
(22, 'Project', 4),
(23, 'R.R.Skills', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE `user_post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_text` text NOT NULL,
  `Author` varchar(50) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_post`
--

INSERT INTO `user_post` (`post_id`, `user_id`, `post_text`, `Author`, `post_time`) VALUES
(5, 7, 'hy', 'Ayesha Khan', '2017-05-26 06:06:45'),
(6, 6, 'hy this is post', 'Muhammad Usman', '2017-05-28 15:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_post_comment`
--

CREATE TABLE `user_post_comment` (
  `c_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_post_comment`
--

INSERT INTO `user_post_comment` (`c_id`, `post_id`, `user_id`, `comment`, `Author`, `Time`) VALUES
(1, 6, 6, 'this is a comment', 'Muhammad Usman', '2017-05-28 15:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_post_status`
--

CREATE TABLE `user_post_status` (
  `s_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_post_status`
--

INSERT INTO `user_post_status` (`s_id`, `post_id`, `user_id`, `status`) VALUES
(1, 6, 6, 'like'),
(2, 5, 6, 'unlike');

-- --------------------------------------------------------

--
-- Table structure for table `user_pro_pic`
--

CREATE TABLE `user_pro_pic` (
  `profile_id` int(11) NOT NULL,
  `pro_image` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pri` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_pro_pic`
--

INSERT INTO `user_pro_pic` (`profile_id`, `pro_image`, `user_id`, `pri`) VALUES
(1, 'asd.jpg', 6, 'yes'),
(2, 'wordpress1.PNG', 7, 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`add_id`);

--
-- Indexes for table `basic_info`
--
ALTER TABLE `basic_info`
  ADD PRIMARY KEY (`basicinfo_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `common_topic`
--
ALTER TABLE `common_topic`
  ADD PRIMARY KEY (`cp_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `common_topic_comment`
--
ALTER TABLE `common_topic_comment`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cp_id` (`cp_id`);

--
-- Indexes for table `common_topic_status`
--
ALTER TABLE `common_topic_status`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Msg_ID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `programming`
--
ALTER TABLE `programming`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `related_topic`
--
ALTER TABLE `related_topic`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `related_topic_comment`
--
ALTER TABLE `related_topic_comment`
  ADD PRIMARY KEY (`rtc_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `related_topic_status`
--
ALTER TABLE `related_topic_status`
  ADD PRIMARY KEY (`rts_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sb_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `user_post`
--
ALTER TABLE `user_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_post_comment`
--
ALTER TABLE `user_post_comment`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_post_status`
--
ALTER TABLE `user_post_status`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_pro_pic`
--
ALTER TABLE `user_pro_pic`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `basic_info`
--
ALTER TABLE `basic_info`
  MODIFY `basicinfo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `common_topic`
--
ALTER TABLE `common_topic`
  MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `common_topic_comment`
--
ALTER TABLE `common_topic_comment`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `Msg_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `programming`
--
ALTER TABLE `programming`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `related_topic`
--
ALTER TABLE `related_topic`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `related_topic_comment`
--
ALTER TABLE `related_topic_comment`
  MODIFY `rtc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `related_topic_status`
--
ALTER TABLE `related_topic_status`
  MODIFY `rts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user_post`
--
ALTER TABLE `user_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_post_comment`
--
ALTER TABLE `user_post_comment`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_post_status`
--
ALTER TABLE `user_post_status`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_pro_pic`
--
ALTER TABLE `user_pro_pic`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `basic_info`
--
ALTER TABLE `basic_info`
  ADD CONSTRAINT `basic_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`);

--
-- Constraints for table `common_topic`
--
ALTER TABLE `common_topic`
  ADD CONSTRAINT `common_topic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`);

--
-- Constraints for table `common_topic_comment`
--
ALTER TABLE `common_topic_comment`
  ADD CONSTRAINT `common_topic_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`),
  ADD CONSTRAINT `common_topic_comment_ibfk_2` FOREIGN KEY (`cp_id`) REFERENCES `common_topic` (`cp_id`);

--
-- Constraints for table `common_topic_status`
--
ALTER TABLE `common_topic_status`
  ADD CONSTRAINT `common_topic_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`);

--
-- Constraints for table `related_topic`
--
ALTER TABLE `related_topic`
  ADD CONSTRAINT `related_topic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`);

--
-- Constraints for table `related_topic_comment`
--
ALTER TABLE `related_topic_comment`
  ADD CONSTRAINT `related_topic_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`),
  ADD CONSTRAINT `related_topic_comment_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `related_topic` (`t_id`);

--
-- Constraints for table `related_topic_status`
--
ALTER TABLE `related_topic_status`
  ADD CONSTRAINT `related_topic_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`);

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `program` (`p_id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `semester` (`s_id`);

--
-- Constraints for table `user_post`
--
ALTER TABLE `user_post`
  ADD CONSTRAINT `user_post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`);

--
-- Constraints for table `user_post_comment`
--
ALTER TABLE `user_post_comment`
  ADD CONSTRAINT `user_post_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`);

--
-- Constraints for table `user_post_status`
--
ALTER TABLE `user_post_status`
  ADD CONSTRAINT `user_post_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`);

--
-- Constraints for table `user_pro_pic`
--
ALTER TABLE `user_pro_pic`
  ADD CONSTRAINT `user_pro_pic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`),
  ADD CONSTRAINT `user_pro_pic_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
