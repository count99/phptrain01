-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-06-30 11:00:55
-- 伺服器版本: 10.1.21-MariaDB
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `shopping`
--

-- --------------------------------------------------------

--
-- 資料表結構 `bill`
--

CREATE TABLE `bill` (
  `b_seq` int(11) NOT NULL,
  `b_bill_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_product_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_values` int(11) NOT NULL,
  `b_amount` int(11) NOT NULL,
  `b_total_valuse` int(11) NOT NULL,
  `b_time` datetime NOT NULL,
  `b_tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_addr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_contector` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_receipt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_type` int(2) NOT NULL DEFAULT '1',
  `b_ip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_note1` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `bill`
--

INSERT INTO `bill` (`b_seq`, `b_bill_number`, `b_product_number`, `b_values`, `b_amount`, `b_total_valuse`, `b_time`, `b_tel`, `b_addr`, `b_contector`, `b_receipt`, `b_type`, `b_ip`, `b_note1`) VALUES
(1, '452452', '54252', 11, 11, 121, '2017-06-29 00:00:00', '11', '11', '11', '11', 2, '127', NULL),
(2, '1111111', '111111', 11, 1, 11, '2017-06-23 00:00:00', '1', '1', '1', '1', 4, '1', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `firm`
--

CREATE TABLE `firm` (
  `f_seq` int(11) NOT NULL,
  `f_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_story` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_pic` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `firm`
--

INSERT INTO `firm` (`f_seq`, `f_name`, `f_story`, `f_pic`) VALUES
(6, 'yui', 'yui', '20170626-110943.JPG'),
(7, 'xxx', 'xxx', '20170626-125314.jpg'),
(8, 'iii', 'iii', '20170626-125323.png'),
(9, 'erter', 'ertet', '20170626-125434.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `maintain`
--

CREATE TABLE `maintain` (
  `a_seq` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `a_seq` int(10) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `holder` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`a_seq`, `name`, `password`, `holder`, `level`) VALUES
(1, '1', 'c4ca4238a0b923820dcc509a6f75849b', '', 5),
(3, '2', 'c4ca4238a0b923820dcc509a6f75849b', '', 1),
(4, '3', 'c4ca4238a0b923820dcc509a6f75849b', '', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `order_list`
--

CREATE TABLE `order_list` (
  `o_seq` int(11) NOT NULL,
  `payment_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_amount` int(11) NOT NULL,
  `o_ip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `order_list`
--

INSERT INTO `order_list` (`o_seq`, `payment_number`, `product_number`, `o_amount`, `o_ip`, `o_datetime`) VALUES
(15, '20170630-082848U0gY', '3', 1, '127', '2017-06-30 10:57:25'),
(16, '20170630-082848U0gY', '3', 111, '127', '2017-06-30 11:07:42'),
(18, '20170630-082848U0gY', '2', 111, '127', '2017-06-30 11:24:37'),
(19, '20170630-082848U0gY', '2', 11, '127', '2017-06-30 11:24:51'),
(24, '20170630-112730jloh', '1', 11, '127', '2017-06-30 11:31:30'),
(25, '20170630-112730jloh', '2', 111, '127', '2017-06-30 11:47:22'),
(26, '20170630-112730jloh', '1', 11, '127', '2017-06-30 11:47:28');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `a_seq` int(10) NOT NULL,
  `a_pn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_story` mediumtext COLLATE utf8mb4_unicode_ci,
  `a_price` int(11) NOT NULL,
  `a_pic` text COLLATE utf8mb4_unicode_ci,
  `a_firm` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_time` datetime NOT NULL,
  `a_ip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_builder` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`a_seq`, `a_pn`, `a_title`, `a_story`, `a_price`, `a_pic`, `a_firm`, `a_time`, `a_ip`, `a_builder`) VALUES
(31, '1', 'efw', 'wefw', 10, '20170626-120952.jpg', '6', '2017-06-26 12:09:52', '127.0.0.1', '1'),
(33, '2', 'hf', 'hjh', 1, '20170626-125720.png', '6', '2017-06-26 15:55:37', '127.0.0.1', '1'),
(36, '3', 'fghgf', 'gfhfh', 55, '20170626-130959.png', '7', '2017-06-26 15:55:46', '127.0.0.1', '1'),
(37, '444', '444', '444', 444, '20170627-093117.png', '8', '2017-06-27 09:31:17', '127.0.0.1', '1');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`b_seq`);

--
-- 資料表索引 `firm`
--
ALTER TABLE `firm`
  ADD PRIMARY KEY (`f_seq`);

--
-- 資料表索引 `maintain`
--
ALTER TABLE `maintain`
  ADD PRIMARY KEY (`a_seq`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`a_seq`);

--
-- 資料表索引 `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`o_seq`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`a_seq`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `bill`
--
ALTER TABLE `bill`
  MODIFY `b_seq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `firm`
--
ALTER TABLE `firm`
  MODIFY `f_seq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `maintain`
--
ALTER TABLE `maintain`
  MODIFY `a_seq` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `a_seq` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `order_list`
--
ALTER TABLE `order_list`
  MODIFY `o_seq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- 使用資料表 AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `a_seq` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
