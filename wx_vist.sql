-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 07 月 26 日 11:27
-- 服务器版本: 5.6.12
-- PHP 版本: 5.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `wx_vist`
--
CREATE DATABASE IF NOT EXISTS `wx_vist` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wx_vist`;

-- --------------------------------------------------------

--
-- 表的结构 `wx_user`
--

CREATE TABLE IF NOT EXISTS `wx_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wid` varchar(255) DEFAULT NULL,
  `wx_username` varchar(255) DEFAULT NULL,
  `wx_nick` varchar(255) DEFAULT NULL,
  `is_invite` tinyint(4) DEFAULT NULL,
  `self_invite_id` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `last_uesd_time` int(11) DEFAULT NULL,
  `grid_count` float DEFAULT NULL,
  `app_id` int(11) DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `invite_code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wid_UNIQUE` (`wid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- 转存表中的数据 `wx_user`
--

INSERT INTO `wx_user` (`id`, `wid`, `wx_username`, `wx_nick`, `is_invite`, `self_invite_id`, `create_time`, `last_uesd_time`, `grid_count`, `app_id`, `action_id`, `invite_code`) VALUES
(45, 'abcd', 'eww2weaw423we', 'eww2weaw423we', 0, NULL, 1373522405, NULL, 2, NULL, NULL, '41'),
(46, 'abcde', 'eww2weaw423wwwe', 'eww2weaw423wwwe', 0, 41, 1373522630, NULL, 0, NULL, NULL, NULL),
(47, 'lxf5998', 'lxf5998', 'lxf5998', 0, 42, 1373853465, NULL, 0, NULL, NULL, NULL),
(49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
