-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 11:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`) VALUES
(1, 'Administrator', 'Admin@1234', 'IAN MWENDWA');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `admin_reply` text NOT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `admin_reply`, `status`) VALUES
(5, 'Sheebah kerubo kengele', 'bethkerubo193@gmail.com', 'Iam having problem voting', 'currently we are experiencing a technical issue but will solve it as so as possible;', 'replied'),
(6, 'beth', 'bethkerubo193@gmail.com', 'hello', 'hello', 'replied'),
(7, 'IAN', 'ianmwendwa5@gmail.com', 'Iam having issue with voting', 'We will look into the issue as soon as possible', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `nominees`
--

CREATE TABLE `nominees` (
  `id` int(11) NOT NULL,
  `org` varchar(60) NOT NULL,
  `pos` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `course` varchar(60) NOT NULL,
  `year` varchar(3) NOT NULL,
  `stud_id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nominees`
--

INSERT INTO `nominees` (`id`, `org`, `pos`, `name`, `course`, `year`, `stud_id`) VALUES
(7, 'Class rep Computer science', 'Male rep.', 'Keen Ombasa', 'FOS', 'IV', 'S15/05678/18'),
(8, 'Class rep Computer science', 'Male rep.', 'Ian mwendwa', 'FOS', 'IV', 'S13/06546/20'),
(9, 'Class rep Computer science', 'Female rep.', 'Brigid Tarrus', 'FOS', 'IV', 'S18/01234/20'),
(10, 'Class rep Computer science', 'Female rep.', 'carol Heta', 'FOS', 'IV', 'S13/05467/19'),
(11, 'egerton', 'chairman', 'sylvia nafula', 'FHS', 'IV', 'S12/02367/18'),
(12, 'Science faculty', 'Congress', 'Laurence Juma', 'FOS', 'IV', 'S13/02364/19'),
(13, 'Science faculty', 'Congress', 'John Paul', 'FOS', 'IV', 'S13/02334/19'),
(14, 'Science faculty', 'Faculty Secretary', 'Ombasa Keen', 'FOL', 'III', 'S18/01446/19'),
(15, 'Science faculty', 'Faculty Secretary', 'Grace Gee', 'FOS', 'III', 'S14/09876/18'),
(16, 'Science faculty', 'Faculty Treasurer', 'John Derrick', 'FOS', 'IV', 'S14/23456/19'),
(17, 'Class rep Computer science', 'Male rep.', 'John Munyendo', 'FOS', 'IV', 'S13/06789/19'),
(18, 'Class rep Computer science', 'Female rep.', 'Zeinab Wainaina', 'FOS', 'II', 'S13/09843/19'),
(19, 'Class rep Computer science', 'Male rep.', 'Ken Muriuki', 'FOS', 'III', 'S13/0578/19'),
(20, 'Class rep Computer science', 'Female rep.', 'Diana Bruce', 'FOS', 'IV', 'S13/02334/19');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `org` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `org`) VALUES
(2, 'Class rep Computer science'),
(3, 'egerton'),
(4, 'Science faculty');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `org` varchar(60) NOT NULL,
  `pos` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `org`, `pos`) VALUES
(4, 'Class rep Computer science', 'Male rep.'),
(5, 'Class rep Computer science', 'Female rep.'),
(6, 'egerton', 'chairman'),
(8, 'Science faculty', 'Congress'),
(9, 'Science faculty', 'Faculty Secretary'),
(10, 'Science faculty', 'Faculty Treasurer'),
(11, 'Science faculty', 'Deputy Congress');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `course` varchar(60) NOT NULL,
  `year` varchar(2) NOT NULL,
  `stud_id` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL DEFAULT 'not null'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `name`, `course`, `year`, `stud_id`, `email`) VALUES
(1, 'Joe weru', 'Bs comp sci', 'IV', 'S13/00010/19', 'not null'),
(4, 'Lusabet Chege', 'FOS', 'IV', 'S13/00011/19', 'not null'),
(5, 'Susan Wanjiru', 'FOS', 'IV', 'S13/00015/19', 'not null'),
(6, 'Dorcas Kamau', 'FEDCOS', 'IV', 'S13/00007/19', 'not null'),
(7, 'Andrew Kibe', 'FASS', 'I', 'S13/00002/19', 'not null'),
(8, 'Candy Jebichi', 'FET', 'II', 'S13/00004/19', 'not null'),
(9, 'Maxwel Maina', 'FERD', 'IV', 'S13/00013/19', 'not null'),
(10, 'Eve Mungai', 'FHS', 'V', 'S13/00008/19', 'not null'),
(11, 'Margaret Ogola', 'FOL', 'II', 'S13/00012/19', 'not null'),
(12, 'Tarus Jepchumba', 'FVMS', 'IV', 'S13/00016/19', 'not null'),
(13, 'Zeinab Wainaina', 'IWGDS', 'II', 'S13/00019/19', 'not null'),
(14, 'Clement Moi', 'SoDL', 'II', 'S13/00006/19', 'not null'),
(15, 'Brenda Ombasa', 'SoDL', 'IV', 'S13/00003/19', 'not null'),
(16, 'Tasliya Yusuf', 'FOS', 'IV', 'S13/00017/19', 'not null'),
(17, 'mukoya', 'FOS', 'IV', 'S13/00014/19', 'not null'),
(18, 'Valentine Muthoni', 'FEDCOS', 'V', 'S13/00018/19', 'not null'),
(19, 'Charity Wangari', 'FOS', 'II', 'S13/00005/19', 'not null'),
(20, 'jojo', 'FOS', 'II', 'S13/02314/19', 'not null'),
(21, 'jose', 'FEDCOS', 'II', 'S13/02314/19', 'not null'),
(22, 'Joseph WERU', 'FASS', 'I', 'S13/00000/19', 'not null'),
(23, 'IAN', 'FEDCOS', 'II', 'S13/00001/19', 'ianmwendwa5@gmail.com'),
(24, 'Administrator', 'FASS', 'II', 'S13/02315/19', 'not null'),
(25, 'Sheebah kerubo kengele', 'FOS', 'IV', 'S13/02327/19', 'bethkerubo193@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `org` varchar(60) NOT NULL,
  `pos` varchar(60) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `voters_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `org`, `pos`, `candidate_id`, `voters_id`) VALUES
