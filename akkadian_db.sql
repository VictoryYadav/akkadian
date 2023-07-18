-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 06:12 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akkadian_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cdomdet`
--

CREATE TABLE `cdomdet` (
  `CDomNo` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `DCd` tinyint(4) NOT NULL,
  `SDCd` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Sub-domain',
  `Stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cdomdet`
--

INSERT INTO `cdomdet` (`CDomNo`, `CourseId`, `DCd`, `SDCd`, `Stat`) VALUES
(1, 6, 1, 1, 0),
(2, 7, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cdurdet`
--

CREATE TABLE `cdurdet` (
  `CDetDurNo` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `Duration` tinyint(4) NOT NULL,
  `Stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cdurdet`
--

INSERT INTO `cdurdet` (`CDetDurNo`, `CourseId`, `Duration`, `Stat`) VALUES
(1, 2, 4, 0),
(2, 2, 6, 0),
(3, 3, 6, 0),
(4, 3, 8, 0),
(5, 4, 4, 0),
(6, 3, 7, 0),
(7, 5, 3, 0),
(8, 4, 8, 0),
(9, 5, 4, 0),
(10, 4, 6, 0),
(11, 6, 5, 0),
(12, 7, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` smallint(11) NOT NULL,
  `country_id` smallint(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `country_id`, `city_name`, `status`) VALUES
(1, 103, 'Mumbai', 0),
(2, 103, 'Delhi', 0),
(3, 103, 'Hyderabad', 0),
(4, 103, 'Banglore', 0);

-- --------------------------------------------------------

--
-- Table structure for table `clngdet`
--

CREATE TABLE `clngdet` (
  `CDetLangNo` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `LngId` tinyint(4) NOT NULL,
  `ARate` int(11) NOT NULL DEFAULT 0,
  `Stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clngdet`
--

INSERT INTO `clngdet` (`CDetLangNo`, `CourseId`, `LngId`, `ARate`, `Stat`) VALUES
(1, 2, 1, 0, 0),
(2, 2, 3, 50, 0),
(3, 3, 1, 0, 0),
(4, 3, 3, 60, 0),
(5, 4, 1, 0, 0),
(6, 4, 2, 60, 0),
(7, 4, 5, 75, 0),
(8, 4, 6, 80, 0),
(9, 6, 7, 60, 0),
(10, 7, 7, 60, 0);

-- --------------------------------------------------------

--
-- Table structure for table `clvldet`
--

CREATE TABLE `clvldet` (
  `CDetLvlNo` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `LevelId` tinyint(4) NOT NULL,
  `Stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clvldet`
--

INSERT INTO `clvldet` (`CDetLvlNo`, `CourseId`, `LevelId`, `Stat`) VALUES
(1, 2, 2, 0),
(2, 2, 3, 0),
(3, 3, 2, 0),
(4, 3, 1, 0),
(5, 4, 2, 0),
(6, 4, 3, 0),
(7, 4, 1, 0),
(8, 6, 2, 0),
(9, 7, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Comp_no` int(11) NOT NULL,
  `Comp_cd` smallint(4) NOT NULL DEFAULT 0,
  `Name` varchar(100) NOT NULL,
  `HOCountryCd` int(11) NOT NULL,
  `HOCityCd` int(11) NOT NULL,
  `company_turnover` decimal(10,2) DEFAULT NULL,
  `no_of_outlets` tinyint(4) DEFAULT NULL,
  `no_of_units` tinyint(4) DEFAULT NULL,
  `industry` tinyint(4) NOT NULL,
  `sector` tinyint(4) NOT NULL,
  `senior_head_name` varchar(30) DEFAULT NULL,
  `senior_email` varchar(255) DEFAULT NULL,
  `partner` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=customer,5=vendor',
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Comp_no`, `Comp_cd`, `Name`, `HOCountryCd`, `HOCityCd`, `company_turnover`, `no_of_outlets`, `no_of_units`, `industry`, `sector`, `senior_head_name`, `senior_email`, `partner`, `created_by`, `created_at`) VALUES
(1, 1, 'SPARC', 91, 22, '0.00', 0, 0, 0, 0, NULL, NULL, 0, 0, NULL),
(2, 2, 'Elxer', 91, 4, '100000.00', 10, 5, 23, 29, NULL, NULL, 0, 5, NULL),
(3, 0, 'akkadian', 91, 1, '222.00', 22, 2, 22, 29, NULL, NULL, 0, 0, NULL),
(4, 0, 'BlueBanyan', 91, 2, NULL, NULL, NULL, 23, 29, 'Vijay', 'vdemo@gmail.com', 0, 5, '2023-02-04 17:20:51'),
(5, 1, 'SPARC', 91, 2, NULL, NULL, NULL, 25, 29, 'Dipu', 'dipu@gmail.com', 0, 5, '2023-02-04 19:41:02'),
(6, 6, 'Berkeley ExcecEd / Berkeley Haas', 91, 1, '1.00', 1, 1, 1, 1, 'dd', 'dd', 5, 5, '2023-02-04 21:52:14'),
(7, 7, 'Wharton Executive Education ', 91, 1, '11.00', 1, 1, 1, 1, 'dd', 'dd', 5, 5, '2023-02-04 21:52:14'),
(19, 19, 'demov', 91, 3, NULL, NULL, NULL, 23, 29, 'ghjk', 'ff@gmail.com', 1, 6, '2023-02-05 10:45:39'),
(20, 1, 'SPARC', 91, 3, NULL, NULL, NULL, 24, 29, 'ghj', 'ff@gmail.com', 1, 6, '2023-02-05 10:46:46'),
(21, 21, 'vendor1 company', 91, 2, NULL, NULL, NULL, 24, 29, 'Vendor se', 'vemail@gmail.com', 5, 8, '2023-02-05 12:19:29'),
(22, 22, 'customer4 company', 91, 3, NULL, NULL, NULL, 25, 29, 'cust4 ', 'cust4senior@gmail.com', 1, 12, '2023-02-05 13:21:30'),
(23, 23, 'customer5 company', 91, 2, NULL, NULL, NULL, 23, 29, 'cust5 Vijay', 'cust5@gmail.com', 1, 13, '2023-02-05 16:19:51'),
(24, 24, 'vendor5 comp', 91, 4, NULL, NULL, NULL, 24, 29, 'ven Vijay', 'vendor5@gmail.com', 1, 14, '2023-02-05 16:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `companydet`
--

CREATE TABLE `companydet` (
  `CompDetCd` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `CompCd` int(11) NOT NULL DEFAULT 0,
  `CountryCd` int(11) NOT NULL DEFAULT 0,
  `CityCd` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companydet`
--

INSERT INTO `companydet` (`CompDetCd`, `Name`, `CompCd`, `CountryCd`, `CityCd`) VALUES
(1, 'Sparc India', 1, 0, 0),
(2, 'Sparc USA', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `compceo`
--

CREATE TABLE `compceo` (
  `CCNo` int(11) NOT NULL,
  `CompDetCd` int(11) NOT NULL,
  `MtngDt` date NOT NULL DEFAULT '1001-01-01',
  `Section` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compceo`
--

INSERT INTO `compceo` (`CCNo`, `CompDetCd`, `MtngDt`, `Section`) VALUES
(1, 1, '1001-01-01', 0),
(2, 2, '2009-09-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `compceodet`
--

CREATE TABLE `compceodet` (
  `CCDetNo` int(11) NOT NULL,
  `CCNo` int(11) NOT NULL,
  `CompDetCd` int(11) NOT NULL,
  `QCd` tinyint(4) NOT NULL,
  `DCd` tinyint(4) NOT NULL,
  `SDCd` int(11) DEFAULT NULL,
  `HML` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compceodet`
--

INSERT INTO `compceodet` (`CCDetNo`, `CCNo`, `CompDetCd`, `QCd`, `DCd`, `SDCd`, `HML`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 1, 1, 1, 2, 1),
(3, 1, 1, 1, 1, 3, 1),
(4, 1, 1, 1, 1, 4, 2),
(5, 1, 1, 1, 1, 5, 2),
(6, 1, 1, 1, 1, 6, 2),
(7, 1, 1, 1, 1, 7, 3),
(8, 1, 1, 1, 1, 8, 3),
(9, 1, 1, 1, 2, 9, 3),
(10, 1, 1, 1, 2, 10, 1),
(11, 1, 1, 1, 2, 11, 1),
(12, 1, 1, 1, 2, 12, 1),
(13, 1, 1, 1, 2, 13, 2),
(14, 1, 1, 1, 2, 14, 2),
(15, 1, 1, 1, 2, 15, 2),
(16, 1, 1, 1, 3, 16, 3),
(17, 1, 1, 1, 3, 17, 3),
(18, 1, 1, 1, 3, 18, 3),
(19, 1, 1, 1, 3, 19, 1),
(20, 1, 1, 1, 3, 20, 1),
(21, 1, 1, 1, 3, 21, 1),
(22, 1, 1, 1, 4, 22, 2),
(23, 1, 1, 1, 4, 23, 2),
(24, 1, 1, 1, 4, 24, 2),
(25, 1, 1, 1, 4, 25, 3),
(26, 1, 1, 1, 4, 26, 3),
(27, 1, 1, 1, 4, 27, 3),
(28, 1, 1, 1, 5, 28, 1),
(29, 1, 1, 1, 5, 29, 1),
(30, 1, 1, 1, 5, 30, 1),
(31, 1, 1, 1, 5, 31, 2),
(32, 1, 1, 1, 5, 32, 2),
(33, 1, 1, 1, 5, 33, 2),
(34, 1, 1, 1, 6, 34, 3),
(35, 1, 1, 1, 6, 35, 3),
(36, 1, 1, 1, 6, 36, 3),
(37, 1, 1, 1, 6, 37, 1),
(38, 1, 1, 1, 6, 38, 1),
(39, 1, 1, 1, 6, 39, 1),
(40, 1, 1, 1, 7, 46, 2),
(41, 1, 1, 1, 7, 47, 2),
(42, 1, 1, 1, 7, 48, 2),
(43, 1, 1, 1, 7, 49, 3),
(44, 1, 1, 1, 7, 50, 3),
(45, 1, 1, 1, 7, 51, 3);

-- --------------------------------------------------------

--
-- Table structure for table `compemp`
--

CREATE TABLE `compemp` (
  `CEmpNo` int(11) NOT NULL,
  `CCNo` int(11) NOT NULL,
  `CompDetCd` int(11) NOT NULL,
  `EmpCd` varchar(15) NOT NULL,
  `Section` int(11) NOT NULL,
  `SDCd` int(11) NOT NULL,
  `Rating` tinyint(4) NOT NULL COMMENT '1-10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compemp`
--

INSERT INTO `compemp` (`CEmpNo`, `CCNo`, `CompDetCd`, `EmpCd`, `Section`, `SDCd`, `Rating`) VALUES
(1, 1, 1, '1', 0, 1, 8),
(2, 1, 1, '1', 0, 2, 8),
(3, 1, 1, '1', 0, 3, 8),
(4, 1, 1, '1', 0, 4, 8),
(5, 1, 1, '1', 0, 5, 8),
(6, 1, 1, '1', 0, 6, 8),
(7, 1, 1, '1', 0, 7, 8),
(8, 1, 1, '1', 0, 8, 8),
(9, 1, 1, '1', 0, 9, 8),
(10, 1, 1, '1', 0, 10, 8),
(11, 1, 1, '1', 0, 11, 8),
(12, 1, 1, '1', 0, 12, 8),
(13, 1, 1, '1', 0, 13, 8),
(14, 1, 1, '1', 0, 14, 8),
(15, 1, 1, '1', 0, 15, 8),
(16, 1, 1, '1', 0, 16, 8),
(17, 1, 1, '1', 0, 17, 8),
(18, 1, 1, '1', 0, 18, 8),
(19, 1, 1, '1', 0, 19, 8),
(20, 1, 1, '1', 0, 20, 8),
(21, 1, 1, '1', 0, 21, 8),
(22, 1, 1, '1', 0, 22, 8),
(23, 1, 1, '1', 0, 23, 8),
(24, 1, 1, '1', 0, 24, 8),
(25, 1, 1, '1', 0, 25, 8),
(26, 1, 1, '1', 0, 26, 8),
(27, 1, 1, '1', 0, 27, 8),
(28, 1, 1, '1', 0, 28, 8),
(29, 1, 1, '1', 0, 29, 8),
(30, 1, 1, '1', 0, 30, 8),
(31, 1, 1, '1', 0, 31, 8),
(32, 1, 1, '1', 0, 32, 8),
(33, 1, 1, '1', 0, 33, 8),
(34, 1, 1, '1', 0, 34, 8),
(35, 1, 1, '1', 0, 35, 8),
(36, 1, 1, '1', 0, 36, 8),
(37, 1, 1, '1', 0, 37, 8),
(38, 1, 1, '1', 0, 38, 8),
(39, 1, 1, '1', 0, 39, 8),
(40, 1, 1, '1', 0, 46, 8),
(41, 1, 1, '1', 0, 47, 8),
(42, 1, 1, '1', 0, 48, 8),
(43, 1, 1, '1', 0, 49, 8),
(44, 1, 1, '1', 0, 50, 8),
(45, 1, 1, '1', 0, 51, 8);

-- --------------------------------------------------------

--
-- Table structure for table `compemphr`
--

CREATE TABLE `compemphr` (
  `CEmpHRNo` int(11) NOT NULL,
  `CCNo` int(11) NOT NULL,
  `CompDetCd` int(11) NOT NULL,
  `EmpCd` varchar(15) NOT NULL,
  `Section` int(11) NOT NULL,
  `SDCd` int(11) NOT NULL,
  `Rating` tinyint(4) NOT NULL COMMENT '1-10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compemphr`
--

INSERT INTO `compemphr` (`CEmpHRNo`, `CCNo`, `CompDetCd`, `EmpCd`, `Section`, `SDCd`, `Rating`) VALUES
(1, 1, 1, '1', 0, 1, 5),
(2, 1, 1, '1', 0, 2, 5),
(3, 1, 1, '1', 0, 3, 5),
(4, 1, 1, '1', 0, 4, 5),
(5, 1, 1, '1', 0, 5, 5),
(6, 1, 1, '1', 0, 6, 5),
(7, 1, 1, '1', 0, 7, 5),
(8, 1, 1, '1', 0, 8, 5),
(9, 1, 1, '1', 0, 9, 5),
(10, 1, 1, '1', 0, 10, 5),
(11, 1, 1, '1', 0, 11, 5),
(12, 1, 1, '1', 0, 12, 5),
(13, 1, 1, '1', 0, 13, 5),
(14, 1, 1, '1', 0, 14, 5),
(15, 1, 1, '1', 0, 15, 5),
(16, 1, 1, '1', 0, 16, 5),
(17, 1, 1, '1', 0, 17, 5),
(18, 1, 1, '1', 0, 18, 5),
(19, 1, 1, '1', 0, 19, 5),
(20, 1, 1, '1', 0, 20, 5),
(21, 1, 1, '1', 0, 21, 5),
(22, 1, 1, '1', 0, 22, 5),
(23, 1, 1, '1', 0, 23, 5),
(24, 1, 1, '1', 0, 24, 5),
(25, 1, 1, '1', 0, 25, 5),
(26, 1, 1, '1', 0, 26, 5),
(27, 1, 1, '1', 0, 27, 5),
(28, 1, 1, '1', 0, 28, 5),
(29, 1, 1, '1', 0, 29, 5),
(30, 1, 1, '1', 0, 30, 5),
(31, 1, 1, '1', 0, 31, 5),
(32, 1, 1, '1', 0, 32, 5),
(33, 1, 1, '1', 0, 33, 5),
(34, 1, 1, '1', 0, 34, 5),
(35, 1, 1, '1', 0, 35, 5),
(36, 1, 1, '1', 0, 36, 5),
(37, 1, 1, '1', 0, 37, 5),
(38, 1, 1, '1', 0, 38, 5),
(39, 1, 1, '1', 0, 39, 5),
(40, 1, 1, '1', 0, 46, 5),
(41, 1, 1, '1', 0, 47, 5),
(42, 1, 1, '1', 0, 48, 5),
(43, 1, 1, '1', 0, 49, 5),
(44, 1, 1, '1', 0, 50, 5),
(45, 1, 1, '1', 0, 51, 5);

-- --------------------------------------------------------

--
-- Table structure for table `comphr`
--

CREATE TABLE `comphr` (
  `CHRNo` int(11) NOT NULL,
  `CCNo` int(11) NOT NULL,
  `CompDetCd` int(11) NOT NULL,
  `MtngDt` date NOT NULL DEFAULT '1001-01-01',
  `Section` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comphr`
--

INSERT INTO `comphr` (`CHRNo`, `CCNo`, `CompDetCd`, `MtngDt`, `Section`) VALUES
(1, 1, 1, '1001-01-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comphrd`
--

CREATE TABLE `comphrd` (
  `CHRDNo` int(11) NOT NULL,
  `CCNo` int(11) NOT NULL,
  `CompDetCd` int(11) NOT NULL,
  `QCd` tinyint(4) NOT NULL,
  `DCd` tinyint(4) NOT NULL,
  `SDCd` int(11) DEFAULT NULL,
  `Rank` tinyint(4) NOT NULL COMMENT 'for each dsubdomain... Each SubDomain should have a unique rank'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This is for ranking of sub domains thru questionnaire';

--
-- Dumping data for table `comphrd`
--

INSERT INTO `comphrd` (`CHRDNo`, `CCNo`, `CompDetCd`, `QCd`, `DCd`, `SDCd`, `Rank`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 1, 1, 1, 2, 2),
(3, 1, 1, 1, 1, 3, 3),
(4, 1, 1, 1, 1, 4, 4),
(5, 1, 1, 1, 1, 5, 5),
(6, 1, 1, 1, 1, 6, 6),
(7, 1, 1, 1, 1, 7, 7),
(8, 1, 1, 1, 1, 8, 8),
(9, 1, 1, 1, 2, 9, 9),
(10, 1, 1, 1, 2, 10, 10),
(11, 1, 1, 1, 2, 11, 11),
(12, 1, 1, 1, 2, 12, 12),
(13, 1, 1, 1, 2, 13, 13),
(14, 1, 1, 1, 2, 14, 14),
(15, 1, 1, 1, 2, 15, 15),
(16, 1, 1, 1, 3, 16, 16),
(17, 1, 1, 1, 3, 17, 17),
(18, 1, 1, 1, 3, 18, 18),
(19, 1, 1, 1, 3, 19, 19),
(20, 1, 1, 1, 3, 20, 20),
(21, 1, 1, 1, 3, 21, 21),
(22, 1, 1, 1, 4, 22, 22),
(23, 1, 1, 1, 4, 23, 23),
(24, 1, 1, 1, 4, 24, 24),
(25, 1, 1, 1, 4, 25, 25),
(26, 1, 1, 1, 4, 26, 26),
(27, 1, 1, 1, 4, 27, 27),
(28, 1, 1, 1, 5, 28, 28),
(29, 1, 1, 1, 5, 29, 29),
(30, 1, 1, 1, 5, 30, 30),
(31, 1, 1, 1, 5, 31, 31),
(32, 1, 1, 1, 5, 32, 32),
(33, 1, 1, 1, 5, 33, 33),
(34, 1, 1, 1, 6, 34, 34),
(35, 1, 1, 1, 6, 35, 35),
(36, 1, 1, 1, 6, 36, 36),
(37, 1, 1, 1, 6, 37, 37),
(38, 1, 1, 1, 6, 38, 38),
(39, 1, 1, 1, 6, 39, 39),
(40, 1, 1, 1, 7, 46, 40),
(41, 1, 1, 1, 7, 47, 41),
(42, 1, 1, 1, 7, 48, 42),
(43, 1, 1, 1, 7, 49, 43),
(44, 1, 1, 1, 7, 50, 44),
(45, 1, 1, 1, 7, 51, 45);

-- --------------------------------------------------------

--
-- Table structure for table `comphrdet`
--

CREATE TABLE `comphrdet` (
  `CHRDetNo` int(11) NOT NULL,
  `CCNo` int(11) NOT NULL,
  `CompDetCd` int(11) NOT NULL,
  `QCd` tinyint(4) NOT NULL,
  `DCd` tinyint(4) NOT NULL,
  `SDCd` int(11) DEFAULT NULL,
  `HML` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comphrdet`
--

INSERT INTO `comphrdet` (`CHRDetNo`, `CCNo`, `CompDetCd`, `QCd`, `DCd`, `SDCd`, `HML`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 1, 1, 1, 2, 2),
(3, 1, 1, 1, 1, 3, 3),
(4, 1, 1, 1, 1, 4, 1),
(5, 1, 1, 1, 1, 5, 2),
(6, 1, 1, 1, 1, 6, 3),
(7, 1, 1, 1, 1, 7, 1),
(8, 1, 1, 1, 1, 8, 2),
(9, 1, 1, 1, 2, 9, 3),
(10, 1, 1, 1, 2, 10, 1),
(11, 1, 1, 1, 2, 11, 2),
(12, 1, 1, 1, 2, 12, 2),
(13, 1, 1, 1, 2, 13, 1),
(14, 1, 1, 1, 2, 14, 2),
(15, 1, 1, 1, 2, 15, 3),
(16, 1, 1, 1, 3, 16, 1),
(17, 1, 1, 1, 3, 17, 2),
(18, 1, 1, 1, 3, 18, 1),
(19, 1, 1, 1, 3, 19, 3),
(20, 1, 1, 1, 3, 20, 2),
(21, 1, 1, 1, 3, 21, 1),
(22, 1, 1, 1, 4, 22, 1),
(23, 1, 1, 1, 4, 23, 2),
(24, 1, 1, 1, 4, 24, 3),
(25, 1, 1, 1, 4, 25, 1),
(26, 1, 1, 1, 4, 26, 2),
(27, 1, 1, 1, 4, 27, 3),
(28, 1, 1, 1, 5, 28, 3),
(29, 1, 1, 1, 5, 29, 2),
(30, 1, 1, 1, 5, 30, 1),
(31, 1, 1, 1, 5, 31, 1),
(32, 1, 1, 1, 5, 32, 2),
(33, 1, 1, 1, 5, 33, 3),
(34, 1, 1, 1, 6, 34, 1),
(35, 1, 1, 1, 6, 35, 2),
(36, 1, 1, 1, 6, 36, 3),
(37, 1, 1, 1, 6, 37, 1),
(38, 1, 1, 1, 6, 38, 3),
(39, 1, 1, 1, 6, 39, 2),
(40, 1, 1, 1, 7, 46, 1),
(41, 1, 1, 1, 7, 47, 3),
(42, 1, 1, 1, 7, 48, 2),
(43, 1, 1, 1, 7, 49, 2),
(44, 1, 1, 1, 7, 50, 3),
(45, 1, 1, 1, 7, 51, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comphrf`
--

CREATE TABLE `comphrf` (
  `CHRDetNo` int(11) NOT NULL,
  `CCNo` int(11) NOT NULL,
  `CompDetCd` int(11) NOT NULL,
  `QCd` tinyint(4) NOT NULL,
  `DCd` tinyint(4) NOT NULL,
  `SDCd` int(11) DEFAULT NULL,
  `HML` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comphrf`
--

INSERT INTO `comphrf` (`CHRDetNo`, `CCNo`, `CompDetCd`, `QCd`, `DCd`, `SDCd`, `HML`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 1, 1, 1, 2, 2),
(3, 1, 1, 1, 1, 3, 3),
(4, 1, 1, 1, 1, 4, 1),
(5, 1, 1, 1, 1, 5, 2),
(6, 1, 1, 1, 1, 6, 3),
(7, 1, 1, 1, 1, 7, 1),
(8, 1, 1, 1, 1, 8, 2),
(9, 1, 1, 1, 2, 9, 3),
(10, 1, 1, 1, 2, 10, 1),
(11, 1, 1, 1, 2, 11, 2),
(12, 1, 1, 1, 2, 12, 2),
(13, 1, 1, 1, 2, 13, 1),
(14, 1, 1, 1, 2, 14, 2),
(15, 1, 1, 1, 2, 15, 3),
(16, 1, 1, 1, 3, 16, 1),
(17, 1, 1, 1, 3, 17, 2),
(18, 1, 1, 1, 3, 18, 1),
(19, 1, 1, 1, 3, 19, 3),
(20, 1, 1, 1, 3, 20, 2),
(21, 1, 1, 1, 3, 21, 1),
(22, 1, 1, 1, 4, 22, 1),
(23, 1, 1, 1, 4, 23, 2),
(24, 1, 1, 1, 4, 24, 3),
(25, 1, 1, 1, 4, 25, 1),
(26, 1, 1, 1, 4, 26, 2),
(27, 1, 1, 1, 4, 27, 3),
(28, 1, 1, 1, 5, 28, 3),
(29, 1, 1, 1, 5, 29, 2),
(30, 1, 1, 1, 5, 30, 1),
(31, 1, 1, 1, 5, 31, 1),
(32, 1, 1, 1, 5, 32, 2),
(33, 1, 1, 1, 5, 33, 3),
(34, 1, 1, 1, 6, 34, 1),
(35, 1, 1, 1, 6, 35, 2),
(36, 1, 1, 1, 6, 36, 3),
(37, 1, 1, 1, 6, 37, 1),
(38, 1, 1, 1, 6, 38, 3),
(39, 1, 1, 1, 6, 39, 2),
(40, 1, 1, 1, 7, 46, 1),
(41, 1, 1, 1, 7, 47, 3),
(42, 1, 1, 1, 7, 48, 2),
(43, 1, 1, 1, 7, 49, 2),
(44, 1, 1, 1, 7, 50, 3),
(45, 1, 1, 1, 7, 51, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comphrr`
--

CREATE TABLE `comphrr` (
  `CHRDetNo` int(11) NOT NULL,
  `CCNo` int(11) NOT NULL,
  `CompDetCd` int(11) NOT NULL,
  `QCd` tinyint(4) NOT NULL,
  `DCd` tinyint(4) NOT NULL,
  `SDCd` int(11) DEFAULT NULL,
  `HML` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comphrr`
--

INSERT INTO `comphrr` (`CHRDetNo`, `CCNo`, `CompDetCd`, `QCd`, `DCd`, `SDCd`, `HML`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 1, 1, 1, 2, 2),
(3, 1, 1, 1, 1, 3, 3),
(4, 1, 1, 1, 1, 4, 1),
(5, 1, 1, 1, 1, 5, 2),
(6, 1, 1, 1, 1, 6, 3),
(7, 1, 1, 1, 1, 7, 1),
(8, 1, 1, 1, 1, 8, 2),
(9, 1, 1, 1, 2, 9, 3),
(10, 1, 1, 1, 2, 10, 1),
(11, 1, 1, 1, 2, 11, 2),
(12, 1, 1, 1, 2, 12, 2),
(13, 1, 1, 1, 2, 13, 1),
(14, 1, 1, 1, 2, 14, 2),
(15, 1, 1, 1, 2, 15, 3),
(16, 1, 1, 1, 3, 16, 1),
(17, 1, 1, 1, 3, 17, 2),
(18, 1, 1, 1, 3, 18, 1),
(19, 1, 1, 1, 3, 19, 3),
(20, 1, 1, 1, 3, 20, 2),
(21, 1, 1, 1, 3, 21, 1),
(22, 1, 1, 1, 4, 22, 1),
(23, 1, 1, 1, 4, 23, 2),
(24, 1, 1, 1, 4, 24, 3),
(25, 1, 1, 1, 4, 25, 1),
(26, 1, 1, 1, 4, 26, 2),
(27, 1, 1, 1, 4, 27, 3),
(28, 1, 1, 1, 5, 28, 3),
(29, 1, 1, 1, 5, 29, 2),
(30, 1, 1, 1, 5, 30, 1),
(31, 1, 1, 1, 5, 31, 1),
(32, 1, 1, 1, 5, 32, 2),
(33, 1, 1, 1, 5, 33, 3),
(34, 1, 1, 1, 6, 34, 1),
(35, 1, 1, 1, 6, 35, 2),
(36, 1, 1, 1, 6, 36, 3),
(37, 1, 1, 1, 6, 37, 1),
(38, 1, 1, 1, 6, 38, 3),
(39, 1, 1, 1, 6, 39, 2),
(40, 1, 1, 1, 7, 46, 1),
(41, 1, 1, 1, 7, 47, 3),
(42, 1, 1, 1, 7, 48, 2),
(43, 1, 1, 1, 7, 49, 2),
(44, 1, 1, 1, 7, 50, 3),
(45, 1, 1, 1, 7, 51, 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `phone_code` int(5) NOT NULL,
  `country_code` char(2) NOT NULL,
  `country_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `phone_code`, `country_code`, `country_name`) VALUES
(1, 93, 'AF', 'Afghanistan'),
(2, 358, 'AX', 'Aland Islands'),
(3, 355, 'AL', 'Albania'),
(4, 213, 'DZ', 'Algeria'),
(5, 1684, 'AS', 'American Samoa'),
(6, 376, 'AD', 'Andorra'),
(7, 244, 'AO', 'Angola'),
(8, 1264, 'AI', 'Anguilla'),
(9, 672, 'AQ', 'Antarctica'),
(10, 1268, 'AG', 'Antigua and Barbuda'),
(11, 54, 'AR', 'Argentina'),
(12, 374, 'AM', 'Armenia'),
(13, 297, 'AW', 'Aruba'),
(14, 61, 'AU', 'Australia'),
(15, 43, 'AT', 'Austria'),
(16, 994, 'AZ', 'Azerbaijan'),
(17, 1242, 'BS', 'Bahamas'),
(18, 973, 'BH', 'Bahrain'),
(19, 880, 'BD', 'Bangladesh'),
(20, 1246, 'BB', 'Barbados'),
(21, 375, 'BY', 'Belarus'),
(22, 32, 'BE', 'Belgium'),
(23, 501, 'BZ', 'Belize'),
(24, 229, 'BJ', 'Benin'),
(25, 1441, 'BM', 'Bermuda'),
(26, 975, 'BT', 'Bhutan'),
(27, 591, 'BO', 'Bolivia'),
(28, 599, 'BQ', 'Bonaire, Sint Eustatius and Saba'),
(29, 387, 'BA', 'Bosnia and Herzegovina'),
(30, 267, 'BW', 'Botswana'),
(31, 55, 'BV', 'Bouvet Island'),
(32, 55, 'BR', 'Brazil'),
(33, 246, 'IO', 'British Indian Ocean Territory'),
(34, 673, 'BN', 'Brunei Darussalam'),
(35, 359, 'BG', 'Bulgaria'),
(36, 226, 'BF', 'Burkina Faso'),
(37, 257, 'BI', 'Burundi'),
(38, 855, 'KH', 'Cambodia'),
(39, 237, 'CM', 'Cameroon'),
(40, 1, 'CA', 'Canada'),
(41, 238, 'CV', 'Cape Verde'),
(42, 1345, 'KY', 'Cayman Islands'),
(43, 236, 'CF', 'Central African Republic'),
(44, 235, 'TD', 'Chad'),
(45, 56, 'CL', 'Chile'),
(46, 86, 'CN', 'China'),
(47, 61, 'CX', 'Christmas Island'),
(48, 672, 'CC', 'Cocos (Keeling) Islands'),
(49, 57, 'CO', 'Colombia'),
(50, 269, 'KM', 'Comoros'),
(51, 242, 'CG', 'Congo'),
(52, 242, 'CD', 'Congo, Democratic Republic of the Congo'),
(53, 682, 'CK', 'Cook Islands'),
(54, 506, 'CR', 'Costa Rica'),
(55, 225, 'CI', 'Cote D\'Ivoire'),
(56, 385, 'HR', 'Croatia'),
(57, 53, 'CU', 'Cuba'),
(58, 599, 'CW', 'Curacao'),
(59, 357, 'CY', 'Cyprus'),
(60, 420, 'CZ', 'Czech Republic'),
(61, 45, 'DK', 'Denmark'),
(62, 253, 'DJ', 'Djibouti'),
(63, 1767, 'DM', 'Dominica'),
(64, 1809, 'DO', 'Dominican Republic'),
(65, 593, 'EC', 'Ecuador'),
(66, 20, 'EG', 'Egypt'),
(67, 503, 'SV', 'El Salvador'),
(68, 240, 'GQ', 'Equatorial Guinea'),
(69, 291, 'ER', 'Eritrea'),
(70, 372, 'EE', 'Estonia'),
(71, 251, 'ET', 'Ethiopia'),
(72, 500, 'FK', 'Falkland Islands (Malvinas)'),
(73, 298, 'FO', 'Faroe Islands'),
(74, 679, 'FJ', 'Fiji'),
(75, 358, 'FI', 'Finland'),
(76, 33, 'FR', 'France'),
(77, 594, 'GF', 'French Guiana'),
(78, 689, 'PF', 'French Polynesia'),
(79, 262, 'TF', 'French Southern Territories'),
(80, 241, 'GA', 'Gabon'),
(81, 220, 'GM', 'Gambia'),
(82, 995, 'GE', 'Georgia'),
(83, 49, 'DE', 'Germany'),
(84, 233, 'GH', 'Ghana'),
(85, 350, 'GI', 'Gibraltar'),
(86, 30, 'GR', 'Greece'),
(87, 299, 'GL', 'Greenland'),
(88, 1473, 'GD', 'Grenada'),
(89, 590, 'GP', 'Guadeloupe'),
(90, 1671, 'GU', 'Guam'),
(91, 502, 'GT', 'Guatemala'),
(92, 44, 'GG', 'Guernsey'),
(93, 224, 'GN', 'Guinea'),
(94, 245, 'GW', 'Guinea-Bissau'),
(95, 592, 'GY', 'Guyana'),
(96, 509, 'HT', 'Haiti'),
(97, 0, 'HM', 'Heard Island and Mcdonald Islands'),
(98, 39, 'VA', 'Holy See (Vatican City State)'),
(99, 504, 'HN', 'Honduras'),
(100, 852, 'HK', 'Hong Kong'),
(101, 36, 'HU', 'Hungary'),
(102, 354, 'IS', 'Iceland'),
(103, 91, 'IN', 'India'),
(104, 62, 'ID', 'Indonesia'),
(105, 98, 'IR', 'Iran, Islamic Republic of'),
(106, 964, 'IQ', 'Iraq'),
(107, 353, 'IE', 'Ireland'),
(108, 44, 'IM', 'Isle of Man'),
(109, 972, 'IL', 'Israel'),
(110, 39, 'IT', 'Italy'),
(111, 1876, 'JM', 'Jamaica'),
(112, 81, 'JP', 'Japan'),
(113, 44, 'JE', 'Jersey'),
(114, 962, 'JO', 'Jordan'),
(115, 7, 'KZ', 'Kazakhstan'),
(116, 254, 'KE', 'Kenya'),
(117, 686, 'KI', 'Kiribati'),
(118, 850, 'KP', 'Korea, Democratic People\'s Republic of'),
(119, 82, 'KR', 'Korea, Republic of'),
(120, 381, 'XK', 'Kosovo'),
(121, 965, 'KW', 'Kuwait'),
(122, 996, 'KG', 'Kyrgyzstan'),
(123, 856, 'LA', 'Lao People\'s Democratic Republic'),
(124, 371, 'LV', 'Latvia'),
(125, 961, 'LB', 'Lebanon'),
(126, 266, 'LS', 'Lesotho'),
(127, 231, 'LR', 'Liberia'),
(128, 218, 'LY', 'Libyan Arab Jamahiriya'),
(129, 423, 'LI', 'Liechtenstein'),
(130, 370, 'LT', 'Lithuania'),
(131, 352, 'LU', 'Luxembourg'),
(132, 853, 'MO', 'Macao'),
(133, 389, 'MK', 'Macedonia, the Former Yugoslav Republic of'),
(134, 261, 'MG', 'Madagascar'),
(135, 265, 'MW', 'Malawi'),
(136, 60, 'MY', 'Malaysia'),
(137, 960, 'MV', 'Maldives'),
(138, 223, 'ML', 'Mali'),
(139, 356, 'MT', 'Malta'),
(140, 692, 'MH', 'Marshall Islands'),
(141, 596, 'MQ', 'Martinique'),
(142, 222, 'MR', 'Mauritania'),
(143, 230, 'MU', 'Mauritius'),
(144, 269, 'YT', 'Mayotte'),
(145, 52, 'MX', 'Mexico'),
(146, 691, 'FM', 'Micronesia, Federated States of'),
(147, 373, 'MD', 'Moldova, Republic of'),
(148, 377, 'MC', 'Monaco'),
(149, 976, 'MN', 'Mongolia'),
(150, 382, 'ME', 'Montenegro'),
(151, 1664, 'MS', 'Montserrat'),
(152, 212, 'MA', 'Morocco'),
(153, 258, 'MZ', 'Mozambique'),
(154, 95, 'MM', 'Myanmar'),
(155, 264, 'NA', 'Namibia'),
(156, 674, 'NR', 'Nauru'),
(157, 977, 'NP', 'Nepal'),
(158, 31, 'NL', 'Netherlands'),
(159, 599, 'AN', 'Netherlands Antilles'),
(160, 687, 'NC', 'New Caledonia'),
(161, 64, 'NZ', 'New Zealand'),
(162, 505, 'NI', 'Nicaragua'),
(163, 227, 'NE', 'Niger'),
(164, 234, 'NG', 'Nigeria'),
(165, 683, 'NU', 'Niue'),
(166, 672, 'NF', 'Norfolk Island'),
(167, 1670, 'MP', 'Northern Mariana Islands'),
(168, 47, 'NO', 'Norway'),
(169, 968, 'OM', 'Oman'),
(170, 92, 'PK', 'Pakistan'),
(171, 680, 'PW', 'Palau'),
(172, 970, 'PS', 'Palestinian Territory, Occupied'),
(173, 507, 'PA', 'Panama'),
(174, 675, 'PG', 'Papua New Guinea'),
(175, 595, 'PY', 'Paraguay'),
(176, 51, 'PE', 'Peru'),
(177, 63, 'PH', 'Philippines'),
(178, 64, 'PN', 'Pitcairn'),
(179, 48, 'PL', 'Poland'),
(180, 351, 'PT', 'Portugal'),
(181, 1787, 'PR', 'Puerto Rico'),
(182, 974, 'QA', 'Qatar'),
(183, 262, 'RE', 'Reunion'),
(184, 40, 'RO', 'Romania'),
(185, 70, 'RU', 'Russian Federation'),
(186, 250, 'RW', 'Rwanda'),
(187, 590, 'BL', 'Saint Barthelemy'),
(188, 290, 'SH', 'Saint Helena'),
(189, 1869, 'KN', 'Saint Kitts and Nevis'),
(190, 1758, 'LC', 'Saint Lucia'),
(191, 590, 'MF', 'Saint Martin'),
(192, 508, 'PM', 'Saint Pierre and Miquelon'),
(193, 1784, 'VC', 'Saint Vincent and the Grenadines'),
(194, 684, 'WS', 'Samoa'),
(195, 378, 'SM', 'San Marino'),
(196, 239, 'ST', 'Sao Tome and Principe'),
(197, 966, 'SA', 'Saudi Arabia'),
(198, 221, 'SN', 'Senegal'),
(199, 381, 'RS', 'Serbia'),
(200, 381, 'CS', 'Serbia and Montenegro'),
(201, 248, 'SC', 'Seychelles'),
(202, 232, 'SL', 'Sierra Leone'),
(203, 65, 'SG', 'Singapore'),
(204, 1, 'SX', 'Sint Maarten'),
(205, 421, 'SK', 'Slovakia'),
(206, 386, 'SI', 'Slovenia'),
(207, 677, 'SB', 'Solomon Islands'),
(208, 252, 'SO', 'Somalia'),
(209, 27, 'ZA', 'South Africa'),
(210, 500, 'GS', 'South Georgia and the South Sandwich Islands'),
(211, 211, 'SS', 'South Sudan'),
(212, 34, 'ES', 'Spain'),
(213, 94, 'LK', 'Sri Lanka'),
(214, 249, 'SD', 'Sudan'),
(215, 597, 'SR', 'Suriname'),
(216, 47, 'SJ', 'Svalbard and Jan Mayen'),
(217, 268, 'SZ', 'Swaziland'),
(218, 46, 'SE', 'Sweden'),
(219, 41, 'CH', 'Switzerland'),
(220, 963, 'SY', 'Syrian Arab Republic'),
(221, 886, 'TW', 'Taiwan, Province of China'),
(222, 992, 'TJ', 'Tajikistan'),
(223, 255, 'TZ', 'Tanzania, United Republic of'),
(224, 66, 'TH', 'Thailand'),
(225, 670, 'TL', 'Timor-Leste'),
(226, 228, 'TG', 'Togo'),
(227, 690, 'TK', 'Tokelau'),
(228, 676, 'TO', 'Tonga'),
(229, 1868, 'TT', 'Trinidad and Tobago'),
(230, 216, 'TN', 'Tunisia'),
(231, 90, 'TR', 'Turkey'),
(232, 7370, 'TM', 'Turkmenistan'),
(233, 1649, 'TC', 'Turks and Caicos Islands'),
(234, 688, 'TV', 'Tuvalu'),
(235, 256, 'UG', 'Uganda'),
(236, 380, 'UA', 'Ukraine'),
(237, 971, 'AE', 'United Arab Emirates'),
(238, 44, 'GB', 'United Kingdom'),
(239, 1, 'US', 'United States'),
(240, 1, 'UM', 'United States Minor Outlying Islands'),
(241, 598, 'UY', 'Uruguay'),
(242, 998, 'UZ', 'Uzbekistan'),
(243, 678, 'VU', 'Vanuatu'),
(244, 58, 'VE', 'Venezuela'),
(245, 84, 'VN', 'Viet Nam'),
(246, 1284, 'VG', 'Virgin Islands, British'),
(247, 1340, 'VI', 'Virgin Islands, U.s.'),
(248, 681, 'WF', 'Wallis and Futuna'),
(249, 212, 'EH', 'Western Sahara'),
(250, 967, 'YE', 'Yemen'),
(251, 260, 'ZM', 'Zambia'),
(252, 263, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseId` int(11) NOT NULL,
  `CourseName` varchar(50) NOT NULL,
  `CDesc` varchar(500) NOT NULL DEFAULT '-',
  `TopicId` tinyint(4) NOT NULL,
  `Rate` int(11) NOT NULL DEFAULT 0,
  `RCurrId` int(11) NOT NULL DEFAULT 1,
  `RateType` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1-Person based; 2-Group based;3-Hr based; 4-Days based',
  `Comp_cd` smallint(6) NOT NULL DEFAULT 0 COMMENT 'VendorId',
  `Customizable` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-No; 1-Yes',
  `Travel` int(11) NOT NULL DEFAULT 0,
  `Boarding` int(11) NOT NULL DEFAULT 0 COMMENT 'per Day',
  `Lodging` int(11) NOT NULL DEFAULT 0 COMMENT 'per Day',
  `DailyAllowance` int(11) NOT NULL DEFAULT 0 COMMENT 'per Day',
  `link_image` varchar(30) DEFAULT NULL,
  `link_file_path` varchar(30) DEFAULT NULL,
  `stat` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseId`, `CourseName`, `CDesc`, `TopicId`, `Rate`, `RCurrId`, `RateType`, `Comp_cd`, `Customizable`, `Travel`, `Boarding`, `Lodging`, `DailyAllowance`, `link_image`, `link_file_path`, `stat`, `created_by`, `created_at`) VALUES
(1, 'AI', 'The Advanced Programme in AI-Powered Marketing (APAIPM) helps Digital Marketers, Marketing Analysts, Market and Business Analysts, Consultants, Entrepreneurs and CMOs, leverage AI-driven analytics for taking marketing decisions.\n\nWith an explosion in the availability of data, powerful insights can be derived into individual consumer behaviour. AI makes personalised marketing-at-scale a present-day reality. It offers an opportunity to upsell, cross-sell and enhance RoI of marketing investments.', 6, 100, 1, 0, 2, 0, 0, 0, 0, 0, NULL, 'dot_net_syllabus.pdf', 0, 0, NULL),
(2, 'Leadership', 'The New Leader Program is designed to help newly promoted leaders with direct reports develop critical capabilities. The course was created to build leaders who perform well in all domains of life: work, home, community, and the private self (mind, body, and spirit). ', 1, 200, 1, 0, 6, 0, 0, 0, 0, 0, NULL, 'dot_net_syllabus.pdf', 0, 14, NULL),
(3, 'Business Acumen for Rising Executives', 'The Advanced Programme in AI-Powered Marketing (APAIPM) helps Digital Marketers, Marketing Analysts, Market and Business Analysts, Consultants, Entrepreneurs and CMOs, leverage AI-driven analytics for taking marketing decisions.\n\nWith an explosion in the availability of data, powerful insights can be derived into individual consumer behaviour. AI makes personalised marketing-at-scale a present-day reality. It offers an opportunity to upsell, cross-sell and enhance RoI of marketing investments.', 1, 250, 1, 0, 7, 0, 0, 0, 0, 0, NULL, 'dot_net_syllabus.pdf', 0, 0, NULL),
(4, 'Berkeley Technology Leadership Program', 'In a volatile economy, being able to determine an asset’s value, understand an organization\'s financing sources, calculate profitability, and estimate risks is more critical than ever. These are the metrics that help determine a win or a loss', 1, 175, 1, 0, 6, 0, 0, 0, 0, 0, NULL, 'dot_net_syllabus.pdf', 0, 0, NULL),
(5, 'Advanced Financial Statement Analysis', 'In a volatile economy, being able to determine an asset’s value, understand an organization\'s financing sources, calculate profitability, and estimate risks is more critical than ever. These are the metrics that help determine a win or a loss', 2, 190, 1, 0, 4, 1, 0, 0, 0, 0, NULL, 'dot_net_syllabus.pdf', 0, 0, NULL),
(6, 'php', 'php is server', 1, 200, 3, 1, 7, 0, 0, 0, 0, 0, NULL, NULL, 0, 14, '2023-02-14 22:18:02'),
(7, 'java', 'javva is ', 1, 150, 3, 1, 21, 0, 0, 0, 0, 0, NULL, NULL, 0, 14, '2023-02-14 22:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `ctypdet`
--

CREATE TABLE `ctypdet` (
  `CdetTypCd` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `TypId` int(11) NOT NULL,
  `ARate` int(11) NOT NULL,
  `Stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ctypdet`
--

INSERT INTO `ctypdet` (`CdetTypCd`, `CourseId`, `TypId`, `ARate`, `Stat`) VALUES
(1, 2, 3, 40, 0),
(2, 2, 1, 100, 0),
(3, 3, 2, 125, 0),
(4, 3, 5, 200, 0),
(5, 4, 3, 0, 0),
(6, 4, 5, 55, 0),
(7, 4, 5, 75, 0),
(8, 6, 2, 40, 0),
(9, 7, 3, 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `curr_mst`
--

CREATE TABLE `curr_mst` (
  `CurrId` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Stat` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curr_mst`
--

INSERT INTO `curr_mst` (`CurrId`, `Name`, `Stat`) VALUES
(1, 'USD', 0),
(2, 'Pound', 0),
(3, 'INR', 0),
(4, 'Rouble', 0),
(5, 'Euros', 0);

-- --------------------------------------------------------

--
-- Table structure for table `domain`
--

CREATE TABLE `domain` (
  `DCd` tinyint(4) NOT NULL,
  `Domain` varchar(25) NOT NULL,
  `ColorCd` varchar(10) NOT NULL,
  `MaxRtng` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-10',
  `Stat` tinyint(4) NOT NULL DEFAULT 0,
  `SQno` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domain`
--

INSERT INTO `domain` (`DCd`, `Domain`, `ColorCd`, `MaxRtng`, `Stat`, `SQno`) VALUES
(1, 'LEADERSHIP', '', 1, 0, 0),
(2, 'BEHAVIORAL', '', 1, 0, 0),
(3, 'BUSINESS', '', 1, 0, 0),
(4, 'KNOWLEDGE', '', 1, 0, 0),
(5, 'STRUCTURAL', '', 1, 0, 0),
(6, 'FUNCTIONAL', '', 1, 0, 0),
(7, 'DEVELOPMENTAL', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `domainsub`
--

CREATE TABLE `domainsub` (
  `SDCd` tinyint(4) NOT NULL,
  `DCd` tinyint(4) NOT NULL,
  `SubDomain` varchar(25) NOT NULL,
  `Stat` tinyint(4) NOT NULL DEFAULT 0,
  `ColorCd` varchar(8) NOT NULL,
  `MaxRtng` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-10',
  `SQno` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domainsub`
--

INSERT INTO `domainsub` (`SDCd`, `DCd`, `SubDomain`, `Stat`, `ColorCd`, `MaxRtng`, `SQno`) VALUES
(1, 1, 'Transformational / Change', 0, '', 1, 0),
(2, 1, 'Diversity, Women', 0, '', 1, 0),
(3, 1, 'Conflict resolution', 0, '', 1, 0),
(4, 1, 'Empowerment', 0, '', 1, 0),
(5, 1, 'Decision Making', 0, '', 1, 0),
(6, 1, 'Governance', 0, '', 1, 0),
(7, 1, 'Foundation/Essential', 0, '', 1, 0),
(8, 1, 'Situational', 0, '', 1, 0),
(9, 2, 'Openness', 0, '', 1, 0),
(10, 2, 'Agility', 0, '', 1, 0),
(11, 2, 'Entrepreneurship', 0, '', 1, 0),
(12, 2, 'Cross Culture', 0, '', 1, 0),
(13, 2, 'Consumer Centricity', 0, '', 1, 0),
(14, 2, 'Risk Taking', 0, '', 1, 0),
(15, 2, 'Collaboration', 0, '', 1, 0),
(16, 3, 'Uncertainty / Complexity', 0, '', 1, 0),
(17, 3, 'Innovation', 0, '', 1, 0),
(18, 3, 'Turnaround', 0, '', 1, 0),
(19, 3, 'Business growth', 0, '', 1, 0),
(20, 3, 'Execution', 0, '', 1, 0),
(21, 3, 'Strategy', 0, '', 1, 0),
(22, 4, 'Technology', 0, '', 1, 0),
(23, 4, 'Systems', 0, '', 1, 0),
(24, 4, 'Big Data', 0, '', 1, 0),
(25, 4, 'Trans 101', 0, '', 1, 0),
(26, 4, 'Management Skills', 0, '', 1, 0),
(27, 4, 'Thinking', 0, '', 1, 0),
(28, 5, 'Process', 0, '', 1, 0),
(29, 5, 'Organization', 0, '', 1, 0),
(30, 5, 'Information Flow', 0, '', 1, 0),
(31, 5, 'Compliance', 0, '', 1, 0),
(32, 5, 'Decision Making', 0, '', 1, 0),
(33, 5, 'Mergers', 0, '', 1, 0),
(34, 6, 'Finance', 0, '', 1, 0),
(35, 6, 'Marketing', 0, '', 1, 0),
(36, 6, 'Operations', 0, '', 1, 0),
(37, 6, 'R&D', 0, '', 1, 0),
(38, 6, 'Sales', 0, '', 1, 0),
(39, 6, 'Corp Planning', 0, '', 1, 0),
(46, 7, 'Ownership', 0, '', 1, 0),
(47, 7, 'Interpersonal', 0, '', 1, 0),
(48, 7, 'Negotiation', 0, '', 1, 0),
(49, 7, 'Communication', 0, '', 1, 0),
(50, 7, 'Self-Awareness', 0, '', 1, 0),
(51, 7, 'Productivity', 0, '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `domainsubsub`
--

CREATE TABLE `domainsubsub` (
  `SSDCd` tinyint(4) NOT NULL,
  `SDCd` tinyint(4) NOT NULL,
  `SubSubDomain` varchar(25) NOT NULL,
  `Stat` tinyint(4) NOT NULL,
  `ColorCd` varchar(8) NOT NULL,
  `MaxRtng` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `general_info`
--

CREATE TABLE `general_info` (
  `id` int(11) NOT NULL,
  `company` varchar(200) DEFAULT NULL,
  `company_turnover` decimal(20,2) NOT NULL DEFAULT 0.00,
  `industry_sector` varchar(255) DEFAULT NULL,
  `no_of_outlets` varchar(100) DEFAULT NULL,
  `no_of_units` int(11) NOT NULL DEFAULT 0,
  `attrition` decimal(5,2) NOT NULL DEFAULT 0.00,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_info`
--

INSERT INTO `general_info` (`id`, `company`, `company_turnover`, `industry_sector`, `no_of_outlets`, `no_of_units`, `attrition`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'SDDDSX', '100000000.00', 'IUHGVB', '100', 22, '11.00', 1, '2022-04-09 04:15:18', '2022-04-09 04:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `langs`
--

CREATE TABLE `langs` (
  `lang_id` int(11) NOT NULL,
  `lang_name` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `langs`
--

INSERT INTO `langs` (`lang_id`, `lang_name`, `status`) VALUES
(1, 'English (US)', 0),
(2, 'English (UK)', 0),
(3, 'Thai', 0),
(4, 'Mandarin', 0),
(5, 'Japanese', 0),
(6, 'Korean', 0),
(7, 'Hindi', 0),
(8, 'Spanish', 0),
(9, 'German', 0);

-- --------------------------------------------------------

--
-- Table structure for table `levels_mst`
--

CREATE TABLE `levels_mst` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(30) NOT NULL,
  `VLevelId` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Vendor Level Id',
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `levels_mst`
--

INSERT INTO `levels_mst` (`level_id`, `level_name`, `VLevelId`, `status`) VALUES
(1, 'Board', 0, 0),
(2, 'Cxo', 0, 0),
(3, 'Senior', 0, 0),
(4, 'Executive', 0, 0),
(5, 'Junior', 0, 0),
(6, 'Mid Level', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mst`
--

CREATE TABLE `mst` (
  `MCd` int(11) NOT NULL,
  `MTyp` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1-Growth Code; 2-EmpFeeling  from Training; 3- Employee training outcome',
  `Name` varchar(30) NOT NULL,
  `Stat` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst`
--

INSERT INTO `mst` (`MCd`, `MTyp`, `Name`, `Stat`) VALUES
(1, 1, 'Function Change', 0),
(2, 1, 'Role Change', 0),
(3, 1, 'TeamSize Change', 0),
(4, 1, 'Country Change', 0),
(5, 1, 'Band Change', 0),
(6, 2, 'Motivated', 0),
(7, 2, 'Enthusiastic', 0),
(8, 2, 'Inspired ', 0),
(9, 2, 'Rejuvenated', 0),
(10, 2, 'Confident', 0),
(11, 2, 'Gratitude', 0),
(12, 2, 'Satisfied', 0),
(13, 2, 'Disappointed', 0),
(14, 3, 'Higher Responsibility', 0),
(15, 3, 'New Role / Function', 0),
(16, 3, 'Reskill/Upskill in Role', 0),
(17, 3, 'Expand the Role', 0),
(18, 3, 'Better Leader', 0),
(19, 3, 'Behavioral Change', 0),
(20, 3, 'Meet Business Challenge', 0),
(21, 3, 'More Productive', 0),
(22, 21, 'Oil & Gas', 0),
(23, 21, 'Manufacturing', 0),
(24, 21, 'Steel', 0),
(25, 21, 'Cosmetics', 0),
(26, 21, 'Insurance', 0),
(27, 21, 'Banking', 0),
(28, 21, 'Pharma cutital', 0),
(29, 22, 'General', 0);

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE `priority` (
  `pr_id` int(11) NOT NULL,
  `pri_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`pr_id`, `pri_name`) VALUES
(1, 'High'),
(2, 'Medium'),
(3, 'Low');

-- --------------------------------------------------------

--
-- Table structure for table `ques`
--

CREATE TABLE `ques` (
  `QNo` int(11) NOT NULL,
  `CompDetCd` int(11) NOT NULL DEFAULT 0,
  `QPaperName` varchar(50) NOT NULL DEFAULT '-',
  `QFor` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1-CEO; 2-HR; 3-Staff; 5-Training Batch',
  `DCd` tinyint(4) NOT NULL DEFAULT 0,
  `SDCd` tinyint(4) NOT NULL DEFAULT 0,
  `SSDCd` tinyint(4) NOT NULL DEFAULT 0,
  `StDt` date DEFAULT NULL,
  `EndDt` date DEFAULT NULL,
  `Stat` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-Draft;; 1-Publised;  5-Closed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ques`
--

INSERT INTO `ques` (`QNo`, `CompDetCd`, `QPaperName`, `QFor`, `DCd`, `SDCd`, `SSDCd`, `StDt`, `EndDt`, `Stat`) VALUES
(1, 1, 'Test1', 1, 1, 1, 0, '2023-02-09', '2023-02-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quesdet`
--

CREATE TABLE `quesdet` (
  `QNoDet` int(11) NOT NULL,
  `QNo` smallint(6) NOT NULL DEFAULT 0,
  `QFor` tinyint(4) NOT NULL DEFAULT 0,
  `QCd` smallint(6) NOT NULL DEFAULT 0,
  `sq_no` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quesdet`
--

INSERT INTO `quesdet` (`QNoDet`, `QNo`, `QFor`, `QCd`, `sq_no`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 1, 2, 2),
(3, 1, 1, 3, 3),
(4, 1, 1, 4, 4),
(5, 1, 1, 5, 5),
(6, 1, 1, 6, 6),
(7, 1, 1, 7, 7),
(8, 1, 1, 8, 8),
(9, 1, 1, 9, 9),
(10, 1, 1, 10, 10),
(11, 1, 1, 11, 11),
(12, 1, 1, 12, 12),
(13, 1, 1, 13, 13),
(14, 1, 1, 14, 14),
(15, 1, 1, 15, 15),
(16, 1, 1, 16, 16),
(17, 1, 1, 17, 17);

-- --------------------------------------------------------

--
-- Table structure for table `quesoptions`
--

CREATE TABLE `quesoptions` (
  `qono` int(11) NOT NULL,
  `qcd` int(11) NOT NULL DEFAULT 0,
  `opt1` varchar(50) NOT NULL DEFAULT '-',
  `sq_no` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quesoptions`
--

INSERT INTO `quesoptions` (`qono`, `qcd`, `opt1`, `sq_no`) VALUES
(1, 1, 'Average', 2),
(2, 1, 'Good', 3),
(3, 1, 'Exellent', 4),
(4, 1, 'Poor', 1),
(5, 2, 'Database', 1),
(6, 2, 'Config', 2),
(7, 2, 'Routes', 3),
(8, 2, 'Autoload', 4),
(9, 3, 'View', 1),
(10, 3, 'Model', 2),
(11, 3, 'Controller', 3),
(12, 3, 'None of the above', 4),
(13, 4, 'James Gosling', 1),
(14, 4, 'Mark Jukervich', 2),
(15, 4, 'Dennis Ritchie', 3),
(16, 4, 'Mark Otto and Jacob Thornton', 4),
(17, 8, 'Transformational / Change', 1),
(18, 8, 'Diversity, Women', 2),
(19, 8, 'Conflict resolution', 3),
(20, 8, 'Empowerment', 4),
(21, 8, 'Decision Making', 5),
(22, 8, 'Governance', 6),
(23, 8, 'Foundation/Essential', 7),
(24, 8, 'Situational', 8),
(25, 9, 'Openness', 1),
(26, 9, 'Agility', 2),
(27, 9, 'Entrepreneurship', 3),
(28, 9, 'Cross Culture', 4),
(29, 9, 'Consumer Centricity', 5),
(30, 9, 'Risk Taking', 6),
(31, 9, 'Collaboration', 7),
(32, 10, 'Uncertainty / Complexity', 1),
(33, 10, 'Innovation', 2),
(34, 10, 'Turnaround', 3),
(35, 10, 'Business growth', 4),
(36, 10, 'Execution', 5),
(37, 10, 'Strategy', 6),
(38, 11, 'Technology', 1),
(39, 12, 'Systems', 2),
(40, 11, 'Big Data', 3),
(41, 11, 'Trans 101', 4),
(42, 11, 'Management Skills', 5),
(43, 11, 'Thinking', 6),
(44, 12, 'Process', 1),
(45, 12, 'Organization', 2),
(46, 12, 'Information Flow', 3),
(47, 12, 'Compliance', 4),
(48, 12, 'Decision Making', 5),
(49, 12, 'Mergers', 6),
(50, 13, 'Finance', 1),
(51, 13, 'Marketing', 2),
(52, 13, 'Operations', 3),
(53, 13, 'R&D', 4),
(54, 13, 'Sales', 5),
(55, 13, 'Corp Planning', 6),
(56, 14, 'Ownership', 1),
(57, 14, 'Interpersonal', 2),
(58, 14, 'Negotiation', 3),
(59, 14, 'Communication', 4),
(60, 14, 'Self-Awareness', 5),
(61, 14, 'Productivity', 6),
(62, 15, 'LEADERSHIP-Transformational / Change', 1),
(63, 15, 'LEADERSHIP-Diversity, Women', 2),
(64, 15, 'BEHAVIORAL-Openness', 3),
(65, 15, 'BEHAVIORAL-Agility', 4),
(66, 15, 'BUSINESS-Innovation', 5),
(67, 16, 'BUSINESS-Innovation', 5),
(68, 16, 'BEHAVIORAL-Agility', 4),
(69, 16, 'BEHAVIORAL-Openness', 3),
(70, 16, 'LEADERSHIP-Diversity, Women', 2),
(71, 16, 'LEADERSHIP-Transformational / Change', 1),
(72, 17, 'LEADERSHIP-Transformational / Change', 1),
(73, 17, 'LEADERSHIP-Diversity, Women', 2),
(74, 17, 'BEHAVIORAL-Openness', 3),
(75, 17, 'BEHAVIORAL-Agility', 4),
(76, 17, 'BUSINESS-Innovation', 5);

-- --------------------------------------------------------

--
-- Table structure for table `quesresp`
--

CREATE TABLE `quesresp` (
  `QRNo` int(11) NOT NULL,
  `QNo` int(11) NOT NULL DEFAULT 0,
  `QCd` int(11) NOT NULL DEFAULT 0,
  `QTyp` tinyint(4) NOT NULL DEFAULT 0,
  `QFor` tinyint(4) NOT NULL DEFAULT 0,
  `EmailId` varchar(30) NOT NULL DEFAULT '-',
  `QRespOpt` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'For option button / Rating / HML (3-2-1)',
  `QRespMulti` varchar(255) NOT NULL DEFAULT '-' COMMENT 'Responses seperated by Commas for multiple choice and ranking like 1-A,2D,3B',
  `QRespDesc` varchar(250) NOT NULL DEFAULT '-' COMMENT 'Subjective responses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quesresp`
--

INSERT INTO `quesresp` (`QRNo`, `QNo`, `QCd`, `QTyp`, `QFor`, `EmailId`, `QRespOpt`, `QRespMulti`, `QRespDesc`) VALUES
(1, 1, 1, 2, 1, 'vendor5@gmail.com', 1, '', ''),
(2, 1, 2, 2, 1, 'vendor5@gmail.com', 2, '', ''),
(3, 1, 3, 2, 1, 'vendor5@gmail.com', 3, '', ''),
(4, 1, 4, 2, 1, 'vendor5@gmail.com', 1, '', ''),
(5, 1, 5, 2, 1, 'vendor5@gmail.com', 1, '', ''),
(6, 1, 6, 2, 1, 'vendor5@gmail.com', 1, '', ''),
(7, 1, 7, 2, 1, 'vendor5@gmail.com', 2, '', ''),
(8, 1, 8, 2, 1, 'vendor5@gmail.com', 3, '', '-'),
(9, 1, 9, 2, 1, 'vendor5@gmail.com', 3, '', '-'),
(10, 1, 1, 2, 3, 'vendor5@gmail.com', 2, '', ''),
(11, 1, 2, 2, 3, 'vendor5@gmail.com', 2, '', ''),
(12, 1, 3, 2, 3, 'vendor5@gmail.com', 1, '', ''),
(13, 1, 4, 2, 3, 'vendor5@gmail.com', 2, '', ''),
(14, 1, 5, 2, 3, 'vendor5@gmail.com', 3, '', ''),
(15, 1, 6, 2, 3, 'vendor5@gmail.com', 2, '', ''),
(16, 1, 7, 2, 3, 'vendor5@gmail.com', 2, '', ''),
(17, 1, 8, 2, 3, 'vendor5@gmail.com', 1, '', '-'),
(18, 0, 9, 2, 3, 'vendor5@gmail.com', 3, '', '-'),
(19, 1, 1, 1, 1, 'vijay@gmail.com', 1, '', ''),
(20, 1, 2, 3, 1, 'vijay@gmail.com', 0, '6,7', ''),
(21, 1, 3, 4, 1, 'vijay@gmail.com', 0, '1,3,4,2', ''),
(22, 1, 4, 1, 1, 'vijay@gmail.com', 14, '', ''),
(23, 1, 5, 5, 1, 'vijay@gmail.com', 0, '', 'how r u'),
(24, 1, 6, 2, 1, 'vijay@gmail.com', 2, '', ''),
(25, 1, 7, 6, 1, 'vijay@gmail.com', 4, '', ''),
(26, 1, 8, 4, 1, 'vijay@gmail.com', 0, '3,2,6,7,4,5,1,8', ''),
(27, 1, 9, 4, 1, 'vijay@gmail.com', 0, '3,7,2,5,4,1,6', ''),
(28, 1, 10, 1, 1, 'vijay@gmail.com', 34, '', ''),
(29, 1, 11, 3, 1, 'vijay@gmail.com', 0, '41,42', ''),
(30, 1, 12, 3, 1, 'vijay@gmail.com', 0, '45,46', ''),
(31, 1, 13, 1, 1, 'vijay@gmail.com', 52, '', ''),
(32, 1, 14, 4, 1, 'vijay@gmail.com', 0, '1,3,4,5,2,6', ''),
(33, 1, 15, 7, 1, 'vijay@gmail.com', 0, '1-0-1,2-0-1,3-0-1,4-0-2,5-0-3,6-0-3,7-0-2,8-0-2,9-0-3,10-0-2,11-0-1,12-0-2,13-0-3,14-0-2,15-0-1,16-0-3,17-0-1,18-0-3,19-0-1,20-0-2,21-0-1,22-0-3,23-0-2,24-0-2,25-0-2,26-0-1,27-0-3,28-0-2,29-0-3,30-0-1,31-0-2,32-0-2,33-0-3,34-0-1,35-0-2,36-0-2,37-0-1,38-0-', ''),
(34, 1, 16, 7, 1, 'vijay@gmail.com', 0, '1-0-1,2-0-2,3-0-3,4-0-3,5-0-2,6-0-3,7-0-2,8-0-2,9-0-1,10-0-3,11-0-1,12-0-2,13-0-3,14-0-1,15-0-1,16-0-2,17-0-1,18-0-1,19-0-2,20-0-1,21-0-2,22-0-3,23-0-2,24-0-1,25-0-2,26-0-1,27-0-3,28-0-1,29-0-3,30-0-1,31-0-1,32-0-1,33-0-1,34-0-1,35-0-3,36-0-1,37-0-1,38-0-', ''),
(35, 1, 17, 8, 1, 'vijay@gmail.com', 0, '1-0-2,2-0-5,3-0-8,4-0-9,5-0-10,6-0-7,7-0-9,8-0-9,9-0-8,10-0-10,11-0-8,12-0-7,13-0-9,14-0-9,15-0-10,16-0-10,17-0-9,18-0-10,19-0-7,20-0-8,21-0-10,22-0-10,23-0-9,24-0-6,25-0-9,26-0-8,27-0-4,28-0-9,29-0-8,30-0-8,31-0-8,32-0-9,33-0-9,34-0-8,35-0-8,36-0-9,37-0-', '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `QCd` smallint(6) NOT NULL,
  `Question` varchar(200) NOT NULL,
  `DCd` tinyint(4) NOT NULL DEFAULT 0,
  `SDCd` tinyint(4) NOT NULL DEFAULT 0,
  `MaxRating` tinyint(4) NOT NULL DEFAULT 7,
  `QTyp` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1-Option; 2-HML; 3-MultiChoices; 4-Ranking; 5- Descriptive; 6-Rating,7-Query HML,8-Query Rating',
  `QFor` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1-CEO; 2-CXOs; 3-HR ; 4-Staff; 5-Training Batch',
  `SeqNo` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Serial no for display purposes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QCd`, `Question`, `DCd`, `SDCd`, `MaxRating`, `QTyp`, `QFor`, `SeqNo`) VALUES
(1, 'HR team performance', 0, 0, 7, 1, 1, 1),
(2, 'Base URL can be changed from which configuration file?', 0, 0, 7, 3, 1, 2),
(3, 'Which one is the business logic in codeigniter?', 0, 0, 7, 4, 1, 3),
(4, 'Who developed the bootstrap?', 0, 0, 7, 1, 1, 4),
(5, 'Explain your role ?', 0, 0, 7, 5, 1, 5),
(6, 'What is priorty ?', 0, 0, 7, 2, 1, 6),
(7, 'Please rating?', 0, 0, 7, 6, 1, 7),
(8, 'WhIch  are the 3 MOST important leadership traits  you think your senior management possess?', 0, 0, 7, 4, 1, 8),
(9, 'What are 3 most critical behavioral values that constitute your organization’s culture?', 0, 0, 7, 4, 1, 9),
(10, 'What is the most important Business expectation at this point of time', 0, 0, 7, 1, 1, 10),
(11, 'Could you identify2 or 3 key Knowledge domains you think are prevalent across the organization', 0, 0, 7, 3, 1, 11),
(12, 'Could you name a couple of structural aspects of the organization that you are proud of ', 0, 0, 7, 3, 1, 12),
(13, 'Which of the Functions within your organization worry you the least?', 0, 0, 7, 1, 1, 13),
(14, 'What are the 3 traits that you think most people working in your organization possess', 0, 0, 7, 4, 1, 14),
(15, 'Rate the following Domains / Sub Domains for Strengths', 0, 0, 7, 7, 1, 15),
(16, 'Rate the following Domains / Sub Domains for Challenges', 0, 0, 7, 7, 2, 16),
(17, 'Rate the following Domains / Sub Domains for Organization Criticality', 0, 0, 10, 8, 4, 17),
(18, 'R', 0, 0, 7, 0, 1, 0),
(19, 'S', 0, 0, 7, 0, 1, 0),
(20, 'T', 0, 0, 7, 0, 1, 0),
(21, 'U', 0, 0, 7, 0, 1, 0),
(22, 'V', 0, 0, 7, 0, 1, 0),
(23, 'W', 0, 0, 7, 0, 1, 0),
(24, 'X', 0, 0, 7, 0, 1, 0),
(25, 'Y', 0, 0, 7, 0, 1, 0),
(26, 'Z', 0, 0, 7, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `TopicId` tinyint(4) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `TDesc` varchar(10) NOT NULL,
  `Stat` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`TopicId`, `Name`, `TDesc`, `Stat`) VALUES
(1, 'LEADERSHIP', '', 0),
(2, 'FINANCE', '', 0),
(3, 'BUSINESS', '', 0),
(4, 'DIGITAL MARKETING', '', 0),
(6, 'DIGITAL TRANSFORMATION', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `TId` int(11) NOT NULL,
  `CompDetCd` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Trainees` tinyint(4) NOT NULL COMMENT 'No of trainees in this batch',
  `NoOfDays` tinyint(4) NOT NULL,
  `CPH` tinyint(4) NOT NULL,
  `Delivery` tinyint(4) NOT NULL COMMENT '1-online; 2-offsite; 3-Inhouse...'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trainingbatch`
--

CREATE TABLE `trainingbatch` (
  `TBNo` int(11) NOT NULL,
  `TID` int(11) NOT NULL,
  `EmpCd` varchar(15) NOT NULL,
  `YOE` tinyint(4) NOT NULL COMMENT 'Overall Years of Experience - 1: >25; 2: 15-25; 3: 7-15; 4: 3-7; 5: 1-3; 6: <1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trainingbatchgdet`
--

CREATE TABLE `trainingbatchgdet` (
  `TBGDet` int(11) NOT NULL,
  `TBNo` int(11) NOT NULL,
  `EmpCd` varchar(15) NOT NULL,
  `MCd` tinyint(4) NOT NULL COMMENT 'Growth code',
  `GCdDt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trainingbatchpdet`
--

CREATE TABLE `trainingbatchpdet` (
  `TBPNo` int(11) NOT NULL,
  `TBNo` int(11) NOT NULL,
  `EmpCd` varchar(15) NOT NULL,
  `DCD` tinyint(4) NOT NULL DEFAULT 0,
  `TrngDt` date NOT NULL DEFAULT '1001-01-01',
  `HrsOfTraining` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trainingdet`
--

CREATE TABLE `trainingdet` (
  `TDetCd` int(11) NOT NULL,
  `TBNo` int(11) NOT NULL,
  `EmpCd` varchar(11) NOT NULL,
  `MCd` tinyint(11) NOT NULL COMMENT 'from Mst, MTyp=3',
  `PreRating` tinyint(11) NOT NULL DEFAULT 1,
  `PostRating` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Post Training';

-- --------------------------------------------------------

--
-- Table structure for table `trainingdomains`
--

CREATE TABLE `trainingdomains` (
  `TDNo` int(11) NOT NULL,
  `TBNo` int(11) NOT NULL,
  `DCd` tinyint(4) NOT NULL,
  `SDCd` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `training_related_details`
--

CREATE TABLE `training_related_details` (
  `training_no` int(11) NOT NULL,
  `group_size` varchar(100) DEFAULT NULL,
  `Comp_cd` smallint(4) DEFAULT 0,
  `courseId` int(11) DEFAULT NULL,
  `off_site_add` varchar(200) NOT NULL,
  `stat` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=short listed,1=training done',
  `login_id` int(11) DEFAULT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `training_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_related_details`
--

INSERT INTO `training_related_details` (`training_no`, `group_size`, `Comp_cd`, `courseId`, `off_site_add`, `stat`, `login_id`, `created_time`, `training_date`) VALUES
(1, '3', 2, 0, '', 0, 3, '2023-01-28 10:41:53', NULL),
(3, '3', 2, 3, 'raipur chhattisgarh', 0, 5, '2023-02-04 20:52:53', '2023-02-04 00:00:00'),
(4, '6', 7, 3, 'fghjklkjhgf', 0, 6, '2023-02-05 10:50:42', '2023-02-05 00:00:00'),
(5, '15', 7, 3, 'raipur chhattisgarh', 0, 6, '2023-02-05 12:30:39', '2023-02-05 00:00:00'),
(6, '12', 6, 2, '', 0, 12, '2023-02-05 13:23:30', '2023-02-05 00:00:00'),
(7, '13', 6, 2, '', 0, 13, '2023-02-05 16:27:12', '2023-02-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tt_mst`
--

CREATE TABLE `tt_mst` (
  `tt_id` int(11) NOT NULL,
  `tt_name` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tt_mst`
--

INSERT INTO `tt_mst` (`tt_id`, `tt_name`, `status`) VALUES
(1, 'Offsite', 0),
(2, 'Onsite', 0),
(3, 'Online', 0),
(4, 'Trainers Classroom', 0),
(5, 'In Person', 0),
(7, 'Intra Company', 0),
(8, 'Inter Company', 0),
(9, 'On Job', 0);

-- --------------------------------------------------------

--
-- Table structure for table `univ`
--

CREATE TABLE `univ` (
  `UnivCd` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL DEFAULT '-',
  `CountryCd` smallint(6) NOT NULL DEFAULT 0,
  `Img` varchar(200) DEFAULT NULL,
  `Stat` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `univ`
--

INSERT INTO `univ` (`UnivCd`, `Name`, `CountryCd`, `Img`, `Stat`) VALUES
(1, 'Rotterdam University', 1, 'http://www.rentmystay.com/resource/home/assets/images/hero-banner.jpg.pagespeed.ce.ZBLgS7n3gq.jpg', 0),
(2, 'Cambridge', 44, 'http://www.rentmystay.com/resource/home/assets/images/hero-banner.jpg.pagespeed.ce.ZBLgS7n3gq.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `univcourses`
--

CREATE TABLE `univcourses` (
  `UCId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `UnivCd` smallint(6) NOT NULL DEFAULT 0,
  `Stat` tinyint(4) NOT NULL DEFAULT 0,
  `Delivery` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1-Onsite; 2- Online; 3-Mixed',
  `CDesc` varchar(200) NOT NULL DEFAULT '-',
  `CHrs` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'No of Hrs',
  `DetLink` varchar(200) NOT NULL,
  `GrpLevel` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1-Entry level; 2-Jnr level; 3-Mid Level; 7-Snr Level; 8-CXO; 9-Board'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `univcourses`
--

INSERT INTO `univcourses` (`UCId`, `CourseId`, `UnivCd`, `Stat`, `Delivery`, `CDesc`, `CHrs`, `DetLink`, `GrpLevel`) VALUES
(1, 1, 1, 0, 1, '-', 40, 'https://em-executive.berkeley.edu/chief-technology-officer?utm_medium=EmWebsite&utm_content=Category&utm_term=Digital-Transformation&utm_campaign=direct_EmWebsite_Category_Digital-Transformation', 0),
(2, 1, 2, 0, 1, '-', 60, 'https://online.em.kellogg.northwestern.edu/chief-digital-officer?utm_medium=EmWebsite&utm_content=Category&utm_term=Digital-Transformation&utm_campaign=direct_EmWebsite_Category_Digital-Transformation', 0);

-- --------------------------------------------------------

--
-- Table structure for table `univcoursesdet`
--

CREATE TABLE `univcoursesdet` (
  `TopicId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `TopicName` varchar(50) NOT NULL DEFAULT '-',
  `THrs` tinyint(4) NOT NULL DEFAULT 0,
  `TDesc` varchar(200) NOT NULL DEFAULT '-',
  `Stat` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `univcoursesdet`
--

INSERT INTO `univcoursesdet` (`TopicId`, `CourseId`, `TopicName`, `THrs`, `TDesc`, `Stat`) VALUES
(1, 1, 'Introduction to AI', 2, 'Introducing the basic concepts of AI', 0),
(2, 2, 'Introduction to Machine Language', 3, 'Advantages of knowing Machine Language', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `pwd_txt` varchar(255) DEFAULT NULL,
  `mobile` varchar(15) NOT NULL,
  `user_type` enum('0','1','2','3','4','5','6','9') NOT NULL DEFAULT '0' COMMENT '0=customer,1=partner,7=adminstrator',
  `Comp_cd` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `forgot_pass_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `pwd_txt`, `mobile`, `user_type`, `Comp_cd`, `created_at`, `updated_at`, `forgot_pass_token`) VALUES
(1, 'Debasish Mahato', 'deba@deba.com', '202cb962ac59075b964b07152d234b70', NULL, '9876543201', '9', 0, '2022-04-03 21:38:44', '2022-04-03 21:38:44', NULL),
(2, 'Sanjay', 'sanjayn@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9876543202', '9', 0, '2022-04-03 21:45:48', '2022-04-03 21:45:48', NULL),
(3, 'Vijay', 'vijay@gmail.com', '4f9fecabbd77fba02d2497f880f44e6f', 'vijay', '9876543203', '9', 0, '2023-01-24 20:19:45', '2023-01-24 20:19:45', 'fba46a2e495709c29cd985d1d64f9af6'),
(5, 'Customer1', 'customer1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345', '9878987989', '0', 2, '2023-01-28 22:44:44', '2023-01-28 22:44:44', NULL),
(6, 'Custoer2', 'customer2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '123456', '7766554433', '0', 1, '2023-01-28 22:49:10', '2023-01-28 22:49:10', NULL),
(7, 'Customer', 'customer@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345', '7788877777', '1', 0, '2023-02-04 16:50:51', '2023-02-04 16:50:51', NULL),
(8, 'Vendor1', 'vendor1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345', '8989898789', '5', 21, '2023-02-05 12:06:50', '2023-02-05 12:06:50', NULL),
(12, 'Customer4', 'customer4@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345', '9856754565', '1', 22, '2023-02-05 13:18:16', '2023-02-05 13:18:16', NULL),
(13, 'Customer5', 'customer5@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345', '8965456545', '1', 23, '2023-02-05 16:18:42', '2023-02-05 16:18:42', NULL),
(14, 'vendor5', 'vendor5@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345', '8867656765', '5', 24, '2023-02-05 16:30:01', '2023-02-05 16:30:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `VId` int(11) NOT NULL,
  `VName` varchar(50) NOT NULL,
  `CountryCd` int(11) NOT NULL,
  `CityCd` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`VId`, `VName`, `CountryCd`, `CityCd`, `Status`) VALUES
(1, 'Berkeley ExcecEd / Berkeley Haas', 238, 1, 0),
(2, 'NorthWestern Kellogs', 239, 1, 0),
(3, 'University Of Cambridge', 238, 1, 0),
(4, 'Columbia Business School', 239, 1, 0),
(5, 'Wharton Executive Education ', 239, 1, 0),
(6, 'Rotman school of Management, University of Toronto', 40, 1, 0),
(7, 'Columbia Engineeriing ', 239, 1, 0),
(8, 'NYU, Tandon', 238, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vend_levels`
--

CREATE TABLE `vend_levels` (
  `vlevel_id` int(11) NOT NULL,
  `vlevel_name` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vend_levels`
--

INSERT INTO `vend_levels` (`vlevel_id`, `vlevel_name`, `status`) VALUES
(1, 'Board', 0),
(2, 'Cxo', 0),
(3, 'Senior', 0),
(4, 'Executive', 0),
(5, 'Junior', 0),
(6, 'Mid Level', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cdomdet`
--
ALTER TABLE `cdomdet`
  ADD PRIMARY KEY (`CDomNo`);

--
-- Indexes for table `cdurdet`
--
ALTER TABLE `cdurdet`
  ADD PRIMARY KEY (`CDetDurNo`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `clngdet`
--
ALTER TABLE `clngdet`
  ADD PRIMARY KEY (`CDetLangNo`);

--
-- Indexes for table `clvldet`
--
ALTER TABLE `clvldet`
  ADD PRIMARY KEY (`CDetLvlNo`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Comp_no`);

--
-- Indexes for table `companydet`
--
ALTER TABLE `companydet`
  ADD PRIMARY KEY (`CompDetCd`);

--
-- Indexes for table `compceo`
--
ALTER TABLE `compceo`
  ADD PRIMARY KEY (`CCNo`);

--
-- Indexes for table `compceodet`
--
ALTER TABLE `compceodet`
  ADD PRIMARY KEY (`CCDetNo`);

--
-- Indexes for table `compemp`
--
ALTER TABLE `compemp`
  ADD PRIMARY KEY (`CEmpNo`);

--
-- Indexes for table `compemphr`
--
ALTER TABLE `compemphr`
  ADD PRIMARY KEY (`CEmpHRNo`);

--
-- Indexes for table `comphr`
--
ALTER TABLE `comphr`
  ADD PRIMARY KEY (`CHRNo`);

--
-- Indexes for table `comphrd`
--
ALTER TABLE `comphrd`
  ADD PRIMARY KEY (`CHRDNo`);

--
-- Indexes for table `comphrdet`
--
ALTER TABLE `comphrdet`
  ADD PRIMARY KEY (`CHRDetNo`);

--
-- Indexes for table `comphrf`
--
ALTER TABLE `comphrf`
  ADD PRIMARY KEY (`CHRDetNo`);

--
-- Indexes for table `comphrr`
--
ALTER TABLE `comphrr`
  ADD PRIMARY KEY (`CHRDetNo`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseId`);

--
-- Indexes for table `ctypdet`
--
ALTER TABLE `ctypdet`
  ADD PRIMARY KEY (`CdetTypCd`);

--
-- Indexes for table `curr_mst`
--
ALTER TABLE `curr_mst`
  ADD PRIMARY KEY (`CurrId`);

--
-- Indexes for table `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`DCd`);

--
-- Indexes for table `domainsub`
--
ALTER TABLE `domainsub`
  ADD PRIMARY KEY (`SDCd`);

--
-- Indexes for table `general_info`
--
ALTER TABLE `general_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `langs`
--
ALTER TABLE `langs`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `levels_mst`
--
ALTER TABLE `levels_mst`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `mst`
--
ALTER TABLE `mst`
  ADD PRIMARY KEY (`MCd`);

--
-- Indexes for table `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `ques`
--
ALTER TABLE `ques`
  ADD PRIMARY KEY (`QNo`);

--
-- Indexes for table `quesdet`
--
ALTER TABLE `quesdet`
  ADD PRIMARY KEY (`QNoDet`);

--
-- Indexes for table `quesoptions`
--
ALTER TABLE `quesoptions`
  ADD PRIMARY KEY (`qono`);

--
-- Indexes for table `quesresp`
--
ALTER TABLE `quesresp`
  ADD PRIMARY KEY (`QRNo`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QCd`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`TopicId`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`TId`);

--
-- Indexes for table `trainingbatchgdet`
--
ALTER TABLE `trainingbatchgdet`
  ADD PRIMARY KEY (`TBGDet`);

--
-- Indexes for table `trainingbatchpdet`
--
ALTER TABLE `trainingbatchpdet`
  ADD PRIMARY KEY (`TBPNo`);

--
-- Indexes for table `trainingdomains`
--
ALTER TABLE `trainingdomains`
  ADD PRIMARY KEY (`TDNo`);

--
-- Indexes for table `training_related_details`
--
ALTER TABLE `training_related_details`
  ADD PRIMARY KEY (`training_no`);

--
-- Indexes for table `tt_mst`
--
ALTER TABLE `tt_mst`
  ADD PRIMARY KEY (`tt_id`);

--
-- Indexes for table `univ`
--
ALTER TABLE `univ`
  ADD PRIMARY KEY (`UnivCd`) USING BTREE;

--
-- Indexes for table `univcourses`
--
ALTER TABLE `univcourses`
  ADD PRIMARY KEY (`UCId`);

--
-- Indexes for table `univcoursesdet`
--
ALTER TABLE `univcoursesdet`
  ADD PRIMARY KEY (`TopicId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`VId`);

--
-- Indexes for table `vend_levels`
--
ALTER TABLE `vend_levels`
  ADD PRIMARY KEY (`vlevel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cdomdet`
--
ALTER TABLE `cdomdet`
  MODIFY `CDomNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cdurdet`
--
ALTER TABLE `cdurdet`
  MODIFY `CDetDurNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` smallint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clngdet`
--
ALTER TABLE `clngdet`
  MODIFY `CDetLangNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clvldet`
--
ALTER TABLE `clvldet`
  MODIFY `CDetLvlNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `Comp_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `companydet`
--
ALTER TABLE `companydet`
  MODIFY `CompDetCd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `compceo`
--
ALTER TABLE `compceo`
  MODIFY `CCNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `compceodet`
--
ALTER TABLE `compceodet`
  MODIFY `CCDetNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `compemp`
--
ALTER TABLE `compemp`
  MODIFY `CEmpNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `compemphr`
--
ALTER TABLE `compemphr`
  MODIFY `CEmpHRNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `comphr`
--
ALTER TABLE `comphr`
  MODIFY `CHRNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comphrd`
--
ALTER TABLE `comphrd`
  MODIFY `CHRDNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `comphrdet`
--
ALTER TABLE `comphrdet`
  MODIFY `CHRDetNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `comphrf`
--
ALTER TABLE `comphrf`
  MODIFY `CHRDetNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `comphrr`
--
ALTER TABLE `comphrr`
  MODIFY `CHRDetNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ctypdet`
--
ALTER TABLE `ctypdet`
  MODIFY `CdetTypCd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `curr_mst`
--
ALTER TABLE `curr_mst`
  MODIFY `CurrId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `domain`
--
ALTER TABLE `domain`
  MODIFY `DCd` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `domainsub`
--
ALTER TABLE `domainsub`
  MODIFY `SDCd` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `general_info`
--
ALTER TABLE `general_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `langs`
--
ALTER TABLE `langs`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `levels_mst`
--
ALTER TABLE `levels_mst`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mst`
--
ALTER TABLE `mst`
  MODIFY `MCd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `priority`
--
ALTER TABLE `priority`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ques`
--
ALTER TABLE `ques`
  MODIFY `QNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quesdet`
--
ALTER TABLE `quesdet`
  MODIFY `QNoDet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `quesoptions`
--
ALTER TABLE `quesoptions`
  MODIFY `qono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `quesresp`
--
ALTER TABLE `quesresp`
  MODIFY `QRNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QCd` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `TopicId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `TId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainingbatchgdet`
--
ALTER TABLE `trainingbatchgdet`
  MODIFY `TBGDet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainingbatchpdet`
--
ALTER TABLE `trainingbatchpdet`
  MODIFY `TBPNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainingdomains`
--
ALTER TABLE `trainingdomains`
  MODIFY `TDNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_related_details`
--
ALTER TABLE `training_related_details`
  MODIFY `training_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tt_mst`
--
ALTER TABLE `tt_mst`
  MODIFY `tt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `univ`
--
ALTER TABLE `univ`
  MODIFY `UnivCd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `univcourses`
--
ALTER TABLE `univcourses`
  MODIFY `UCId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `univcoursesdet`
--
ALTER TABLE `univcoursesdet`
  MODIFY `TopicId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `VId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vend_levels`
--
ALTER TABLE `vend_levels`
  MODIFY `vlevel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
