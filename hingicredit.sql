-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2017 at 09:16 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hingicredit`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `bank` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `processedBy` int(11) NOT NULL,
  `applicantName` varchar(50) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `age` int(11) NOT NULL,
  `loanSizeRequested` float NOT NULL,
  `householdSize` int(11) NOT NULL,
  `categoryOfCropsGrown` varchar(27) NOT NULL,
  `farmSize` decimal(10,0) NOT NULL,
  `useOfAgriculturalIncentives` varchar(20) NOT NULL,
  `valueOfProduction` float NOT NULL,
  `numberOfWorkers` int(11) NOT NULL,
  `categoryOfLivestock` varchar(10) NOT NULL,
  `citizen` varchar(11) NOT NULL,
  `unservicedLoans` varchar(10) NOT NULL,
  `nonAgriculturalIncome` varchar(5) NOT NULL,
  `maritalStatus` varchar(10) NOT NULL,
  `employed` varchar(11) NOT NULL,
  `levelOfEducation` varchar(5) NOT NULL,
  `accountHolder` varchar(20) NOT NULL,
  `bankAccountBalance` float NOT NULL,
  `gotALoanBefore` varchar(5) NOT NULL,
  `agriculturalTraining` varchar(5) NOT NULL,
  `yearsExperienceInAgriculture` int(3) NOT NULL,
  `proximityToMarket` varchar(5) NOT NULL,
  `scoreLabel` int(11) NOT NULL,
  `scoreProbability` decimal(10,9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `bank`, `branch`, `processedBy`, `applicantName`, `gender`, `age`, `loanSizeRequested`, `householdSize`, `categoryOfCropsGrown`, `farmSize`, `useOfAgriculturalIncentives`, `valueOfProduction`, `numberOfWorkers`, `categoryOfLivestock`, `citizen`, `unservicedLoans`, `nonAgriculturalIncome`, `maritalStatus`, `employed`, `levelOfEducation`, `accountHolder`, `bankAccountBalance`, `gotALoanBefore`, `agriculturalTraining`, `yearsExperienceInAgriculture`, `proximityToMarket`, `scoreLabel`, `scoreProbability`) VALUES
(1, 3, 0, 0, 'JarvinMutatiina', 'male', 22, 5000000, 0, 'Cash Crops', '200', 'TRUE', 20000000000, 10, 'None', 'citizen', 'no', '0', 'M1', 'employed', 'E4', 'accou', 0, 'no', 'TRUE', 4, '', 0, '0.000000000'),
(2, 3, 0, 0, 'Jane nn', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(3, 3, 0, 0, 'hjas sd', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(4, 3, 0, 0, 'hjas sd', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(5, 3, 0, 0, 'haj da', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(6, 3, 0, 0, 'haj da', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(7, 3, 0, 0, 'ghsad da', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(8, 3, 0, 0, 'af rgw', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(9, 3, 0, 0, 'ahjdd be', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(10, 3, 0, 0, 'sgg gdbs', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(11, 3, 0, 0, 'fga fef', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(12, 3, 0, 0, 'sdhka anmas', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(13, 3, 0, 0, 'kahs sjS', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(14, 3, 0, 0, 'shf sdj', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(15, 3, 0, 0, 'cja;d da,m', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(16, 3, 0, 0, 'dau aasmn', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(17, 3, 0, 0, 'dau aasmn', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(18, 3, 0, 0, 'agjshh dma', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(19, 3, 0, 0, 'sjklk dke', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '0', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000'),
(20, 3, 0, 0, 'Jake mm', 'male', 20, 2000000, 5, 'Cash Crops', '4', 'True', 5000000, 4, 'Poultry', 'citizen', 'no', '0', 'M1', 'notemployed', 'E4', 'accou', 0, 'no', 'True', 2, '', 0, '0.000000000'),
(21, 3, 0, 0, 'Blake MM', 'male', 30, 4000000, 6, 'Perishable', '5', 'False', 600000, 5, 'Piggery', 'citizen', 'no', '0', 'M2', 'notemployed', 'E4', 'accou', 0, 'yes', 'False', 3, 'P3', 0, '0.000000000'),
(22, 3, 0, 0, 'Gahs ahj', 'female', 40, 1000000, 2, 'Perishable', '3', 'False', 300000, 2, 'Cattle', 'noncitizen', 'no', '0', 'M3', 'notemployed', 'E3', 'non-a', 0, 'no', 'False', 1, 'P4', 2, '1.000000000'),
(23, 3, 0, 0, 'Fath dkjs', 'female', 34, 500000, 6, 'Non-perish', '1', 'False', 200000, 1, 'Goats', 'noncitizen', 'no', '0', 'M4', 'notemployed', 'E1', 'non-accountholder', 0, 'no', 'False', 1, 'P3', 2, '0.932510853'),
(24, 3, 0, 0, 'ssdjd rggeg', 'male', 23, 1000000, 3, 'Perishable', '1', 'False', 200000, 1, 'Cattle', 'noncitizen', 'no', 'A1', 'M1', 'notemployed', 'E1', 'non-accountholder', 0, 'no', 'False', 1, 'P4', 2, '0.896563292'),
(25, 3, 0, 0, 'gh ht', '', 0, 0, 0, '', '0', '', 0, 0, '', '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '0.000000000');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Contact` varchar(30) NOT NULL,
  `branches` int(11) NOT NULL,
  `users` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tin` int(20) NOT NULL,
  `logo` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `veriffied` int(11) NOT NULL,
  `date_crtd` date NOT NULL,
  `date_ver` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `Location`, `Contact`, `branches`, `users`, `email`, `tin`, `logo`, `password`, `status`, `veriffied`, `date_crtd`, `date_ver`) VALUES
(3, 'Barclay bank  (U) limited', 'Wandegeya, kampala', '+256778693362', 4, 10, 'barclays@gmail.com', 74836979, '', '5148da4146904d756f1d244a46c2448ad7d5ca22', 1, 0, '0000-00-00', '0000-00-00'),
(7, 'Cenetenary Rural development Bank (u) Limited', 'Mapeera House, Kampala Road', '+256706534812', 0, 0, 'info@centenary.co.ug', 2147483647, '', '5148da4146904d756f1d244a46c2448ad7d5ca22', 0, 0, '0000-00-00', '0000-00-00'),
(8, 'dfcu', 'kampala', '078969', 0, 0, 'jarvin@gmail.com', 48, '', 'b0805a56aaaea2a138dd2216091e426873192df2', 1, 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `bank_users`
--

CREATE TABLE `bank_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `bank` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_users`
--

INSERT INTO `bank_users` (`id`, `name`, `role`, `email`, `password`, `bank`, `branch`, `date_added`, `status`) VALUES
(1, 'akankwasa brian', 'admin', 'donbrians@ymail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709\r\n', 3, 1, '2017-04-17', 0),
(10, 'Komurungi Martha', 'user', 'mkomurungi@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 3, 2, '2017-04-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `bank` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `location` varchar(100) NOT NULL,
  `users` int(11) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `bank`, `name`, `role`, `location`, `users`, `contact`, `status`) VALUES
(1, 3, 'Wandegeya branch', '', 'Wandegey stage', 0, '25679805809', 1),
(2, 3, 'Kebisoni branch', '', 'kebisoni stage', 0, '8559859', 1),
(4, 3, 'buynaja', '', 'buyanja ', 0, '09094580', 1),
(10, 3, 'njn', '', 'jnhj', 0, '878', 0),
(11, 3, 'gulu market branch', '', 'gulu tradidnc center', 0, '595989080850', 1),
(12, 3, 'Kololo atm ', '', 'dhbh', 0, '23498649869', 1);

-- --------------------------------------------------------

--
-- Table structure for table `b_admin`
--

CREATE TABLE `b_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `bank` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `loggedin` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sys_admin`
--

CREATE TABLE `sys_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `loggedin` int(11) NOT NULL,
  `blocked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='contain all the system administrators who can log into the system';

--
-- Dumping data for table `sys_admin`
--

INSERT INTO `sys_admin` (`id`, `name`, `username`, `password`, `role`, `loggedin`, `blocked`) VALUES
(1, 'don brians', 'don brians', '5148da4146904d756f1d244a46c2448ad7d5ca22', 'super admin', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`email`),
  ADD UNIQUE KEY `tin` (`tin`);

--
-- Indexes for table `bank_users`
--
ALTER TABLE `bank_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `b_admin`
--
ALTER TABLE `b_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sys_admin`
--
ALTER TABLE `sys_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `bank_users`
--
ALTER TABLE `bank_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `b_admin`
--
ALTER TABLE `b_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sys_admin`
--
ALTER TABLE `sys_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