(1, 'SPORTS CLUB', 'President', 1, 1),
(2, 'SPORTS CLUB', 'Vice-President', 4, 1),
(3, 'SPORTS CLUB', 'Secretary', 5, 1),
(4, 'SPORTS CLUB', 'President', 1, 2),
(5, 'SPORTS CLUB', 'Vice-President', 3, 2),
(6, 'SPORTS CLUB', 'Secretary', 5, 2),
(7, 'SPORTS CLUB', 'President', 1, 3),
(8, 'SPORTS CLUB', 'Vice-President', 3, 3),
(9, 'SPORTS CLUB', 'Secretary', 5, 3),
(10, 'Class rep Computer science', 'Female rep.', 9, 4),
(11, 'Class rep Computer science', 'Male rep.', 0, 4),
(12, 'Class rep Computer science', 'Male rep.', 7, 5),
(13, 'Class rep Computer science', 'Female rep.', 10, 5),
(14, 'Class rep Computer science', 'Male rep.', 7, 6),
(15, 'Class rep Computer science', 'Female rep.', 10, 6),
(16, 'Class rep Computer science', 'Male rep.', 7, 16),
(17, 'Class rep Computer science', 'Female rep.', 0, 16),
(18, 'Class rep Computer science', 'Female rep.', 9, 17),
(19, 'Class rep Computer science', 'Male rep.', 8, 17),
(20, 'Class rep Computer science', 'Male rep.', 7, 1),
(21, 'Class rep Computer science', 'Female rep.', 0, 1),
(22, 'Class rep Computer science', 'Male rep.', 0, 20),
(23, 'Class rep Computer science', 'Female rep.', 9, 20),
(24, 'egerton', 'chairman', 11, 1),
(25, 'Class rep Computer science', 'Female rep.', 9, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nominees`
--
ALTER TABLE `nominees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nominees`
--
ALTER TABLE `nominees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
