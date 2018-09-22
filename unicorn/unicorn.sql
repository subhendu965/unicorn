-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2018 at 06:40 AM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.31-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'YJgHb', 'Arambagh', 'ward-13\r\nSantiniketan palli', 'standard', 'sdsf\r\n', 656, 656, 0, 1, 1, 1, 1, 1, 66, 55),
(6, 'h84jL', 'Kolkata', 'kosdius isdbuishuisd', 'big', 'Good', 60000, 2000, 1, 1, 1, 1, 1, 1, 1000, 300),
(7, '8etXz', 'Tak', 'Ohio', 'big', 'Hello', 100, 200, 0, 1, 1, 1, 1, 1, 400, 300);

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
-- Dumping data for table `stop`
--

INSERT INTO `stop` (`sl`, `id`, `depot`, `address`, `type`, `remark`, `passenger_capacity`, `vehicle_capacity`, `shop`, `restaurant`, `guest_room`, `toilet`, `free_wifi`, `carshed`, `no_of_employee`, `no_of_quarter`) VALUES
(1, 'YJgHb', 'Arambagh', 'ward-13\r\nSantiniketan palli', 'standard', 'sdsf\r\n', 656, 656, 0, 1, 1, 1, 1, 1, 66, 55),
(4, 'r28ia', 'Tak', 'Aofh uigi uwuw udwuybw uwduwd uaysd savdu', 'small', 'sdadss sdfsfsf', 20000, 1000, 1, 0, 1, 0, 1, 1, 500, 200),
(6, 'h84jL', 'Kolkata', 'kosdius isdbuishuisd', 'big', 'Good', 60000, 2000, 1, 1, 1, 1, 1, 1, 1000, 300),
(7, 'FucAe', 'Parul', 'Arambagh, Hooghly', 'small', 'Bad', 30, 2, 1, 0, 0, 0, 0, 0, 2, 1),
(8, '8etXz', 'Tak', 'Ohio', 'big', 'Hello', 100, 200, 0, 1, 1, 1, 1, 1, 400, 300);

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
(8, 'luxary_bus', 'KIvYUswjyN', 'Piloii', 'AL', 'janBus', 5757, 'hfghf', '');

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
-- Indexes for table `depot`
--
ALTER TABLE `depot`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `id` (`id`);

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
-- AUTO_INCREMENT for table `depot`
--
ALTER TABLE `depot`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
-- AUTO_INCREMENT for table `seat_matrix`
--
ALTER TABLE `seat_matrix`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stop`
--
ALTER TABLE `stop`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `sl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
