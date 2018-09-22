-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2018 at 08:36 AM
-- Server version: 10.1.26-MariaDB
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
-- Database: `unicorn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `sl` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `id` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`sl`, `name`, `id`, `phone`, `password`, `address`, `email`) VALUES
(3, 'Subhendu Hazra', 'oWfj5beO83', '8145453466', 'ioma', 'Arambagh', 'vuchu@gmail.com'),
(4, 'Subhendu Hazra', 'YX7pZIHPAK', '9732259665', 'Subhendu8+', 'Arambagh, Hooghly', 'subhendu965.hazra@gmail.com'),
(5, 'Angur Hazra', 'M9RQ6tkuK1', '8145049023', 'Angur5+', 'Parul', 'angur@gmail.com'),
(6, 'Subharthi Hazra', 'wFWYnvlN4q', '80996633', 'Subharthi9+', 'Arambagh, Hooghly', 'subharthi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `create_admin`
--

CREATE TABLE `create_admin` (
  `sl` int(11) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `create_admin`
--

INSERT INTO `create_admin` (`sl`, `phone`, `email`, `code`) VALUES
(1, '8145453466', 'vuchu@gmail.com', 'ynGHDoKtWI'),
(5, '9732259665', 'subhendu965.hazra@gmail.com', 'arH7fekS0p'),
(7, '80996633', 'subharthi@gmail.com', 'C9wTM1FeK7'),
(8, '5496546464', 'dfigidugfdiugudigdiugdgidifugduifgduiffgdfuigduigd', 'l8bZFSDOGt'),
(9, '8145049023', 'angur@gmail.com', 'wdZsQvLMo1');

-- --------------------------------------------------------

--
-- Table structure for table `day_schedule`
--

CREATE TABLE `day_schedule` (
  `sl` int(10) UNSIGNED NOT NULL,
  `id` varchar(10) NOT NULL,
  `daytype` enum('everyday','someday') NOT NULL,
  `route` varchar(20) NOT NULL,
  `vehicle` varchar(10) NOT NULL,
  `sunday` tinyint(1) NOT NULL,
  `monday` tinyint(1) NOT NULL,
  `tuesday` tinyint(1) NOT NULL,
  `wednesday` tinyint(1) NOT NULL,
  `thursday` tinyint(1) NOT NULL,
  `friday` tinyint(1) NOT NULL,
  `saturday` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day_schedule`
--

