-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-12-07 01:23:02
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `invoicesys`
--

-- --------------------------------------------------------

--
-- 資料表結構 `prize`
--

CREATE TABLE `prize` (
  `id` int(2) NOT NULL,
  `type` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(8) NOT NULL,
  `amountC` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `prize`
--

INSERT INTO `prize` (`id`, `type`, `name`, `amount`, `amountC`) VALUES
(1, '1', '頭獎', 200000, '二十萬元'),
(2, '2', '二獎', 40000, '四萬元'),
(3, '3', '三獎', 10000, '一萬元'),
(4, '4', '四獎', 4000, '四千元'),
(7, '5', '五獎', 1000, '一千元'),
(8, '6', '六獎', 200, '二百元'),
(9, '1K', '特別獎', 10000000, '一千萬元'),
(10, '1M', '特獎', 2000000, '二百萬元'),
(11, '6A', '增開六獎', 200, '二百元');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `prize`
--
ALTER TABLE `prize`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prize`
--
ALTER TABLE `prize`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
