-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2020 at 12:29 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `incidents`
--

CREATE TABLE `incidents` (
  `IncidentId` int(50) NOT NULL,
  `loggerId` varchar(50) NOT NULL,
  `Incident_details` text NOT NULL,
  `Incident_status` varchar(50) NOT NULL,
  `Incident_notes` text NOT NULL,
  `Assignee` varchar(50) NOT NULL,
  `Incident_urgency` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incidents`
--

INSERT INTO `incidents` (`IncidentId`, `loggerId`, `Incident_details`, `Incident_status`, `Incident_notes`, `Assignee`, `Incident_urgency`) VALUES
(6, 'Logger', ' Enter incident Details ', 'Complete', 'Welldone', 'User', 'Critical'),
(7, 'Logger', ' Enter incident Details ', 'Pending', '', 'User', 'Major'),
(8, 'Logger', ' Enter incident Details ', 'Pending', 'Haha', 'User', 'Critical'),
(9, 'Logger', ' Enter incident Details ', 'Pending', '', 'User', 'Minor'),
(10, 'Looger', ' Enter incident Details ', 'Pending', '', 'User', 'Major'),
(11, 'Logger', 'Well', 'Complete', 'lol', 'User2', 'Minor'),
(12, 'Logger', 'tuyw', 'Complete', '', 'User7', 'Major');

-- --------------------------------------------------------

--
-- Table structure for table `logincreds`
--

CREATE TABLE `logincreds` (
  `compid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usercat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logincreds`
--

INSERT INTO `logincreds` (`compid`, `password`, `usercat`) VALUES
('Admin', '000', 'admin'),
('David', '63666', 'admin'),
('Logger', '566', 'logger'),
('tyy', '574839', 'logger'),
('uiopp4', '78889', 'user'),
('User ', '12345', 'user'),
('User7', '12345', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incidents`
--
ALTER TABLE `incidents`
  ADD PRIMARY KEY (`IncidentId`);

--
-- Indexes for table `logincreds`
--
ALTER TABLE `logincreds`
  ADD PRIMARY KEY (`compid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incidents`
--
ALTER TABLE `incidents`
  MODIFY `IncidentId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
