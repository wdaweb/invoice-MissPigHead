-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 02:21 AM
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
-- Table structure for table `contype`
--

CREATE TABLE `contype` (
  `id` int(2) NOT NULL,
  `type` varchar(2) NOT NULL,
  `desCH` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contype`
--

INSERT INTO `contype` (`id`, `type`, `desCH`) VALUES
(1, '1', '餐飲、食物'),
(2, '2', '衣物、鞋、包、錶'),
(3, '3', '藥妝、保養'),
(4, '4', '日用品、清潔用品、雜貨'),
(5, '5', '交通、通訊'),
(6, '6', '家電、家具'),
(7, '7', '交際、娛樂'),
(8, '8', '進修課程'),
(9, '9', '其他');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contype`
--
ALTER TABLE `contype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contype`
--
ALTER TABLE `contype`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
