-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 08:23 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickquestionnaire`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `no` int(11) NOT NULL,
  `admin_id` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `date_of_registration` varchar(100) DEFAULT NULL,
  `active` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`no`, `admin_id`, `name`, `role`, `username`, `password`, `date_of_registration`, `active`) VALUES
(1, 'admin1', 'admin', 'admin', 'admin', 'pass', NULL, '1'),
(2, 'admin2', 'Another Adminos', 'Assistantos', 'admin2', 'admin2', '2019-04-26', '0');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `no` int(11) NOT NULL,
  `answer_id` varchar(100) DEFAULT NULL,
  `answer_number` varchar(100) DEFAULT NULL,
  `question_id` varchar(100) DEFAULT NULL,
  `q_id` varchar(100) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `answer_content` varchar(1000) DEFAULT NULL,
  `answer_date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`no`, `answer_id`, `answer_number`, `question_id`, `q_id`, `student_id`, `answer_content`, `answer_date`) VALUES
(6, 'a_5cc9f9b7ef90a', '3', 'q_5cc94a26829d2', 'Q_5cc339829bb64', '11', 'Op1', '2019-05-01'),
(4, 'a_5cc9f9b2a3749', '1', 'q_5cc94a12d2a5e', 'Q_5cc339829bb64', '11', 'Op1', '2019-05-01'),
(5, 'a_5cc9f9b5235d7', '2', 'q_5cc94a1dbcb31', 'Q_5cc339829bb64', '11', 'Op2', '2019-05-01'),
(7, 'a_5cc9f9c5c5e71', '1', 'q_5cc8aab209097', 'Q_5cc8aa590b97b', '11', 'Op3', '2019-05-01'),
(8, 'a_5cc9f9c81bc56', '2', 'q_5cc8aa7ec8680', 'Q_5cc8aa590b97b', '11', 'Opt3', '2019-05-01'),
(9, 'a_5cc9f9ca8136f', '3', 'q_5cc8aa7483900', 'Q_5cc8aa590b97b', '11', 'Op1', '2019-05-01'),
(10, 'a_5cc9fa8884778', '1', 'q_5cc94a12d2a5e', 'Q_5cc339829bb64', '83722', 'Op1', '2019-05-01'),
(11, 'a_5cc9fa8b79fa6', '2', 'q_5cc94a1dbcb31', 'Q_5cc339829bb64', '83722', 'Op2', '2019-05-01'),
(12, 'a_5cc9fa8d4fdc7', '3', 'q_5cc94a26829d2', 'Q_5cc339829bb64', '83722', 'Op3', '2019-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `no` int(11) NOT NULL,
  `q_id` varchar(200) DEFAULT NULL,
  `q_title` varchar(200) DEFAULT NULL,
  `q_created_by` varchar(200) DEFAULT NULL,
  `q_creation_date` varchar(100) DEFAULT NULL,
  `q_expiry_date` varchar(100) DEFAULT NULL,
  `q_target` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`no`, `q_id`, `q_title`, `q_created_by`, `q_creation_date`, `q_expiry_date`, `q_target`) VALUES
(4, 'Q_5cc8aa590b97b', 'Why do ladies like eating icecream?', '83722', '2019-04-30', '2019-05-25', 'Faculty of Mascom'),
(2, 'Q_5cc339829bb64', 'Trial Quest', '99932', '2019-04-26', '2019-05-25', 'All Students'),
(3, 'Q_5cc35925a8248', 'Questionnaire 2', '99932', '2019-04-26', '2019-04-30', 'Faculty of Science'),
(5, 'Q_5cc8aaca8a578', 'Quest By student 2', '83722', '2019-04-30', '2019-05-25', 'Faculty of Science');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `no` int(11) NOT NULL,
  `question_id` varchar(100) DEFAULT NULL,
  `question_number` varchar(100) DEFAULT NULL,
  `q_id` varchar(100) DEFAULT NULL,
  `question_content` varchar(200) DEFAULT NULL,
  `question_date` varchar(100) DEFAULT NULL,
  `option1` varchar(500) DEFAULT NULL,
  `option2` varchar(200) DEFAULT NULL,
  `option3` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`no`, `question_id`, `question_number`, `q_id`, `question_content`, `question_date`, `option1`, `option2`, `option3`) VALUES
(15, 'q_5cc8aad6e61c9', '1', 'Q_5cc8aaca8a578', 'Quest1', '2019-04-30', 'Op1', 'Op2', 'Op3'),
(14, 'q_5cc8aab209097', '1', 'Q_5cc8aa590b97b', 'Quest3', '2019-04-30', 'Op1', 'Op2', 'Op3'),
(13, 'q_5cc8aa7ec8680', '2', 'Q_5cc8aa590b97b', 'Quest2', '2019-04-30', 'Opt1', 'Opt2', 'Opt3'),
(12, 'q_5cc8aa7483900', '3', 'Q_5cc8aa590b97b', 'Quest1', '2019-04-30', 'Op1', 'Op2', 'Op3'),
(11, 'q_5cc36b2e04466', '1', 'Q_5cc35925a8248', 'Quest4', '2019-04-26', 'Opt1', 'Opt2', 'Opt3'),
(7, 'q_5cc3593322cc0', '2', 'Q_5cc35925a8248', 'Quest1', '2019-04-26', 'Op1', 'Op2', 'Option3'),
(8, 'q_5cc3593b69a38', '3', 'Q_5cc35925a8248', 'Quest2', '2019-04-26', 'Op1', 'Op2', 'Op3'),
(16, 'q_5cc8abd41d504', '2', 'Q_5cc8aaca8a578', 'Quest2', '2019-04-30', 'Op1', 'Op2', 'Op3'),
(17, 'q_5cc94a12d2a5e', '1', 'Q_5cc339829bb64', 'Quest2', '2019-05-01', 'Op1', 'Op2', 'Op3'),
(18, 'q_5cc94a1dbcb31', '2', 'Q_5cc339829bb64', 'Quest1', '2019-05-01', 'Op1', 'Op2', 'Op3'),
(19, 'q_5cc94a26829d2', '3', 'Q_5cc339829bb64', 'Quest3', '2019-05-01', 'Op1', 'Op2', 'Op3');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `no` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_of_registration` varchar(100) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`no`, `student_id`, `name`, `gender`, `faculty`, `year`, `email`, `username`, `password`, `date_of_registration`, `active`) VALUES
(2, '99932', 'First Student', 'M', 'Science', '3', 'student@mail.com', 'student', 'pass', '2019-04-26', 1),
(3, '83722', 'Second Student', 'F', 'Bam', '2', 'second@mail.com', '83722', '83722', '2019-04-26', 1),
(9, '11', 'Student 11', 'M', 'Science', '3', 'student@gmail.com', '11', '11', '2019-05-01', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
