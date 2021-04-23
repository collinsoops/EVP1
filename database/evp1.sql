-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2021 at 03:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidate_id` int(16) NOT NULL,
  `position_id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL,
  `bio_info` varchar(90) NOT NULL,
  `election_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `position_id`, `user_id`, `bio_info`, `election_id`) VALUES
(35, 5, 9, 'cnfcfg', 0),
(38, 4, 6, ' bmvcghg hgh', 1),
(40, 6, 11, 'cnfgcgh', 1),
(43, 11, 7, 'bjj,hbh,j', 1),
(44, 5, 4, 'cgnhcg', 1),
(45, 6, 10, 'vjmuhj', 1),
(47, 4, 23, 'n vhvjvj', 0),
(48, 15, 27, 'vmnvn', 2),
(49, 18, 28, 'sbcsd,wcd', 2),
(50, 17, 25, ' vbnvnb', 5),
(51, 16, 29, 'gfgh hcffff vvv', 4);

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `complain_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `complain_text` varchar(400) NOT NULL,
  `complain_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `election_id` int(11) NOT NULL,
  `election_title` varchar(50) NOT NULL,
  `election_description` varchar(200) NOT NULL,
  `election_start_date` date NOT NULL,
  `election_start_time` time NOT NULL,
  `election_end_date` date NOT NULL,
  `election_end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`election_id`, `election_title`, `election_description`, `election_start_date`, `election_start_time`, `election_end_date`, `election_end_time`) VALUES
(1, 'wede', 'jhkcda,bh,k', '2021-04-06', '04:44:00', '0000-00-00', '04:04:00'),
(2, 'fghfgh', 'd.chwekfheuwkh', '2021-04-06', '04:44:00', '0000-00-00', '04:04:00'),
(3, 'hdrgdtrdr', 'cdafewf,kjh,', '2021-04-08', '04:44:00', '0000-00-00', '04:04:00'),
(4, 'wede', 'jhgb,kjh,', '2021-04-06', '04:44:00', '0000-00-00', '04:04:00'),
(5, 'rem', 'vbnvbnvn bnvnvv', '2021-04-07', '17:06:00', '2021-04-29', '07:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `position_id` int(11) NOT NULL,
  `position_description` varchar(50) NOT NULL,
  `priority` int(11) NOT NULL,
  `election_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`position_id`, `position_description`, `priority`, `election_id`) VALUES
(4, 'chairman', 0, 1),
(5, 'mp', 0, 1),
(6, 'mc', 0, 1),
(11, 'erw', 0, 0),
(12, 'trdfg', 0, 0),
(13, 'ghfhf', 0, 0),
(15, 'xcfgnxfxn', 0, 2),
(16, 'nnn', 0, 4),
(17, 'bbbbn', 0, 5),
(18, 'vbnvbnv', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `election_title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`start_date`, `start_time`, `end_date`, `end_time`, `election_title`) VALUES
('2021-04-19', '16:36:00', '2021-04-22', '17:00:00', 'election 2021');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `usertype_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `photo` varchar(40) NOT NULL,
  `lastmodified` datetime NOT NULL,
  `datecreated` datetime NOT NULL,
  `election_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `usertype_id`, `username`, `password`, `firstname`, `lastname`, `photo`, `lastmodified`, `datecreated`, `election_id`) VALUES
(4, 2, 'kkkk', '', 'kkkk', 'kkk', 'vlcsnap-2021-04-16-11h05m49s032.png', '0000-00-00 00:00:00', '2016-04-21 00:00:00', 1),
(6, 2, 'rrrr', '1234', 'rrrrr', 'rrr', 'vlcsnap-2021-04-18-23h13m45s536.png', '2021-04-21 12:42:00', '0000-00-00 00:00:00', 1),
(7, 2, 'bbbb', '', 'bbb', 'bbb', 'Screenshot 2021-04-13 173507.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(9, 2, 'ccc', '', 'ccc', 'ccc', 'vlcsnap-2021-04-16-11h06m25s714.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 2, 'wwww', '', 'www', 'wwww', 'vlcsnap-2021-04-16-11h06m25s714.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(11, 2, 'gggg', '', 'vgg', 'gggg', 'vlcsnap-2021-04-16-11h06m24s246.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(12, 1, 'collins', 'collins', 'collins', 'collins', 'vlcsnap-2021-04-16-11h06m24s246.png', '0000-00-00 00:00:00', '2016-04-21 00:00:00', 1),
(23, 2, 'wwswsws', '', 'b,jkjkb', 'njkn', 'vlcsnap-2021-04-16-11h05m49s032.png', '0000-00-00 00:00:00', '2023-04-21 11:46:55', 5),
(24, 3, 'jsklejslk', '', 'rrwrwr', 'fgyuwefsfw', '', '0000-00-00 00:00:00', '2023-04-21 11:54:23', 5),
(25, 2, 'new', '', 'new', 'new', 'logo.PNG', '0000-00-00 00:00:00', '2023-04-21 12:03:31', 5),
(26, 3, 'bjbcdj', '', 'jhsbjh,a', 'nscjknasdjk', '', '0000-00-00 00:00:00', '2023-04-21 12:20:04', 5),
(27, 2, 'fggg', '', 'jmhvjv', 'cffgncfgc', '', '0000-00-00 00:00:00', '2023-04-21 12:25:52', 2),
(28, 2, 'nnnnn', '', 'nnnn', 'nnnnn', '', '0000-00-00 00:00:00', '2023-04-21 12:35:11', 2),
(29, 2, 'mass', '', 'master', 'mass', '', '0000-00-00 00:00:00', '2023-04-21 14:11:23', 4);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `usertype_id` int(11) NOT NULL,
  `usertype_name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertype_id`, `usertype_name`) VALUES
(1, 'admin'),
(2, 'candidate'),
(3, 'voter');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `vote_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `election_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`vote_id`, `user_id`, `candidate_id`, `position_id`, `election_id`) VALUES
(36, 6, 6, 4, 0),
(37, 6, 9, 5, 0),
(38, 6, 11, 6, 0),
(39, 6, 7, 11, 0),
(40, 12, 6, 4, 1),
(41, 12, 9, 5, 1),
(42, 12, 10, 6, 1),
(43, 12, 25, 17, 5),
(44, 12, 29, 16, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD UNIQUE KEY `id` (`complain_id`),
  ADD UNIQUE KEY `id_2` (`complain_id`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`election_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`usertype_id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidate_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `complain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `election`
--
ALTER TABLE `election`
  MODIFY `election_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `usertype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
