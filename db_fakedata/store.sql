-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 01:57 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoicesys`
--

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(2) NOT NULL,
  `type` varchar(2) NOT NULL,
  `name` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `type`, `name`) VALUES
(1, '1', '八方雲集'),
(2, '1', '三媽臭臭鍋'),
(3, '1', '7-11'),
(4, '1', '家樂福'),
(5, '1', '全聯'),
(6, '1', '好市多'),
(7, '1', '碧潭米粉湯'),
(8, '2', 'Lativ'),
(9, '2', 'NET'),
(10, '2', 'Momo'),
(11, '3', '屈臣氏'),
(12, '3', '康是美'),
(13, '4', '好市多'),
(14, '4', '家樂福'),
(15, '4', '全聯'),
(16, '5', 'T-Star'),
(17, '5', 'FET'),
(18, '5', 'TWN'),
(19, '5', 'CHT'),
(20, '6', 'Mono'),
(21, '6', '家樂福'),
(22, '6', '全國電子'),
(23, '6', '好市多'),
(24, '7', '錢櫃'),
(25, '7', '年代售票'),
(26, '8', 'Udemy'),
(27, '8', '救國團'),
(28, '5', '台塑石油'),
(29, '5', '中國石油');











--
-- Indexes for dumped tables
--

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
