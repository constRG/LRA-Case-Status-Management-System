-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 10:29 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lra_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `user_password`) VALUES
(1, 'ADMIN', 'Admin123');

-- --------------------------------------------------------

--
-- Table structure for table `lra_data_tb`
--

CREATE TABLE `lra_data_tb` (
  `id` int(11) NOT NULL,
  `case_number` varchar(100) NOT NULL,
  `rtc_branch` varchar(500) NOT NULL,
  `subject_matter` varchar(500) NOT NULL,
  `type_of_document` varchar(500) NOT NULL,
  `judicial_region` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lra_data_tb`
--

INSERT INTO `lra_data_tb` (`id`, `case_number`, `rtc_branch`, `subject_matter`, `type_of_document`, `judicial_region`, `status`) VALUES
(1, 'SAMPLE CASE NUMBER', 'SAMPLE RTC BRANCH', 'SAMPLE SUBJECT MATTER', 'PETITION', 'NCR', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `classification` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `user_password`, `classification`) VALUES
(13, 'USER1', 'User123', 'USER'),
(14, 'VIEWER1', 'Viewer123', 'VIEWER');

-- --------------------------------------------------------

--
-- Table structure for table `users_actions_taken_history`
--

CREATE TABLE `users_actions_taken_history` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `case_type` varchar(100) NOT NULL,
  `action_taken` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_actions_taken_history`
--

INSERT INTO `users_actions_taken_history` (`id`, `username`, `case_type`, `action_taken`, `status`) VALUES
(1, 'ADMIN', 'LRC NO. 7-V-21', 'UPDATED', 'DECIDED'),
(2, 'ADMIN', 'LRC NO. 7-V-21', 'UPDATED', 'PENDING'),
(3, 'VIEWER1', 'LRA_DECIDED_DATA_TABLE_(2023/06/20)', 'EXPORTED', 'EXCEL'),
(4, 'USER1', 'LRC NO. P-645-2019', 'UPDATED', 'PENDING'),
(5, 'ADMIN', 'LRC NO. P-645-2019', 'UPDATED', 'DECIDED'),
(6, 'ADMIN', 'SAMPLE', 'ADDED', 'PENDING'),
(7, 'ADMIN', 'SAMPLE 1', 'ADDED', 'DECIDED'),
(8, 'ADMIN', 'LRA_DECIDED_DATA_TABLE_(2023/06/26)', 'EXPORTED', 'EXCEL'),
(9, 'ADMIN', 'SAMPLE CASE NUMBER', 'ADDED', 'PENDING');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lra_data_tb`
--
ALTER TABLE `lra_data_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_actions_taken_history`
--
ALTER TABLE `users_actions_taken_history`
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
-- AUTO_INCREMENT for table `lra_data_tb`
--
ALTER TABLE `lra_data_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users_actions_taken_history`
--
ALTER TABLE `users_actions_taken_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