INSERT INTO `day_schedule` (`sl`, `id`, `daytype`, `route`, `vehicle`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`) VALUES
(11, 'z5Y8G4mWbd', 'everyday', '20', 'fmezXBPcIy', 1, 1, 1, 1, 1, 1, 1),
(12, '0NYeus98VR', 'someday', 'cued', 'fmezXBPcIy', 0, 1, 1, 0, 0, 1, 0),
(13, 'EaySDKzJY9', 'everyday', 'PrimeAC', 'fmezXBPcIy', 1, 1, 1, 1, 1, 1, 1),
(14, 'WolzBkYRUv', 'everyday', '16', 'fmezXBPcIy', 1, 1, 1, 1, 1, 1, 1),
(15, 'lLbrT9ZK5o', 'everyday', '16', 'fmezXBPcIy', 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `depot`
--

CREATE TABLE `depot` (
  `sl` int(10) UNSIGNED NOT NULL,
  `id` varchar(5) NOT NULL,
  `depot` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `type` enum('small','standard','big','') NOT NULL,
  `remark` varchar(500) NOT NULL,
  `passenger_capacity` int(11) NOT NULL,
  `vehicle_capacity` int(11) NOT NULL,
  `shop` tinyint(1) NOT NULL,
  `restaurant` tinyint(1) NOT NULL,
  `guest_room` tinyint(1) NOT NULL,
  `toilet` tinyint(1) NOT NULL,
  `free_wifi` tinyint(1) NOT NULL,
  `carshed` tinyint(1) NOT NULL,
  `no_of_employee` int(11) NOT NULL,
  `no_of_quarter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depot`
--

INSERT INTO `depot` (`sl`, `id`, `depot`, `address`, `type`, `remark`, `passenger_capacity`, `vehicle_capacity`, `shop`, `restaurant`, `guest_room`, `toilet`, `free_wifi`, `carshed`, `no_of_employee`, `no_of_quarter`) VALUES
(10, '3UXoK', 'Arambagh', 'Arambagh, Hooghly, West bengal', 'small', 'asdfad adad', 20, 6, 1, 1, 1, 1, 0, 1, 5, 3),
(11, 'xK2ev', 'Kolkata', 'Kolkata, West Bengal', 'small', 'dsfsf', 200, 100, 1, 1, 0, 0, 1, 1, 5, 3),
(12, 'PxliQ', 'Tarakeswar', 'Hooghly,WB', 'small', 'dsjgfysu\r\n', 2000, 20, 1, 1, 0, 0, 0, 1, 10, 3),
(13, '2tYQp', 'Bandar', 'Hooghly,WB', 'small', 'dsfsfd', 200, 10, 1, 0, 0, 0, 0, 1, 10, 2),
(14, 'vp4qF', 'Garerghat', 'Hooghly', 'small', 'df\r\n', 100, 10, 0, 0, 0, 0, 0, 0, 5, 3),
(15, 'Gbs8f', 'Patul', 'Hooghly', 'small', 'dasiu', 50, 20, 0, 0, 0, 0, 0, 0, 2, 3),
(16, 'F2uPg', 'Jayrambati', 'Bankura', 'small', 'Maaa', 55, 5, 1, 1, 1, 1, 1, 1, 10, 3),
(17, 'xg4rB', 'Ghatal', 'adsiuogf', 'small', 'asdadf', 30, 5, 1, 1, 1, 0, 0, 1, 3, 1),
(18, 'Vd9oW', 'Bankura', 'Bankura', 'small', '', 200, 5, 1, 1, 0, 1, 0, 0, 3, 2),
(19, 'nVTit', 'Bardhaman', 'Bardhaman', 'small', '', 120, 12, 1, 1, 1, 1, 0, 0, 12, 3),
(20, 'aDGAI', 'Dasghara', 'Hooghly', 'small', 'dsiu', 100, 5, 1, 1, 1, 0, 0, 0, 3, 1),
(21, 'yE56l', 'Srirampur', 'Hooghly', 'small', 'sadad', 100, 3, 1, 1, 1, 1, 0, 1, 2, 2),
(22, 'v8Ana', 'Gotan', 'bardhaman', 'small', '', 30, 5, 1, 0, 0, 0, 0, 0, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fare_chart`
--

CREATE TABLE `fare_chart` (
  `sl` int(10) UNSIGNED NOT NULL,
  `id` varchar(10) NOT NULL,
  `route` varchar(20) NOT NULL,
  `vehicle` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fare_chart`
--

INSERT INTO `fare_chart` (`sl`, `id`, `route`, `vehicle`) VALUES
(5, 'EM1Cgca4tx', '16', 'fmezXBPcIy');

-- --------------------------------------------------------

--
-- Table structure for table `fare_chart_details`
--

CREATE TABLE `fare_chart_details` (
  `sl` int(10) UNSIGNED NOT NULL,
  `id` varchar(10) NOT NULL,
  `route` varchar(20) NOT NULL,
  `source` varchar(5) NOT NULL,
  `destination` varchar(5) NOT NULL,
  `fare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fare_chart_details`
--

INSERT INTO `fare_chart_details` (`sl`, `id`, `route`, `source`, `destination`, `fare`) VALUES
(41, 'EM1Cgca4tx', '16', 'fvOia', '3UXoK', 8),
(42, 'EM1Cgca4tx', '16', 'tFYmJ', '3UXoK', 12),
(43, 'EM1Cgca4tx', '16', 'tFYmJ', 'fvOia', 9),
(44, 'EM1Cgca4tx', '16', 'pkTIl', '3UXoK', 18),
(45, 'EM1Cgca4tx', '16', 'pkTIl', 'fvOia', 15),
(46, 'EM1Cgca4tx', '16', 'pkTIl', 'tFYmJ', 10),
(47, 'EM1Cgca4tx', '16', 'PxliQ', '3UXoK', 25),
(48, 'EM1Cgca4tx', '16', 'PxliQ', 'fvOia', 20),
(49, 'EM1Cgca4tx', '16', 'PxliQ', 'tFYmJ', 16),
(50, 'EM1Cgca4tx', '16', 'PxliQ', 'pkTIl', 11);

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `sl` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`sl`, `username`, `password`, `name`) VALUES
(1, 'subhendu', 'Subhendu8+', 'Subhendu Hazra'),
(2, 'subharthi', 'Subharthi9+', 'Subharthi Hazra');

-- --------------------------------------------------------

--
-- Table structure for table `master_notification`
--

CREATE TABLE `master_notification` (
  `sl` int(10) UNSIGNED NOT NULL,
  `id` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `target` enum('admin','user') NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_notification`
--

INSERT INTO `master_notification` (`sl`, `id`, `title`, `message`, `target`, `datetime`) VALUES
(2, 'HXWs9D4ngm', 'Tiku is a good boy', 'mr. New boston has come here tomorrow.', 'admin', '2018-09-07 17:22:10'),
(3, 'ut2xKHgvbm', 'Hey What are you doing?', 'Why are you creating so many routes??', 'admin', '2018-09-07 17:22:10'),
(4, 'RybdeitIwm', 'How are you', 'We are all well', 'admin', '2018-09-07 17:22:10'),
(6, 'iRrx5MnZ4b', 'Arambagh High School', 'Dihiboirah\r\n\r\n\r\nsdf\r\ndsf\r\nsdf\r\nsdfsdfsdofh su7fgdu dufgd 88fsg 8sg 8sg8s 8 87sgf87s fg78sgf8s 8sg8sg 8sgf8sdg8ds 8 g8s g8s 88s g8g 8s 8gs8f 8s g8s fsgf', 'admin', '2018-09-07 17:36:09'),
(8, 'RhKpo89QLM', 'sdfsdffsd sdfsd swdfsd sd sdfsdsd sd fs   sdfsdf s s sfsdf sd dsfs s sd sfsdfds sd sdfsd sdf sf dsfd', 'dfguids fuigi udsgfuiis iusfiugd si fis iusfgidu suig fuisgfiu sugsdf sdufgiusd gf fiusdf uisd fiusg fuisg ufi gugfsuigf uigf iusgfui gfuis uigfisug fiushfuishfiusgfiusgui giua iaa iuagiu uiasdiua iuag iagfiaiu fuidsfgius yidsgf sgfis fiugsi gsduifiuds fgs dis iudsfguisdg idusfg id iudsfg iussdhf ujdsgfsi usduf usd fuys fuysgfuysg ufysd uys dfguids fuigi udsgfuiis iusfiugd si fis iusfgidu suig fuisgfiu sugsdf sdufgiusd gf fiusdf uisd fiusg fuisg ufi gugfsuigf uigf iusgfui gfuis uigfisug fiushfuishfiusgfiusgui giua iaa iuagiu uiasdiua iuag iagfiaiu fuidsfgius yidsgf sgfis fiugsi gsduifiuds fgs dis iudsfguisdg idusfg id iudsfg iussdhf ujdsgfsi usduf usd fuys fuysgfuysg ufysd uysdfguids fuigi udsgfuiis iusfiugd si fis iusfgidu suig fuisgfiu sugsdf sdufgiusd gf fiusdf uisd fiusg fuisg ufi gugfsuigf uigf iusgfui gfuis uigfisug fiushfuishfiusgfiusgui giua iaa iuagiu uiasdiua iuag iagfiaiu fuidsfgius yidsgf sgfis fiugsi gsduifiuds fgs dis iudsfguisdg idusfg id iudsfg iussdhf ujdsgfsi usduf usd fuys fuysgfuysg ufysd uys', 'admin', '2009-01-01 00:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `sl` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `ac` tinyint(1) NOT NULL,
  `nonstop` tinyint(1) NOT NULL,
  `standing` tinyint(1) NOT NULL,
  `source` varchar(5) NOT NULL,
  `destination` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`sl`, `name`, `ac`, `nonstop`, `standing`, `source`, `destination`) VALUES
(23, '20', 0, 0, 1, '3UXoK', 'vp4qF'),
(24, '20A', 0, 0, 1, 'vp4qF', 'PxliQ'),
(25, '16', 0, 0, 1, '3UXoK', 'PxliQ'),
(26, 'AC16', 0, 0, 1, 'PxliQ', '3UXoK'),
(27, 'cued', 0, 0, 1, '3UXoK', 'xK2ev'),
(28, 'PrimeAC', 1, 0, 0, '3UXoK', 'xK2ev');

-- --------------------------------------------------------

--
-- Table structure for table `route_details`
--

CREATE TABLE `route_details` (
  `sl` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `stop_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route_details`
--

INSERT INTO `route_details` (`sl`, `name`, `stop_id`) VALUES
(106, '20', '3UXoK'),
(107, '20', 'aKVBh'),
(108, '20', 'AmybZ'),
(109, '20', 'fvOia'),
(110, '20', 'wcrPq'),
(111, '20', 'jRmXv'),
(112, '20', 'Ite53'),
(113, '20', 'TeDoI'),
(114, '20', 'vp4qF'),
(115, '20A', 'vp4qF'),
(116, '20A', 'wcrPq'),
(117, '20A', 'fvOia'),
(118, '20A', 'kE17i'),
(119, '20A', 'tFYmJ'),
(120, '20A', 'pkTIl'),
(121, '20A', 'PxliQ'),
(122, '16', '3UXoK'),
(123, '16', 'fvOia'),
(124, '16', 'tFYmJ'),
(125, '16', 'pkTIl'),
(126, '16', 'PxliQ'),
(127, 'AC16', 'PxliQ'),
(128, 'AC16', 'pkTIl'),
(129, 'AC16', 'fvOia'),
(130, 'AC16', '3UXoK'),
(131, 'cued', '3UXoK'),
(132, 'cued', 'fvOia'),
(133, 'cued', 'pkTIl'),
(134, 'cued', 'PxliQ'),
(135, 'cued', 'yE56l'),
(136, 'cued', 'xK2ev'),
(137, 'PrimeAC', '3UXoK'),
(138, 'PrimeAC', 'fvOia'),
(139, 'PrimeAC', 'pkTIl'),
(140, 'PrimeAC', 'PxliQ'),
(141, 'PrimeAC', 'yE56l'),
(142, 'PrimeAC', 'xK2ev');

-- --------------------------------------------------------

--
-- Table structure for table `seat_matrix`
--

CREATE TABLE `seat_matrix` (
  `sl` int(10) UNSIGNED NOT NULL,
  `seat_matrix` varchar(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stop`
--

CREATE TABLE `stop` (
  `sl` int(10) UNSIGNED NOT NULL,
  `id` varchar(5) NOT NULL,
  `stop` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `type` enum('small','standard','big','') NOT NULL,
  `remark` varchar(500) NOT NULL,
  `passenger_capacity` int(11) NOT NULL,
  `vehicle_capacity` int(11) NOT NULL,
  `shop` tinyint(1) NOT NULL,
  `restaurant` tinyint(1) NOT NULL,
  `guest_room` tinyint(1) NOT NULL,
  `toilet` tinyint(1) NOT NULL,
  `free_wifi` tinyint(1) NOT NULL,
  `carshed` tinyint(1) NOT NULL,
  `no_of_employee` int(11) NOT NULL,
  `no_of_quarter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stop`
--

INSERT INTO `stop` (`sl`, `id`, `stop`, `address`, `type`, `remark`, `passenger_capacity`, `vehicle_capacity`, `shop`, `restaurant`, `guest_room`, `toilet`, `free_wifi`, `carshed`, `no_of_employee`, `no_of_quarter`) VALUES
(14, '3UXoK', 'Arambagh', 'Arambagh, Hooghly, West bengal', 'small', 'asdfad adad', 20, 6, 1, 1, 1, 1, 0, 1, 5, 3),
(15, 'xK2ev', 'Kolkata', 'Kolkata, West Bengal', 'small', 'dsfsf', 200, 100, 1, 1, 0, 0, 1, 1, 5, 3),
(16, 'aKVBh', 'Parul', 'parul, arambagh, hooghly', 'small', 'asd', 23, 5, 1, 1, 0, 0, 1, 1, 10, 3),
(17, 'PxliQ', 'Tarakeswar', 'Hooghly,WB', 'small', 'dsjgfysu\r\n', 2000, 20, 1, 1, 0, 0, 0, 1, 10, 3),
(18, 'pkTIl', 'Champadanga', 'Hooghly', 'small', 'ask\r\n', 20, 2, 1, 1, 0, 0, 0, 0, 1, 1),
(19, '2tYQp', 'Bandar', 'Hooghly,WB', 'small', 'dsfsfd', 200, 10, 1, 0, 0, 0, 0, 1, 10, 2),
(20, 'hosdb', 'Gouhati', 'Hooghly,WB', 'small', 'askdgi', 20, 2, 1, 0, 0, 0, 0, 0, 1, 1),
(21, 'vp4qF', 'Garerghat', 'Hooghly', 'small', 'df\r\n', 100, 10, 0, 0, 0, 0, 0, 0, 5, 3),
(22, 'jRmXv', 'khanakul', 'Hooghly', 'small', 'fduis', 50, 5, 0, 0, 0, 0, 0, 0, 10, 3),
(23, 'Ite53', 'Rajhati', 'Hooghly', 'small', 'sddu', 100, 3, 0, 0, 0, 1, 0, 0, 2, 1),
(24, 'wcrPq', 'Nangulpara', 'Hooghly,WB', 'small', 'ud', 50, 3, 0, 0, 0, 0, 0, 0, 3, 1),
(25, 'TeDoI', 'Nandanpur', 'Hooghly,WB', 'small', 'dsug', 20, 2, 1, 0, 0, 0, 0, 0, 1, 3),
(26, 'Gbs8f', 'Patul', 'Hooghly', 'small', 'dasiu', 50, 20, 0, 0, 0, 0, 0, 0, 2, 3),
(27, 'nvdZx', 'Ghoshpur', 'Hooghly', 'small', 'dsu', 10, 2, 0, 1, 0, 0, 0, 0, 3, 1),
(28, 'XDcVB', 'Pilkhan', 'hooghly', 'small', 'ujds', 10, 2, 1, 0, 0, 1, 0, 0, 3, 1),
(29, 'Mkr5W', 'Dongol More', 'Hooghly', 'small', 'ds', 10, 3, 0, 0, 0, 0, 0, 1, 2, 1),
(30, 'F2uPg', 'Jayrambati', 'Bankura', 'small', 'Maaa', 55, 5, 1, 1, 1, 1, 1, 1, 10, 3),
(31, '5rBIO', 'Kamarpukur', 'Hooghly,WB', 'small', 'sdf', 50, 2, 1, 1, 1, 1, 0, 1, 3, 1),
(32, 'GEuM1', 'Goghat', 'Hooghly', 'small', 'aius', 20, 2, 1, 0, 0, 0, 0, 0, 5, 1),
(33, 'fvOia', 'Mayapur', 'Hooghly', 'small', 'ds', 30, 3, 1, 1, 1, 0, 0, 0, 2, 1),
(34, 'kE17i', 'Harinkhola', 'Hooghly', 'small', 'ed', 100, 5, 1, 1, 1, 0, 1, 0, 3, 2),
(35, 'nCb2d', 'Kamarpukur Chati', 'Hooghly', 'small', 'dasy', 100, 5, 1, 1, 0, 0, 0, 0, 2, 1),
(36, 'tFYmJ', 'Sodepur', 'Hooghly', 'small', 'dsu', 50, 2, 0, 1, 0, 0, 0, 0, 2, 1),
(37, 'xg4rB', 'Ghatal', 'adsiuogf', 'small', 'asdadf', 30, 5, 1, 1, 1, 0, 0, 1, 3, 1),
(38, 'Vd9oW', 'Bankura', 'Bankura', 'small', '', 200, 5, 1, 1, 0, 1, 0, 0, 3, 2),
(39, 'nVTit', 'Bardhaman', 'Bardhaman', 'small', '', 120, 12, 1, 1, 1, 1, 0, 0, 12, 3),
(40, 'aDGAI', 'Dasghara', 'Hooghly', 'small', 'dsiu', 100, 5, 1, 1, 1, 0, 0, 0, 3, 1),
(41, 'yE56l', 'Srirampur', 'Hooghly', 'small', 'sadad', 100, 3, 1, 1, 1, 1, 0, 1, 2, 2),
(42, 'AmybZ', 'Muthadanga', 'Hooghly', 'small', 'ds', 20, 2, 1, 0, 0, 0, 0, 0, 3, 1),
(43, 'XzJ9u', 'Kamarkundu', 'Hooghly', 'small', 'dsu', 120, 5, 1, 1, 1, 0, 0, 0, 23, 1),
(44, 'v8Ana', 'Gotan', 'bardhaman', 'small', '', 30, 5, 1, 0, 0, 0, 0, 0, 2, 1),
(45, 'AOfYv', 'Sagrai', 'bardhaman', 'small', 'ds', 12, 1, 1, 0, 0, 0, 0, 0, 2, 1),
(46, 's0hew', 'Uchalan', 'bardhaman', 'small', '', 45, 6, 1, 1, 0, 0, 0, 0, 2, 1),
(47, 'xBcbG', 'Sehara Bazar', 'bardhaman', 'small', '', 25, 2, 0, 0, 1, 0, 0, 0, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_history`
--

CREATE TABLE `ticket_history` (
  `sl` int(10) UNSIGNED NOT NULL,
  `id` varchar(20) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `route` varchar(20) NOT NULL,
  `schedule` varchar(10) NOT NULL,
  `vehicle` varchar(10) NOT NULL,
  `source` varchar(5) NOT NULL,
  `destination` varchar(5) NOT NULL,
  `person` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_of_journey` date NOT NULL,
  `depart_time` time NOT NULL,
  `arrival_time` time NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_history`
--

INSERT INTO `ticket_history` (`sl`, `id`, `datetime`, `route`, `schedule`, `vehicle`, `source`, `destination`, `person`, `amount`, `date_of_journey`, `depart_time`, `arrival_time`, `username`) VALUES
(3, 'UTK18Mx0T8Iv7QblHFY4', '2009-01-01 00:57:33', '16', 'WolzBkYRUv', 'fmezXBPcIy', 'fvOia', 'pkTIl', 3, 27, '2008-12-31', '19:00:00', '19:45:00', 'subharthi75@gmail.com'),
(4, 'UTK18Xw3WQsKrNgIVLGm', '2009-01-01 01:02:48', '16', 'WolzBkYRUv', 'fmezXBPcIy', 'fvOia', 'pkTIl', 3, 27, '2008-12-31', '19:00:00', '19:45:00', 'subharthi75@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `time_schedule`
--

CREATE TABLE `time_schedule` (
  `sl` int(10) UNSIGNED NOT NULL,
  `schedule_id` varchar(10) NOT NULL,
  `stop_id` varchar(5) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_schedule`
--

INSERT INTO `time_schedule` (`sl`, `schedule_id`, `stop_id`, `time`) VALUES
(45, 'z5Y8G4mWbd', '3UXoK', '05:00:00'),
(46, 'z5Y8G4mWbd', 'aKVBh', '05:10:00'),
(47, 'z5Y8G4mWbd', 'AmybZ', '05:25:00'),
(48, 'z5Y8G4mWbd', 'fvOia', '05:30:00'),
(49, 'z5Y8G4mWbd', 'wcrPq', '06:05:00'),
(50, 'z5Y8G4mWbd', 'jRmXv', '06:15:00'),
(51, 'z5Y8G4mWbd', 'Ite53', '06:20:00'),
(52, 'z5Y8G4mWbd', 'TeDoI', '06:25:00'),
(53, 'z5Y8G4mWbd', 'vp4qF', '06:45:00'),
(54, '0NYeus98VR', '3UXoK', '05:00:00'),
(55, '0NYeus98VR', 'fvOia', '05:20:00'),
(56, '0NYeus98VR', 'pkTIl', '05:50:00'),
(57, '0NYeus98VR', 'PxliQ', '06:10:00'),
(58, '0NYeus98VR', 'yE56l', '07:10:00'),
(59, '0NYeus98VR', 'xK2ev', '09:00:00'),
(60, 'EaySDKzJY9', '3UXoK', '23:00:00'),
(61, 'EaySDKzJY9', 'fvOia', '23:20:00'),
(62, 'EaySDKzJY9', 'pkTIl', '23:50:00'),
(63, 'EaySDKzJY9', 'PxliQ', '00:10:00'),
(64, 'EaySDKzJY9', 'yE56l', '00:50:00'),
(65, 'EaySDKzJY9', 'xK2ev', '01:20:00'),
(66, 'WolzBkYRUv', '3UXoK', '18:30:00'),
(67, 'WolzBkYRUv', 'fvOia', '19:00:00'),
(68, 'WolzBkYRUv', 'tFYmJ', '19:30:00'),
(69, 'WolzBkYRUv', 'pkTIl', '19:45:00'),
(70, 'WolzBkYRUv', 'PxliQ', '20:00:00'),
(71, 'lLbrT9ZK5o', '3UXoK', '19:00:00'),
(72, 'lLbrT9ZK5o', 'fvOia', '19:15:00'),
(73, 'lLbrT9ZK5o', 'tFYmJ', '19:45:00'),
(74, 'lLbrT9ZK5o', 'pkTIl', '20:00:00'),
(75, 'lLbrT9ZK5o', 'PxliQ', '20:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sl` int(10) UNSIGNED NOT NULL,
  `id` varchar(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sl`, `id`, `name`, `address`, `phone`, `email`, `password`) VALUES
(1, 'MyC0w38R4D', 'Subharthi Hazra', 'Parul', '528899666', 'subharthi75@gmail.com', 'Subharthi9+'),
(2, 'ge5SRU4znJ', 'Angur Hazra', 'Dighre', '4155889', 'angur@gmail.com', 'Angur5+'),
(5, 'dUFNpyzigs', 'Angur Hazra', 'Elephanta Guha', '8559663', 'angur@kjds.com', 'Angur5+');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `sl` int(10) UNSIGNED NOT NULL,
  `type` enum('bus','sedan','suv','hatchback','van','luxary_bus','autorickshaw') NOT NULL,
  `id` varchar(10) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `seats` int(11) NOT NULL,
  `car_number` varchar(100) NOT NULL,
  `seat_matrix` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`sl`, `type`, `id`, `description`, `manufacturer`, `model`, `seats`, `car_number`, `seat_matrix`) VALUES
(10, 'luxary_bus', 'BzcnMRGAwe', 'AC Big bus', 'VOLVO', 'G639', 32, 'WB C6 8547', ''),
(11, 'bus', 'fmezXBPcIy', 'Big Bus', 'TATA', '1616', 75, 'WB 85369', ''),
(12, 'sedan', 'Ef8xI4cNV3', 'Swift DZire', 'Suzuki', 'VXi', 5, 'WB 12 5874', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `create_admin`
--
ALTER TABLE `create_admin`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `code` (`code`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `day_schedule`
--
ALTER TABLE `day_schedule`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `depot`
--
ALTER TABLE `depot`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `fare_chart`
--
ALTER TABLE `fare_chart`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `fare_chart_details`
--
ALTER TABLE `fare_chart_details`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `master_notification`
--
ALTER TABLE `master_notification`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `route_details`
--
ALTER TABLE `route_details`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `seat_matrix`
--
ALTER TABLE `seat_matrix`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `seat_matrix` (`seat_matrix`);

--
-- Indexes for table `stop`
--
ALTER TABLE `stop`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ticket_history`
--
ALTER TABLE `ticket_history`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `time_schedule`
--
ALTER TABLE `time_schedule`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `create_admin`
--
ALTER TABLE `create_admin`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `day_schedule`
--
ALTER TABLE `day_schedule`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `depot`
--
ALTER TABLE `depot`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `fare_chart`
--
ALTER TABLE `fare_chart`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fare_chart_details`
--
ALTER TABLE `fare_chart_details`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_notification`
--
ALTER TABLE `master_notification`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `route_details`
--
ALTER TABLE `route_details`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT for table `seat_matrix`
--
ALTER TABLE `seat_matrix`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stop`
--
ALTER TABLE `stop`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `ticket_history`
--
ALTER TABLE `ticket_history`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `time_schedule`
--
ALTER TABLE `time_schedule`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
