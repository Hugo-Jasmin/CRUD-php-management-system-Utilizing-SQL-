-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 05:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `huyo`
--

-- --------------------------------------------------------

--
-- Table structure for table `calander`
--

CREATE TABLE `calander` (
  `countid` int(12) NOT NULL,
  `id` int(12) NOT NULL,
  `presentdate` date NOT NULL,
  `absentdate` date NOT NULL,
  `datecreated` varchar(24) NOT NULL,
  `comments` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calander`
--

INSERT INTO `calander` (`countid`, `id`, `presentdate`, `absentdate`, `datecreated`, `comments`) VALUES
(43, 34, '0000-00-00', '2024-02-06', '2024-02-05 17:18:32', 'traffic'),
(44, 34, '2024-02-07', '0000-00-00', '2024-02-05 17:18:40', 'present'),
(45, 41, '2024-02-14', '0000-00-00', '2024-02-05 17:26:09', 'wsafsa'),
(46, 35, '2024-02-06', '0000-00-00', '2024-02-05 17:59:10', '02'),
(47, 36, '2024-02-06', '0000-00-00', '2024-02-06 01:19:12', 'late'),
(48, 35, '2024-02-07', '0000-00-00', '2024-02-06 01:31:37', 'incogni'),
(49, 36, '2024-02-07', '0000-00-00', '2024-02-06 01:38:22', 'present'),
(50, 46, '2024-02-06', '0000-00-00', '2024-02-06 01:59:38', 'present'),
(51, 46, '0000-00-00', '2024-02-07', '2024-02-06 02:00:04', 'high traffic'),
(52, 46, '2024-02-08', '0000-00-00', '2024-02-06 02:00:25', 'present'),
(53, 34, '2024-02-08', '0000-00-00', '2024-02-06 02:08:58', 'present'),
(54, 34, '2024-02-28', '0000-00-00', '2024-02-06 02:09:24', '2'),
(55, 47, '2024-02-06', '0000-00-00', '2024-02-06 02:16:24', 'present'),
(56, 47, '0000-00-00', '2024-02-07', '2024-02-06 02:16:36', 'traffic'),
(57, 47, '2024-02-09', '0000-00-00', '2024-02-06 02:17:26', 'present'),
(58, 48, '2024-02-06', '0000-00-00', '2024-02-06 02:24:05', 'present'),
(59, 48, '0000-00-00', '2024-02-07', '2024-02-06 02:24:21', 'sick'),
(60, 48, '2024-02-08', '0000-00-00', '2024-02-06 02:24:36', 'present'),
(61, 49, '2024-02-06', '0000-00-00', '2024-02-06 02:38:14', 'present'),
(62, 49, '0000-00-00', '2024-02-07', '2024-02-06 02:38:32', 'sick');

-- --------------------------------------------------------

--
-- Table structure for table `employeehistory`
--

CREATE TABLE `employeehistory` (
  `countid` int(12) NOT NULL,
  `historyaction` varchar(24) NOT NULL,
  `historyemployeetype` varchar(24) NOT NULL,
  `historyname` varchar(24) NOT NULL,
  `historyadress` varchar(24) NOT NULL,
  `historywage` int(24) NOT NULL,
  `historybonus` int(24) NOT NULL,
  `historypayplan` varchar(12) NOT NULL,
  `historynote` varchar(100) NOT NULL,
  `historyjob` varchar(24) NOT NULL,
  `historyid` int(12) NOT NULL,
  `datechanged` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeehistory`
--

INSERT INTO `employeehistory` (`countid`, `historyaction`, `historyemployeetype`, `historyname`, `historyadress`, `historywage`, `historybonus`, `historypayplan`, `historynote`, `historyjob`, `historyid`, `datechanged`) VALUES
(311, 'edit', 'office', 'employee0', 'employeeStreet0', 300000, 400344, 'daily', 'a person employed for wages or salary, especially at nonexecutive level. \"the company has over 500 e', 'accounting', 34, '2024-02-06 02:07:43'),
(312, 'edit', 'office', 'employee0', 'employeeStreet0', 300000, 400344, 'daily', 'a person employed for wages or salary, especially at nonexecutive level. \"the company has over 500 e', 'accounting', 34, '2024-02-06 02:08:21'),
(313, 'edit', 'office', 'employee0', 'employeeStreet0', 300000, 400688, 'daily', 'a person employed for wages or salary, especially at nonexecutive level. \"the company has over 500 e', 'accounting', 34, '2024-02-06 02:08:26'),
(314, 'edit', 'office', 'employee0', 'employeeStreet0', 300000, 100688, 'daily', 'a person employed for wages or salary, especially at nonexecutive level. \"the company has over 500 e', 'accounting', 34, '2024-02-06 02:08:31'),
(315, 'edit', 'office', 'employee0', 'employeeStreet0', 300000, -99312, 'daily', 'a person employed for wages or salary, especially at nonexecutive level. \"the company has over 500 e', 'accounting', 34, '2024-02-06 02:08:37'),
(316, 'edit', 'office', 'employee0', 'employeeStreet0', 300000, -198624, 'daily', 'a person employed for wages or salary, especially at nonexecutive level. \"the company has over 500 e', 'accounting', 34, '2024-02-06 02:08:43'),
(317, 'create', 'workshop', 'newemployee1', 'street', 300000, 0, 'weekly', 'NA', 'security supervisor', 47, '2024-02-06 02:14:28'),
(318, 'edit', 'workshop', 'newemployee1', 'street', 300000, 0, 'weekly', 'NA', 'security supervisor', 47, '2024-02-06 02:17:33'),
(319, 'edit', 'workshop', 'newemployee1', 'street', 300000, 200000, 'weekly', 'NA', 'security supervisor', 47, '2024-02-06 02:18:56'),
(320, 'deletion', 'workshop', 'EMPLOYEE10', 'employeestreet10', 100000, 0, 'daily', 'NA', 'security Guard', 45, '2024-02-06 02:19:39'),
(321, 'create', 'workshop', 'newemployee12', 'street12', 20000, 0, 'daily', 'NA', 'security consultant', 48, '2024-02-06 02:22:00'),
(322, 'edit', 'workshop', 'newemployee12', 'street12', 20000, 0, 'daily', 'NA', 'security consultant', 48, '2024-02-06 02:24:48'),
(323, 'edit', 'workshop', 'newemployee12', 'street12', 20000, 200000, 'daily', 'NA', 'security consultant', 48, '2024-02-06 02:26:08'),
(324, 'deletion', 'office', 'newemployee4', 'street', 200000, 200000, 'daily', 'NA', 'security supervisor', 47, '2024-02-06 02:26:43'),
(325, 'create', 'workshop', 'Dave', 'street', 30000, 0, 'daily', 'NA', 'water consultant', 49, '2024-02-06 02:36:55'),
(326, 'edit', 'workshop', 'Dave', 'street', 30000, 0, 'daily', 'NA', 'water consultant', 49, '2024-02-06 02:38:50'),
(327, 'edit', 'workshop', 'Dave', 'street', 30000, 200000, 'daily', 'NA', 'water consultant', 49, '2024-02-06 02:39:20'),
(328, 'deletion', 'workshop', 'newemployee14', 'street14', 100000, 200000, 'weekly', 'NA', 'security consultantor', 48, '2024-02-06 02:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `Nama` varchar(24) NOT NULL,
  `alamat` varchar(24) NOT NULL,
  `gaji` int(11) NOT NULL,
  `bonus` int(24) NOT NULL,
  `payplan` varchar(24) NOT NULL,
  `job` varchar(24) NOT NULL,
  `note` varchar(100) NOT NULL,
  `employeetype` varchar(24) NOT NULL,
  `id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`Nama`, `alamat`, `gaji`, `bonus`, `payplan`, `job`, `note`, `employeetype`, `id`) VALUES
('employee0', 'employeeStreet0', 300000, 0, 'daily', 'accounting', 'a person employed for wages or salary, especially at nonexecutive level. \"the company has over 500 e', 'office', 34),
('employee1', 'employeeStreet1', 200000, 0, 'weekly', 'Wood Worker', 'a person employed for wages or salary, especially at nonexecutive level. \"the company has over 500 e', 'workshop', 35),
('employee2', 'employeeStreet2', 2500000, 0, 'monthly', 'Security Guard', 'a person employed for wages or salary, especially at nonexecutive level. \"the company has over 500 e', 'office', 36),
('Shapiro', 'street', 100000, 200000, 'weekly', 'water consultant', 'NA', 'office', 49);

-- --------------------------------------------------------

--
-- Table structure for table `overhead`
--

CREATE TABLE `overhead` (
  `name` varchar(24) NOT NULL,
  `id` int(12) NOT NULL,
  `category` varchar(12) NOT NULL,
  `frequency` varchar(12) NOT NULL,
  `description` varchar(150) NOT NULL,
  `cost` int(24) NOT NULL,
  `date` varchar(24) NOT NULL,
  `status` varchar(24) NOT NULL,
  `invoiceNo` int(24) NOT NULL,
  `comments` varchar(150) NOT NULL,
  `vendor` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `overhead`
--

INSERT INTO `overhead` (`name`, `id`, `category`, `frequency`, `description`, `cost`, `date`, `status`, `invoiceNo`, `comments`, `vendor`) VALUES
('overhead0', 4, 'utilities', 'daily', 'State Electricity Company or commonly abbreviated as PLN, is an Indonesian state-owned company which operates in the electricity sector.', 100000, '2024-02-14', '', 210942, 'NA', 'PLN'),
('overhead1', 5, 'supplies', 'daily', 'NA', 500000, '2024-02-15', '', 214215, 'NA', 'GlassCompany');

-- --------------------------------------------------------

--
-- Table structure for table `overheadhistory`
--

CREATE TABLE `overheadhistory` (
  `uniqueid` int(12) NOT NULL,
  `historyaction` varchar(12) NOT NULL,
  `historyname` varchar(24) NOT NULL,
  `historyvendor` varchar(24) NOT NULL,
  `historycategory` varchar(24) NOT NULL,
  `historyfrequency` varchar(24) NOT NULL,
  `historydescription` varchar(150) NOT NULL,
  `historycost` int(24) NOT NULL,
  `historydate` date NOT NULL,
  `historystatus` varchar(24) NOT NULL,
  `historyinvoiceNo` int(24) NOT NULL,
  `historycomments` varchar(150) NOT NULL,
  `historyid` int(12) NOT NULL,
  `datecreated` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `overheadhistory`
--

INSERT INTO `overheadhistory` (`uniqueid`, `historyaction`, `historyname`, `historyvendor`, `historycategory`, `historyfrequency`, `historydescription`, `historycost`, `historydate`, `historystatus`, `historyinvoiceNo`, `historycomments`, `historyid`, `datecreated`) VALUES
(3, 'create', 'overhead0', 'PLN', 'utilities', 'daily', 'State Electricity Company or commonly abbreviated as PLN, is an Indonesian state-owned company which operates in the electricity sector.', 100000, '2024-02-14', '', 210942, 'NA', 4, '2024-02-05 15:59:41'),
(4, 'create', 'overhead1', 'GlassCompany', 'supplies', 'daily', 'NA', 500000, '2024-02-15', '', 214215, 'NA', 5, '2024-02-05 16:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `subcon`
--

CREATE TABLE `subcon` (
  `id` int(12) NOT NULL,
  `name` varchar(24) NOT NULL,
  `work` varchar(24) NOT NULL,
  `pay` int(24) NOT NULL,
  `newPay` int(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcon`
--

INSERT INTO `subcon` (`id`, `name`, `work`, `pay`, `newPay`) VALUES
(9, 'subcon0', 'lighting installer', 4000000, 4000000),
(10, 'subcon1', 'brick wall layer', 1000000, 1000000),
(11, 'subcon2', 'glass sourcer', 300000, 300000),
(12, 'subcon3', 'FloorLayer', 3000000, 3000000),
(17, 'subcon6', 'glass pane installation', 100000, 100000),
(19, 'subcon6', 'floor planner', 500000, 400000);

-- --------------------------------------------------------

--
-- Table structure for table `subconhistory`
--

CREATE TABLE `subconhistory` (
  `uniqueid` int(12) NOT NULL,
  `historyaction` varchar(24) NOT NULL,
  `historyname` varchar(24) NOT NULL,
  `historywork` varchar(24) NOT NULL,
  `historypay` int(24) NOT NULL,
  `addPay` int(24) NOT NULL,
  `subPay` int(24) NOT NULL,
  `leftpay` int(24) NOT NULL,
  `historyid` int(12) NOT NULL,
  `datechanged2` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subconhistory`
--

INSERT INTO `subconhistory` (`uniqueid`, `historyaction`, `historyname`, `historywork`, `historypay`, `addPay`, `subPay`, `leftpay`, `historyid`, `datechanged2`) VALUES
(34, 'create', 'subcon0', 'lighting installer', 4000000, 0, 0, 4000000, 9, '0000-00-00'),
(35, 'create', 'subcon1', 'brick wall layer', 1000000, 0, 0, 1000000, 10, '0000-00-00'),
(36, 'create', 'subcon2', 'glass sourcer', 300000, 0, 0, 300000, 11, '0000-00-00'),
(41, 'deletion', 'subcon3', 'FloorLayer', 3000000, 0, 0, 3000000, 13, '2024-02-05 16:07:13'),
(42, 'create', 'subcon6', 'glass pane installation', 100000, 0, 0, 100000, 17, '2024-02-05 17:19:48'),
(43, 'create', 'subcon12', 'makes wood planks', 300000, 0, 0, 300000, 18, '2024-02-06 02:20:22'),
(44, 'deletion', 'subcon12', 'makes wood planks', 300000, 0, 0, 300000, 18, '2024-02-06 02:20:43'),
(45, 'create', 'subcon5', 'floor planner', 500000, 0, 0, 500000, 19, '2024-02-06 02:27:34'),
(46, 'edit', 'subcon5', 'floor planner', 500000, 300000, 0, 200000, 19, '2024-02-06 02:28:05'),
(47, 'edit', 'subcon5', 'floor planner', 500000, 0, 100000, 300000, 19, '2024-02-06 02:28:19'),
(48, 'edit', 'subcon5', 'floor planner', 500000, 0, 0, 300000, 19, '2024-02-06 02:28:31'),
(49, 'edit', 'subcon6', 'floor planner', 500000, 200000, 0, 300000, 19, '2024-02-06 02:40:49'),
(50, 'edit', 'subcon6', 'floor planner', 500000, 0, 100000, 400000, 19, '2024-02-06 02:40:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calander`
--
ALTER TABLE `calander`
  ADD PRIMARY KEY (`countid`);

--
-- Indexes for table `employeehistory`
--
ALTER TABLE `employeehistory`
  ADD PRIMARY KEY (`countid`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overhead`
--
ALTER TABLE `overhead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overheadhistory`
--
ALTER TABLE `overheadhistory`
  ADD PRIMARY KEY (`uniqueid`);

--
-- Indexes for table `subcon`
--
ALTER TABLE `subcon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subconhistory`
--
ALTER TABLE `subconhistory`
  ADD PRIMARY KEY (`uniqueid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calander`
--
ALTER TABLE `calander`
  MODIFY `countid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `employeehistory`
--
ALTER TABLE `employeehistory`
  MODIFY `countid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `overhead`
--
ALTER TABLE `overhead`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `overheadhistory`
--
ALTER TABLE `overheadhistory`
  MODIFY `uniqueid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcon`
--
ALTER TABLE `subcon`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subconhistory`
--
ALTER TABLE `subconhistory`
  MODIFY `uniqueid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
