-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 07:35 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `et3db`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `CourseName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CourseUnit` int(11) DEFAULT NULL,
  `CourseDescription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CourseURL` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseName`, `CourseUnit`, `CourseDescription`, `CourseURL`) VALUES
('C-10001', 'Java Programming 101', 3, 'Learning Basic Java Program', 'https://www.youtube.com/embed/eIrMbAQSU34'),
('C-10002', 'Database 101', 3, 'Learning basic Database SQL', 'https://www.youtube.com/embed/wR0jg0eQsZA'),
('C-10003', 'HTML and CSS', 3, 'Learning Basics of HTML and CSS', 'https://www.youtube.com/embed/y3UH2gAhwPI');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DeptID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `DeptName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DeptID`, `DeptName`) VALUES
('D-10001', 'Customer Support');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmpID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `TeamID` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EmpUserName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EmpLastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EmpFirstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EmpStatus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EmpEmail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmpID`, `TeamID`, `EmpUserName`, `EmpLastName`, `EmpFirstName`, `EmpStatus`, `EmpEmail`, `password`) VALUES
('0000078948', 'T-10002', 'mtercero', 'Tercero', 'Marlon', 'Single', 'mtercero@opentext.com', 'Dont4GET'),
('0000078949', 'T-10001', 'jessiea', 'Agravante', 'Jessie', 'Married', 'jessiea@opentext.com', 'Dont4GET');

-- --------------------------------------------------------

--
-- Table structure for table `enrolledcourse`
--

CREATE TABLE `enrolledcourse` (
  `CourseID` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EmpID` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TrainerID` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quizID` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enrolledcourse`
--

INSERT INTO `enrolledcourse` (`CourseID`, `EmpID`, `TrainerID`, `quizID`) VALUES
('0', '78949', '0', NULL),
('C-10001', '0000078949', 'T-10001', 'Q-10001'),
('C-10003', '0000078949', 'T-10001', 'Q-10002');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `ManagerID` int(11) NOT NULL,
  `EmpID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `QuizID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `CourseID` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quizURL` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quizDescription` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`QuizID`, `CourseID`, `quizURL`, `quizDescription`) VALUES
('Q-10001', 'C-10001', 'https://forms.office.com/Pages/ResponsePage.aspx?id=d4ShEDPVzU6njZFtvYSdfEbFyIE_OupOnYt_tMx5NhxUQjRVR0JWTk5BRUdOTVU3V1lQT1VXNkpQOC4u', 'Java Quiz'),
('Q-10002', 'C-10002', 'https://forms.office.com/Pages/ResponsePage.aspx?id=d4ShEDPVzU6njZFtvYSdfK5jo4fvaxVCrGXBoVV1J19UMDJQTlo3WjMxVVVCMlZPVVJORkdKVlNKVi4u', 'HTML and CSS Quiz');

-- --------------------------------------------------------

--
-- Table structure for table `quizresults`
--

CREATE TABLE `quizresults` (
  `quizResultID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `quizID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trainerID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `score` int(3) DEFAULT NULL,
  `totalNoofItems` int(3) DEFAULT NULL,
  `average` int(4) DEFAULT NULL,
  `QuizDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `TeamID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `DeptID` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TeamName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TeamCostCenter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`TeamID`, `DeptID`, `TeamName`, `TeamCostCenter`) VALUES
('T-10001', 'D-10001', 'Portfolio', 0),
('T-10002', 'D-10001', 'SAAS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `TrainerID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `EmpID` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`TrainerID`, `EmpID`) VALUES
('T-10001', '0000078948');

-- --------------------------------------------------------

--
-- Table structure for table `usercredentials`
--

CREATE TABLE `usercredentials` (
  `username` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usercredentials`
--

INSERT INTO `usercredentials` (`username`, `password`) VALUES
('mtercero@opentext.com', 'Dont4GET'),
('jessiea@opentext.com', 'Dont4GET');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DeptID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmpID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`ManagerID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`QuizID`);

--
-- Indexes for table `quizresults`
--
ALTER TABLE `quizresults`
  ADD PRIMARY KEY (`quizResultID`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`TeamID`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`TrainerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
