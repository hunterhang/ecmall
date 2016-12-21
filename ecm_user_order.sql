-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-20 18:03:04
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wxmall`
--

-- --------------------------------------------------------

--
-- 表的结构 `ecm_user_order`
--

CREATE TABLE `ecm_user_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_sn` varchar(20) NOT NULL DEFAULT '',
  `type` varchar(10) NOT NULL DEFAULT 'material',
  `extension` varchar(10) NOT NULL DEFAULT '',
  `good_title` varchar(256) DEFAULT NULL,
  `buyer_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `buyer_name` varchar(100) DEFAULT NULL,
  `buyer_email` varchar(60) NOT NULL DEFAULT '',
  `buyer_mobile` varchar(100) NOT NULL DEFAULT '0',
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_name` varchar(100) DEFAULT NULL,
  `payment_code` varchar(20) NOT NULL DEFAULT '',
  `pay_time` int(10) UNSIGNED DEFAULT NULL,
  `created` int(11) NOT NULL,
  `pay_message` varchar(255) NOT NULL DEFAULT '',
  `order_amount` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `finished_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `old_img1` varchar(256) NOT NULL,
  `old_img2` varchar(256) NOT NULL,
  `old_img3` varchar(256) NOT NULL,
  `new_img1` varchar(256) NOT NULL,
  `new_img2` varchar(256) NOT NULL,
  `new_img3` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ecm_user_order`
--
ALTER TABLE `ecm_user_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_sn` (`order_sn`),
  ADD KEY `seller_name` (`good_title`),
  ADD KEY `buyer_name` (`buyer_name`),
  ADD KEY `add_time` (`buyer_mobile`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `ecm_user_order`
--
ALTER TABLE `ecm_user_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
