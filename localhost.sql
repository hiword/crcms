-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 04 月 26 日 17:14
-- 服务器版本: 10.1.9-MariaDB
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `3`
--
CREATE DATABASE `3` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `3`;

-- --------------------------------------------------------

--
-- 表的结构 `a_table4`
--

CREATE TABLE IF NOT EXISTS `a_table4` (
  `id` mediumint(8) unsigned NOT NULL,
  `radio` char(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'key',
  `model_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `a_table4`
--

INSERT INTO `a_table4` (`id`, `radio`, `model_id`, `created_uid`, `updated_uid`, `deleted_uid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 'key', 0, 0, 0, 0, 0, 0, 0),
(18, 'key', 0, 0, 0, 0, 0, 0, 0),
(19, 'key', 0, 0, 0, 0, 0, 0, 0),
(20, 'key', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `a_table5`
--

CREATE TABLE IF NOT EXISTS `a_table5` (
  `id` mediumint(8) unsigned NOT NULL,
  `textarea` text COLLATE utf8_unicode_ci NOT NULL,
  `model_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `action_logs`
--

CREATE TABLE IF NOT EXISTS `action_logs` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `remark` varchar(255) NOT NULL,
  `url` varchar(512) NOT NULL,
  `param` text NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `scheme` varchar(10) NOT NULL,
  `method` varchar(10) NOT NULL,
  `device` varchar(30) NOT NULL,
  `browser` varchar(30) NOT NULL,
  `browser_version` varchar(30) NOT NULL,
  `os` varchar(30) NOT NULL,
  `os_version` varchar(30) NOT NULL,
  `robot_name` varchar(30) NOT NULL,
  `is_robot` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `port` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `client_ip` bigint(20) unsigned NOT NULL DEFAULT '0',
  `created_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `updated_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `users` (`created_uid`,`created_type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- 转存表中的数据 `action_logs`
--

INSERT INTO `action_logs` (`id`, `remark`, `url`, `param`, `user_agent`, `scheme`, `method`, `device`, `browser`, `browser_version`, `os`, `os_version`, `robot_name`, `is_robot`, `port`, `client_ip`, `created_type`, `updated_type`, `deleted_type`, `created_uid`, `updated_uid`, `deleted_uid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'update document', 'http://3.cs/index.php/manage/document/update/6', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 2130706433, 1, 0, 0, 1, 0, 0, 1457665616, 1457665616, 0),
(2, 'add store', 'http://localhost/3.1/public/index.php/manage/category/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1459909079, 1459909079, 0),
(3, 'category update', 'http://localhost/3.1/public/index.php/manage/category/update/19', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1459909406, 1459909406, 0),
(4, 'category destroy', 'http://localhost/3.1/public/index.php/manage/category/destroy', '', '', 'http', 'DELETE', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1459909413, 1459909413, 0),
(5, 'delete tags', 'http://localhost/3.1/public/index.php/manage/tags/destroy', '', '', 'http', 'DELETE', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1459996167, 1459996167, 0),
(6, 'delete tags', 'http://localhost/3.1/public/index.php/manage/tags/destroy', '', '', 'http', 'DELETE', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1459996191, 1459996191, 0),
(7, 'delete tags', 'http://localhost/3.1/public/index.php/manage/tags/destroy', '', '', 'http', 'DELETE', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1459996222, 1459996222, 0),
(8, 'add document', 'http://localhost/3.1/public/index.php/manage/document/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1459998506, 1459998506, 0),
(9, 'add tags', 'http://localhost/3.1/public/index.php/manage/tags/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460009209, 1460009209, 0),
(10, 'add tags', 'http://localhost/3.1/public/index.php/manage/tags/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460009271, 1460009271, 0),
(11, 'update tags', 'http://localhost/3.1/public/index.php/manage/tags/update/16', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460009801, 1460009801, 0),
(12, 'category store', 'http://localhost/3.1/public/index.php/manage/category/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460011077, 1460011077, 0),
(13, 'category destroy', 'http://localhost/3.1/public/index.php/manage/category/destroy', '', '', 'http', 'DELETE', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460011082, 1460011082, 0),
(14, 'category destroy', 'http://localhost/3.1/public/index.php/manage/category/destroy', '', '', 'http', 'DELETE', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460011087, 1460011087, 0),
(15, 'category store', 'http://localhost/3.1/public/index.php/manage/category/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460011101, 1460011101, 0),
(16, 'category update', 'http://localhost/3.1/public/index.php/manage/category/update/16', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460011107, 1460011107, 0),
(17, 'add document', 'http://localhost/3.1/public/index.php/manage/document/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460011436, 1460011436, 0),
(18, 'add document', 'http://localhost/3.1/public/index.php/manage/document/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460011468, 1460011468, 0),
(19, 'add document', 'http://localhost/3.1/public/index.php/manage/document/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460012738, 1460012738, 0),
(20, 'add document', 'http://localhost/3.1/public/index.php/manage/document/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460014418, 1460014418, 0),
(21, 'add document', 'http://localhost/3.1/public/index.php/manage/document/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460015752, 1460015752, 0),
(22, 'add document', 'http://localhost/3.1/public/index.php/manage/document/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460080388, 1460080388, 0),
(23, 'add document', 'http://localhost/3.1/public/index.php/manage/document/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460080488, 1460080488, 0),
(24, 'add document', 'http://localhost/3.1/public/index.php/manage/document/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460082441, 1460082441, 0),
(25, 'update document', 'http://localhost/3.1/public/index.php/manage/document/update/65', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460100528, 1460100528, 0),
(26, 'update document', 'http://localhost/3.1/public/index.php/manage/document/update/65', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460100972, 1460100972, 0),
(27, 'update document', 'http://localhost/3.1/public/index.php/manage/document/update/65', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460100986, 1460100986, 0),
(28, 'update document', 'http://localhost/3.1/public/index.php/manage/document/update/65', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460100994, 1460100994, 0),
(29, 'add document', 'http://localhost/3.1/public/index.php/manage/document/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460363244, 1460363244, 0),
(30, 'add document', 'http://localhost/3.1/public/index.php/manage/document/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460366192, 1460366192, 0),
(31, 'update document', 'http://localhost/3.1/public/index.php/manage/document/update/68', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460366226, 1460366226, 0),
(32, 'add administrator', 'http://localhost/3.1/public/index.php/manage/admin/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460707072, 1460707072, 0),
(33, 'update administrator', 'http://localhost/3.1/public/index.php/manage/admin/update/4', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1460707860, 1460707860, 0),
(34, 'store model', 'http://localhost/3.1/public/index.php/manage/model/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461136804, 1461136804, 0),
(35, 'store model', 'http://localhost/3.1/public/index.php/manage/model/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461136828, 1461136828, 0),
(36, 'update model', 'http://localhost/3.1/public/index.php/manage/model/update/2', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461137218, 1461137218, 0),
(37, 'update model', 'http://localhost/3.1/public/index.php/manage/model/update/2', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461137241, 1461137241, 0),
(38, 'update model', 'http://localhost/3.1/public/index.php/manage/model/update/2', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461137309, 1461137309, 0),
(39, 'update model', 'http://localhost/3.1/public/index.php/manage/model/update/2', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461139693, 1461139693, 0),
(40, 'store model', 'http://localhost/3.1/public/index.php/manage/model/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461139709, 1461139709, 0),
(41, 'store model', 'http://localhost/3.1/public/index.php/manage/model/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461139736, 1461139736, 0),
(42, 'update model', 'http://localhost/3.1/public/index.php/manage/model/update/4', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461141034, 1461141034, 0),
(43, 'update model', 'http://localhost/3.1/public/index.php/manage/model/update/4', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461141164, 1461141164, 0),
(44, 'update model', 'http://localhost/3.1/public/index.php/manage/model/update/4', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461141240, 1461141240, 0),
(45, 'store model', 'http://localhost/3.1/public/index.php/manage/model/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461141254, 1461141254, 0),
(46, 'update model', 'http://localhost/3.1/public/index.php/manage/model/update/5', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461141372, 1461141372, 0),
(47, 'update model', 'http://localhost/3.1/public/index.php/manage/model/update/5', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461141383, 1461141383, 0),
(48, 'store model', 'http://localhost/3.1/public/index.php/manage/model/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461226708, 1461226708, 0),
(49, 'store model', 'http://localhost/3.1/public/index.php/manage/model/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461226734, 1461226734, 0),
(50, 'store model', 'http://localhost/3.1/public/index.php/manage/model/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461226894, 1461226894, 0),
(51, 'store model', 'http://localhost/3.1/public/index.php/manage/model/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461226921, 1461226921, 0),
(52, 'store field', 'http://localhost/3.1/public/index.php/manage/field/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461228064, 1461228064, 0),
(53, 'store field', 'http://localhost/3.1/public/index.php/manage/field/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461290550, 1461290550, 0),
(54, 'store field', 'http://localhost/3.1/public/index.php/manage/field/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461290720, 1461290720, 0),
(55, 'store field', 'http://localhost/3.1/public/index.php/manage/field/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461292153, 1461292153, 0),
(56, 'store field', 'http://localhost/3.1/public/index.php/manage/field/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461292268, 1461292268, 0),
(57, 'store field', 'http://localhost/3.1/public/index.php/manage/field/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461292308, 1461292308, 0),
(58, 'store field', 'http://localhost/3.1/public/index.php/manage/field/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461304523, 1461304523, 0),
(59, 'update field', 'http://localhost/3.1/public/index.php/manage/field/update/4', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461315630, 1461315630, 0),
(60, 'update field', 'http://localhost/3.1/public/index.php/manage/field/update/9', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461316209, 1461316209, 0),
(61, 'store field', 'http://localhost/3.1/public/index.php/manage/field/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461573273, 1461573273, 0),
(62, 'update field', 'http://localhost/3.1/public/index.php/manage/field/update/10', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461573484, 1461573484, 0),
(63, 'store model', 'http://localhost/3.1/public/index.php/manage/model/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461639186, 1461639186, 0),
(64, 'store model', 'http://localhost/3.1/public/index.php/manage/model/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461639211, 1461639211, 0),
(65, 'store model', 'http://localhost/3.1/public/index.php/manage/model/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461639233, 1461639233, 0),
(66, 'store field', 'http://localhost/3.1/public/index.php/manage/field/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461639323, 1461639323, 0),
(67, 'store field', 'http://localhost/3.1/public/index.php/manage/field/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461639358, 1461639358, 0),
(68, 'update field', 'http://localhost/3.1/public/index.php/manage/field/update/12', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461639367, 1461639367, 0),
(69, 'store field', 'http://localhost/3.1/public/index.php/manage/field/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461639411, 1461639411, 0),
(70, 'store field', 'http://localhost/3.1/public/index.php/manage/field/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461639821, 1461639821, 0),
(71, 'store field', 'http://localhost/3.1/public/index.php/manage/field/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461639873, 1461639873, 0),
(72, 'store field', 'http://localhost/3.1/public/index.php/manage/field/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461639929, 1461639929, 0),
(73, 'update field', 'http://localhost/3.1/public/index.php/manage/field/update/11', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461639973, 1461639973, 0),
(74, 'store field', 'http://localhost/3.1/public/index.php/manage/field/store', '', '', 'http', 'POST', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461640025, 1461640025, 0),
(75, 'update field', 'http://localhost/3.1/public/index.php/manage/field/update/17', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461640030, 1461640030, 0),
(76, 'update field', 'http://localhost/3.1/public/index.php/manage/field/update/12', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461640183, 1461640183, 0),
(77, 'update field', 'http://localhost/3.1/public/index.php/manage/field/update/17', '', '', 'http', 'PUT', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1461650284, 1461650284, 0);

-- --------------------------------------------------------

--
-- 表的结构 `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(12) NOT NULL,
  `password` char(60) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `register_time` int(10) unsigned NOT NULL DEFAULT '0',
  `register_ip` bigint(20) unsigned NOT NULL DEFAULT '0',
  `login_time` int(10) unsigned NOT NULL DEFAULT '0',
  `login_ip` bigint(20) unsigned NOT NULL DEFAULT '0',
  `created_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `updated_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_name_unique` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `status`, `register_time`, `register_ip`, `login_time`, `login_ip`, `created_type`, `updated_type`, `deleted_type`, `created_at`, `updated_at`, `deleted_at`, `created_uid`, `updated_uid`, `deleted_uid`) VALUES
(1, 'admin', '$2y$10$nH/PLkSeI3SyVTbvCHKrcOns89qxOk68U7QY7Z3VVAuyGY6gG0UC2', 1, 0, 0, 0, 0, 0, 0, 0, 1456709412, 1456709412, 0, 0, 0, 0),
(2, 'abc', '123', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'aabc', '123', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'tesfdafda', '$2y$10$U37h/DEtIcjEt19TqgprgOm6479.xYVfC3UE8mcyEIjKjx58cDiLG', 1, 0, 0, 0, 0, 0, 0, 0, 1460707071, 1460707860, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `auth_logs`
--

CREATE TABLE IF NOT EXISTS `auth_logs` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `userid` mediumint(8) unsigned NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_ip` bigint(20) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `login_type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `updated_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `users` (`created_uid`,`created_type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `auth_logs`
--

INSERT INTO `auth_logs` (`id`, `userid`, `name`, `email`, `url`, `client_ip`, `type`, `status`, `login_type`, `created_type`, `updated_type`, `deleted_type`, `created_uid`, `updated_uid`, `deleted_uid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 0, 'hiword', '434730525@qq.com', 'http://localhost/3.1/public/index.php/auth/register', 0, 1, 1, '', 0, 0, 0, 0, 0, 0, 1461118282, 1461118282, 0),
(3, 0, 'fasdfas', '434730525@qq.com', 'http://localhost/3.1/public/index.php/auth/register', 0, 1, 1, '', 0, 0, 0, 0, 0, 0, 1461118885, 1461118885, 0);

-- --------------------------------------------------------

--
-- 表的结构 `category_documents`
--

CREATE TABLE IF NOT EXISTS `category_documents` (
  `category_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `document_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `category_documents_category_id_document_id_unique` (`category_id`,`document_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `category_documents`
--

INSERT INTO `category_documents` (`category_id`, `document_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(16, 25),
(16, 29),
(16, 30),
(16, 32),
(16, 33),
(16, 34),
(16, 35),
(16, 36),
(16, 37),
(16, 38),
(16, 39),
(16, 40),
(16, 41),
(16, 42),
(16, 43),
(16, 65),
(16, 66),
(16, 68),
(17, 25),
(18, 23),
(18, 25),
(21, 29),
(21, 30),
(21, 31),
(21, 32),
(21, 44),
(21, 45),
(21, 46),
(21, 47),
(21, 48),
(21, 49),
(21, 50),
(21, 51),
(21, 52),
(21, 53),
(21, 54),
(21, 55),
(21, 56),
(21, 57),
(21, 58),
(21, 59),
(21, 60),
(21, 61),
(21, 62),
(21, 63),
(21, 64);

-- --------------------------------------------------------

--
-- 表的结构 `categorys`
--

CREATE TABLE IF NOT EXISTS `categorys` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pid` mediumint(8) unsigned NOT NULL,
  `name` char(100) NOT NULL,
  `mark` char(50) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `updated_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `categorys`
--

INSERT INTO `categorys` (`id`, `pid`, `name`, `mark`, `status`, `created_type`, `updated_type`, `deleted_type`, `created_uid`, `updated_uid`, `deleted_uid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, '名称 名称 名称 名称 11111', 'afda', 1, 0, 0, 0, 0, 0, 0, 1456132533, 1459307484, 1459307484),
(2, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 1459217676, 1459307484, 1459307484),
(3, 1, '类别名称', 'abc', 1, 0, 0, 0, 0, 0, 0, 1459301885, 1459307484, 1459307484),
(4, 0, 'abcaefa', 'aaaaa', 1, 0, 0, 0, 0, 0, 0, 1459301893, 1459307484, 1459307484),
(5, 0, 'fdsafdas', 'fa', 1, 0, 0, 0, 0, 0, 0, 1459318462, 1459318545, 1459318545),
(6, 0, 'fdsafdasfdsaf', 'dsafdsadsa', 1, 0, 0, 0, 0, 0, 0, 1459318603, 1459318608, 1459318608),
(7, 0, 'fasfdsa', 'fdsafdsafsda', 1, 0, 0, 0, 0, 0, 0, 1459318661, 1459318666, 1459318666),
(8, 0, '名称 名称 名称 名称', 'fdsa', 1, 0, 0, 0, 0, 0, 0, 1459319914, 1459319919, 1459319919),
(9, 0, '1=1\\\\'' or 1 --', '85858', 1, 0, 0, 0, 0, 0, 0, 1459321169, 1459322590, 1459322590),
(10, 0, 'fdsafdsafdsaf', 'fad', 1, 0, 0, 0, 0, 0, 0, 1459322683, 1459322686, 1459322686),
(11, 0, 'fdsafdsafdsa', 'a', 1, 0, 0, 0, 0, 0, 0, 1459322705, 1459322709, 1459322709),
(12, 0, '类别名称', 'aaaaaafdasfdsa', 1, 0, 0, 0, 0, 0, 0, 1459322867, 1459322871, 1459322871),
(13, 0, 'fdsafdsafdasfdasf', 'fdsfdfsds', 1, 0, 0, 0, 0, 0, 0, 1459322922, 1459322924, 1459322924),
(14, 0, 'fdsafdsafdsa', 'fdsafdsafsafdas', 1, 0, 0, 0, 0, 0, 0, 1459322936, 1459323113, 1459323113),
(15, 0, '类别名称', 'abcea', 1, 0, 0, 0, 0, 0, 0, 1459323297, 1459323303, 1459323303),
(16, 0, 'fda', '22', 1, 0, 0, 0, 0, 0, 0, 1459323523, 1460011107, 0),
(17, 0, 'dasfdsafdsafdas', 'afdsa', 1, 0, 0, 0, 0, 0, 0, 1459324467, 1460011087, 1460011087),
(18, 0, 'fdasfdasfdas', '3332qe', 1, 0, 0, 0, 0, 0, 0, 1459324494, 1460011082, 1460011082),
(19, 0, 'fdsafdsafdasfdas', '121', 1, 0, 0, 0, 0, 0, 0, 1459324510, 1459909413, 1459909413),
(20, 18, 'aaaa', 'ad', 1, 0, 0, 0, 0, 0, 0, 1460011077, 1460011077, 0),
(21, 0, 'abcdea', 'aaaaaa', 1, 0, 0, 0, 0, 0, 0, 1460011101, 1460011101, 0);

-- --------------------------------------------------------

--
-- 表的结构 `count_details`
--

CREATE TABLE IF NOT EXISTS `count_details` (
  `cid` int(10) unsigned NOT NULL,
  `agent` text NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `count_details`
--

INSERT INTO `count_details` (`cid`, `agent`) VALUES
(4, 'Firefox'),
(5, 'Firefox'),
(6, ''),
(7, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0'),
(8, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0'),
(9, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0'),
(10, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0'),
(11, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0'),
(12, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0'),
(13, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0'),
(14, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0'),
(15, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0'),
(16, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0'),
(17, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0'),
(18, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0'),
(19, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0'),
(20, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0'),
(21, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0'),
(22, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0'),
(23, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0');

-- --------------------------------------------------------

--
-- 表的结构 `counts`
--

CREATE TABLE IF NOT EXISTS `counts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `outside_type` char(60) NOT NULL,
  `outside_id` int(10) unsigned NOT NULL DEFAULT '0',
  `client_ip` bigint(20) unsigned NOT NULL DEFAULT '0',
  `created_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `updated_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `counts`
--

INSERT INTO `counts` (`id`, `outside_type`, `outside_id`, `client_ip`, `created_type`, `updated_type`, `deleted_type`, `created_at`, `updated_at`, `deleted_at`, `created_uid`, `updated_uid`, `deleted_uid`) VALUES
(1, 'Simon\\Document\\Models\\Document', 21, 0, 0, 0, 0, 1457943474, 1457943474, 0, 0, 0, 0),
(2, 'Simon\\Document\\Models\\Document', 21, 0, 0, 0, 0, 1457943482, 1457943482, 0, 0, 0, 0),
(3, 'Simon\\Document\\Models\\Document', 21, 0, 0, 0, 0, 1457943519, 1457943519, 0, 0, 0, 0),
(4, 'Simon\\Document\\Models\\Document', 6, 0, 0, 0, 0, 1457944483, 1457944483, 0, 0, 0, 0),
(5, 'Simon\\Document\\Models\\Document', 6, 0, 0, 0, 0, 1457944496, 1457944496, 0, 0, 0, 0),
(6, 'Simon\\Document\\Models\\Document', 6, 0, 0, 0, 0, 1457944578, 1457944578, 0, 0, 0, 0),
(7, 'Simon\\Document\\Models\\Document', 21, 0, 0, 0, 0, 1457945679, 1457945679, 0, 0, 0, 0),
(8, 'Simon\\Document\\Models\\Document', 21, 0, 0, 0, 0, 1457946104, 1457946104, 0, 0, 0, 0),
(9, 'Simon\\Document\\Models\\Document', 21, 0, 0, 0, 0, 1457946113, 1457946113, 0, 0, 0, 0),
(10, 'Simon\\Document\\Models\\Document', 21, 0, 0, 0, 0, 1457946119, 1457946119, 0, 0, 0, 0),
(11, 'Simon\\Document\\Models\\Document', 21, 0, 0, 0, 0, 1457946134, 1457946134, 0, 0, 0, 0),
(12, 'Simon\\Document\\Models\\Document', 21, 0, 0, 0, 0, 1457946183, 1457946183, 0, 0, 0, 0),
(13, 'Simon\\Document\\Models\\Document', 21, 0, 0, 0, 0, 1457946199, 1457946199, 0, 0, 0, 0),
(14, 'Simon\\Document\\Models\\Document', 21, 0, 0, 0, 0, 1457946212, 1457946212, 0, 0, 0, 0),
(15, 'Simon\\Document\\Models\\Document', 21, 0, 0, 0, 0, 1457946225, 1457946225, 0, 0, 0, 0),
(16, 'Simon\\Document\\Models\\Document', 21, 0, 0, 0, 0, 1457946253, 1457946253, 0, 0, 0, 0),
(17, 'Simon\\Document\\Models\\Document', 21, 0, 0, 0, 0, 1457946276, 1457946276, 0, 0, 0, 0),
(18, 'Simon\\Document\\Models\\Document', 21, 0, 0, 0, 0, 1457946282, 1457946282, 0, 0, 0, 0),
(19, 'Simon\\Document\\Models\\Document', 21, 0, 0, 0, 0, 1457946287, 1457946287, 0, 0, 0, 0),
(20, 'Simon\\Document\\Models\\Document', 5, 0, 0, 0, 0, 1457946342, 1457946342, 0, 0, 0, 0),
(21, 'Simon\\Document\\Models\\Document', 7, 0, 0, 0, 0, 1457946410, 1457946410, 0, 0, 0, 0),
(22, 'Simon\\Document\\Models\\Document', 7, 0, 0, 0, 0, 1457946419, 1457946419, 0, 0, 0, 0),
(23, 'Simon\\Document\\Models\\Document', 7, 0, 0, 0, 0, 1457946423, 1457946423, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `document_datas`
--

CREATE TABLE IF NOT EXISTS `document_datas` (
  `did` mediumint(8) unsigned NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `intro` varchar(512) NOT NULL,
  `content` mediumtext NOT NULL,
  `created_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `updated_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`did`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `document_datas`
--

INSERT INTO `document_datas` (`did`, `seo_title`, `keyword`, `intro`, `content`, `created_type`, `updated_type`, `deleted_type`, `created_uid`, `updated_uid`, `deleted_uid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, '', '', '', '<p>fdsafdasfdsafdasfdsa<br/></p>', 1, 0, 0, 1, 0, 0, 1453345979, 1453345979, 0),
(2, '', '远程文件大小,PHP获取远程文件大小', 'PHPer都知道，本地获取文件大小，很简单filesize($path)，OK了，那很获取远程文件大小呢？在网上看到不少方法，整合下，推荐给大家。利用get_headers()，其实这是一个值得关注的函数，但是关注的人却不是很多。它可以取得服务器响应一个HTTP请求所发送的所有标头方法（1）：返回结果如下：方法（2），网上找的一个函数主要通过fsockopen来实现方法（3），通过CURL来获取方法（4），file_get_contents()，虽然它的功能不强大，但也是一种方法。试试吧，各位！...', '<p>PHPer都知道，本地获取文件大小，很简单filesize($path) ，OK了，</p><p>那很获取远程文件大小呢？</p><p>在网上看到不少方法，整合下，推荐给大家。</p><p>利用get_headers()，其实这是一个值得关注的函数，但是关注的人却不是很多。</p><p><span class="dc-title">它可以取得服务器响应一个 HTTP 请求所发送的所有标头</span></p><p><span class="dc-title">方法（1）：</span></p><pre class="brush:php;toolbar:false">get_headers($url,true);//true|1表示&nbsp;它会解析相应的信息并设定数组的键名</pre><p>返回结果如下：</p><pre class="brush:php;toolbar:false">Array(&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[0]&nbsp;=&gt;&nbsp;HTTP/1.1&nbsp;200&nbsp;OK&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Connection]&nbsp;=&gt;&nbsp;close&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Date]&nbsp;=&gt;&nbsp;Sat,&nbsp;23&nbsp;Nov&nbsp;2013&nbsp;01:40:38&nbsp;GMT\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Content-Length]&nbsp;=&gt;&nbsp;13305781\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Content-Type]&nbsp;=&gt;&nbsp;application/x-zip-compressed\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Last-Modified]&nbsp;=&gt;&nbsp;Fri,&nbsp;22&nbsp;Nov&nbsp;2013&nbsp;09:35:03&nbsp;GMT\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Accept-Ranges]&nbsp;=&gt;&nbsp;bytes\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[ETag]&nbsp;=&gt;&nbsp;&quot;80bdd01e66e7ce1:204140&quot;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Server]&nbsp;=&gt;&nbsp;Microsoft-IIS/6.0\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[X-Powered-By]&nbsp;=&gt;&nbsp;ASP.NET\r\n&nbsp;)\r\n&nbsp;//Content-Length即表示大小[单位字节]</pre><p><br/></p>_ueditor_page_break_tag_<p>方法（2），</p><p>网上找的一个函数</p><pre class="brush:php;toolbar:false">function&nbsp;getFileSize($url)&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;$url&nbsp;=&nbsp;parse_url($url);\r\n&nbsp;&nbsp;&nbsp;&nbsp;if(!!$fp&nbsp;=&nbsp;@fsockopen($url[&#39;host&#39;],empty($url[&#39;port&#39;])?80:$url[&#39;port&#39;],$error))&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;fputs($fp,&quot;GET&nbsp;&quot;.(empty($url[&#39;path&#39;])?&#39;/&#39;:$url[&#39;path&#39;]).&quot;&nbsp;HTTP/1.1\\r\\n&quot;);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;fputs($fp,&quot;Host:$url[host]\\r\\n\\r\\n&quot;);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;while(!feof($fp))&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$tmp&nbsp;=&nbsp;fgets($fp);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(trim($tmp)&nbsp;==&nbsp;&#39;&#39;)&nbsp;break;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(preg_match(&#39;/Content-Length:(.*)/si&#39;,$tmp,$arr))&nbsp;return&nbsp;trim($arr[1]);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;null;\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;else&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;null;\r\n&nbsp;&nbsp;&nbsp;&nbsp;}\r\n}</pre><p>主要通过 <span class="methodname"><strong>fsockopen</strong></span> 来实现</p><p>方法（3），通过CURL来获取</p><pre class="brush:php;toolbar:false">function&nbsp;remote_filesize($uri,$user=&#39;&#39;,$pw=&#39;&#39;)&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;ob_start();\r\n&nbsp;&nbsp;&nbsp;&nbsp;$ch&nbsp;=&nbsp;curl_init($uri);\r\n&nbsp;&nbsp;&nbsp;&nbsp;curl_setopt($ch,&nbsp;CURLOPT_HEADER,&nbsp;1);\r\n&nbsp;&nbsp;&nbsp;&nbsp;curl_setopt($ch,&nbsp;CURLOPT_NOBODY,&nbsp;1);\r\n&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(!empty($user)&nbsp;&amp;&amp;&nbsp;!empty($pw))&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$headers&nbsp;=&nbsp;array(&#39;Authorization:&nbsp;Basic&nbsp;&#39;&nbsp;.&nbsp;base64_encode($user.&#39;:&#39;.$pw));\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;curl_setopt($ch,&nbsp;CURLOPT_HTTPHEADER,&nbsp;$headers);\r\n&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;$okay&nbsp;=&nbsp;curl_exec($ch);\r\n&nbsp;&nbsp;&nbsp;&nbsp;curl_close($ch);\r\n&nbsp;&nbsp;&nbsp;&nbsp;$head&nbsp;=&nbsp;ob_get_contents();\r\n&nbsp;&nbsp;&nbsp;&nbsp;ob_end_clean();\r\n//&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;&#39;&lt;br&gt;head--&gt;&#39;.$head.&#39;&lt;----end&nbsp;&lt;br&gt;&#39;;\r\n&nbsp;&nbsp;&nbsp;&nbsp;$regex&nbsp;=&nbsp;&#39;/Content-Length:\\s([0-9].+?)\\s/&#39;;\r\n&nbsp;&nbsp;&nbsp;&nbsp;$count&nbsp;=&nbsp;preg_match($regex,&nbsp;$head,&nbsp;$matches);\r\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;isset($matches[1])&nbsp;?&nbsp;$matches[1]&nbsp;:&nbsp;&#39;unknown&#39;;\r\n}</pre><p>方法（4），file_get_contents()，虽然它的功能不强大，但也是一种方法。</p><pre class="brush:php;toolbar:false">echo&nbsp;strlen(file_get_contents($url));&nbsp;&nbsp;//抓取大文件比较吃力，建议不要使用其它</pre><p>试试吧，各位！</p>', 0, 0, 0, 0, 0, 0, 1450253223, 1450253223, 0),
(3, '', 'mysql,水平分表', '使用mysql的MRG_MyISAM(MERGE)方法实现水平分表', '<p>在MySql中数据的优化尤其是大数据量的优化是一门很大的学问，当然其它数据库也是如此，即使你不是DBA，做为一名程序员掌握一些基本的优化信\n息，也可以让你在自己的程序开发中受益匪浅。当然数据库的优化有很多的方方面面，本篇主要讲，Mysql的水平分表技术，也可以说是其技术的其中之一。<br/></p><p>在使用水平分表时，首先问下自己几个问题。<br/></p><p>第一、为什么要水平分表？</p><p>第二、什么时候需要水平分表？</p><p>第三、怎样实现水平分表？</p>_ueditor_page_break_tag_<p><br/></p><p>一、为什么要水平分表？</p><p>简而言之，当单表数据量过大时，无法对其进行有效的维护，以及查询速度严重变慢时，我们就需要对其时行水平分表</p><p><br/></p><p>二、什么时候需要水平分表？</p><p>在数据库结构的设计中，需要充分考虑后期数据的增长量和增长速度，如果后期的数据增长量过快，以及后期数据量巨大，就需要使用水平分表。</p><p><br/></p><p>三、怎样实现水平分表？</p><p>其实水平分表的方法，很多，但个人觉得结合程序的增删改查，本篇介绍的方法MRG_MySIAM存储引擎(MERGE存储引擎)个人觉得还是比较简单方便的，虽然性能方面与其它分表技术相比可能不是第一，但就使用程序对其的操控性来说，个人觉得还是很不错的。</p><p>MERGE存储引擎基本介绍和使用规范说明【以下截自MySql手册】：</p><p>MERGE存储引擎，也被认识为<span style="BACKGROUND-COLOR: #3399ff;color:#ffffff">MRG</span>_MyISAM引擎，是<span style="color: rgb(255, 0, 0);">一个相同的可以被当作一个来用的MyISAM表的集合</span>。<span style="color: rgb(255, 0, 0);">“相同”意味着所有表同样的列和索引信息</span>。你不能合并列被以不同顺序列于其中的表，没有恰好同样列的表，或有不同顺序索引的表。而且，任何或者所有的表可以用<strong>myisampack</strong>来压缩。表选项的差异，比如AVG_ROW_LENGTH, MAX_ROWS或PACK_KEYS都不重要。</p><p>当你创建一个MERGE表之时，MySQL在磁盘上创建两个文件。文件名以表的名字开始，并且有一个扩展名来指明文件类型。一个.frm文件存储表定义，一个.<span style="BACKGROUND-COLOR: #3399ff;color:#ffffff">MRG</span>文件包含被当作一个来用的表的名字。这些表作为MERGE表自身，不必要在同一个数据库中。</p><p>你可以对表的集合用SELECT, DELETE, UPDATE和INSERT。你必须对你映射到一个MERGE表的这些表有SELECT, \nUPDATE和DELETE 的权限。</p><p>如果你DROP MERGE表，你仅在移除MERGE规格。底层表没有受影响。</p><p>当你创建一个MERGE表之时，你必须指定一个UNION=(<em>list-of-tables</em>)\n子句，它说明你要把哪些表当作一个来用。如果你想要对MERGE表的插入发生在UNION列表中的第一个或最后一个表上，你可以选择地指定一个\nINSERT_METHOD选项。使用FIRST或LAST值使得插入被相应地做在第一或最后一个表上。如果你没有指定INSERT_METHOD选项，\n或你用一个NO值指定该选项。往MERGE表插入记录的试图导致错误。</p><p>大致了解了MERGE存储引擎的基本介绍后，就让我们真正开始动手吧。</p><p><br/></p><p>在分表的我们必须考虑如下问题：</p><p>1、根据什么样的规则来实现分表，即通过什么样的规则来插入不同的数据表？</p><p>2、即使分表成功，那么程序对其的处理是否简洁？</p><p><br/></p><p>下面以下实例来说明，</p><p>假设我们有个邮件服务器，需要存储很多很多用户的邮件，为了解决后期数据量具大问题，我们就需要使用水平分表技术。</p><p>以什么样的规则来实现分表，分表数据如何确定？</p><p>首先我们必须大概估算以后的数据量会多大，分多少张表比较合适，从而来确定分表规则。</p><p>以我的情况为例，</p><p>我觉得以邮件的发送时间来计算，按天来划分，分为31张表比较合适。</p><p>那么我的分表规则，则如下设计，：</p><pre class="brush:php;toolbar:false">$ruleNum&nbsp;=&nbsp;date(j,$saveTime);</pre><pre class="brush:sql;toolbar:false">CREATE&nbsp;TABLE&nbsp;`email`&nbsp;(\n&nbsp;&nbsp;`id`&nbsp;int(10)&nbsp;unsigned&nbsp;NOT&nbsp;NULL&nbsp;AUTO_INCREMENT,\n&nbsp;&nbsp;`euid`&nbsp;mediumint(8)&nbsp;unsigned&nbsp;NOT&nbsp;NULL&nbsp;DEFAULT&nbsp;&#39;0&#39;&nbsp;COMMENT&nbsp;&#39;帐号ID&#39;,\n&nbsp;&nbsp;`uid`&nbsp;char(50)&nbsp;NOT&nbsp;NULL&nbsp;COMMENT&nbsp;&#39;邮件UID&#39;,\n&nbsp;&nbsp;`reciever`&nbsp;char(255)&nbsp;NOT&nbsp;NULL&nbsp;COMMENT&nbsp;&#39;收件人&#39;,\n&nbsp;&nbsp;`sender`&nbsp;char(255)&nbsp;NOT&nbsp;NULL&nbsp;COMMENT&nbsp;&#39;发送人&#39;,\n&nbsp;&nbsp;`sendTime`&nbsp;int(10)&nbsp;unsigned&nbsp;NOT&nbsp;NULL&nbsp;DEFAULT&nbsp;&#39;0&#39;,\n&nbsp;&nbsp;`sendTitle`&nbsp;char(100)&nbsp;NOT&nbsp;NULL&nbsp;COMMENT&nbsp;&#39;主题&nbsp;&#39;,\n&nbsp;&nbsp;`type`&nbsp;char(50)&nbsp;NOT&nbsp;NULL&nbsp;COMMENT&nbsp;&#39;类型&#39;,\n&nbsp;&nbsp;PRIMARY&nbsp;KEY&nbsp;(`id`),\n)&nbsp;ENGINE=MRG_MyISAM\n&nbsp;DEFAULT&nbsp;CHARSET=utf8&nbsp;\nUNION=(`email_1`,`email_2`,`email_3`,`email_4`,`email_5`,`email_6`,`email_7`,`email_8`,`email_9`,`email_10`,`email_11`,`email_12`,`email_13`,`email_14`,`email_15`,`email_16`,`email_17`,`email_18`,`email_19`,`email_20`,`email_21`,`email_22`,`email_23`,`email_24`,`email_25`,`email_26`,`email_27`,`email_28`,`email_29`,`email_30`,`email_31`);</pre><p>首先创建一张MERGE存储类型的主表，<br/></p><p>然后再批量创建31张MyISAM存储类型的数据表。</p><p><br/></p><p>OK，此时创建完成后，我们需要做的是什么？</p><p>当然，第一步肯定是写入数据。此时我们的分表规则就有了用武之地了。</p><pre class="brush:sql;toolbar:false">$sql&nbsp;=&nbsp;&quot;INSERT&nbsp;INTO&nbsp;email_{$ruleNum}(....)&nbsp;VALUES(.....);&quot;</pre><p>此时完全可以正确的写入，并且在Email表中也会存在，是不是很OK。</p><p>但别高兴太早，我们要做的远远不止这些。</p><p>首\n先，因为ID是Auto_Increment,你完全可以不用管，因为每次插入不同的数据表都会有不同的ID,但问题是当你在EMAil这个Merge类\n型表中查看时你会发现，会有很多重复的ID，因为每张表的ID在email表中展现可能会有大量重复。这对我们修改和删除会有极大的影响，如果没有惟的\nID，默认修改是根据排序来分别的，当然不可以。</p><p>所以在数据写入时，我们必须还要手动增加ID，来保证整个数据的ID都是惟一的。</p><p>方法当然有很多种，简单介绍下我的做法，</p><p>我直接新建了一张表就一个字段：</p><p><img src="http://crcms.cn/Uploads/ueditor/52/20140818/0b3a452ca220f7fda0cdd404c8c4ffff.png" title="图片上传"/><br/></p><p>在每次新增完成数据后，都会使用触发器自动将此表中的数据值+1，而在每次读取时，先读取此表，获取下一个ID，这样就能保证数据ID永远惟一。</p><p>PS:也可以将此ID值存入文件，前提是在不会丢失的情况下。或其它都OK。</p><p><br/></p><p>写入问题解决后，就剩下UPDATE,DELETE,SELECT了，这些现在都已不是问题，我们直接操作Email这个Merge类型表即可，（Mysql手册也有详细的介绍，可自行查看）</p><p>INSERT：</p><pre class="brush:sql;toolbar:false">SELECT&nbsp;*&nbsp;FROM&nbsp;eamil&nbsp;where&nbsp;($where)&nbsp;limit&nbsp;20,10;</pre><p>UPDATE:</p><pre class="brush:php;toolbar:false">UPDATE&nbsp;email&nbsp;SET&nbsp;username=&#39;$username&#39;&nbsp;WHERE&nbsp;id=10</pre><p>DELETE：</p><pre class="brush:sql;toolbar:false">DELETE&nbsp;FROM&nbsp;email&nbsp;WHERE&nbsp;id=11</pre><p>这只是一种MySql的水平分表方法，如果数据表较少的话，也可以使用</p><p>union 联合查询来实现数据表分表联合查询。</p><p>其它方法，网上也有很多，可自行查看。</p><p><br/></p><p>希望此篇博文对大家有用，最后，分享经验，享受开源。</p><p><br/></p>', 0, 0, 0, 0, 0, 0, 1450254269, 1450254269, 0),
(4, '', '', '', '<p><strong>1、权限设定方式变更</strong></p><p>2.2使用Order Deny / Allow的方式，2.4改用Require</p><p>apache2.2：</p><pre class="brush:plain;toolbar:false;">Order&nbsp;deny,allow\r\nDeny&nbsp;from&nbsp;all</pre><p>apache2.4：</p><pre class="brush:plain;toolbar:false;">Require&nbsp;all&nbsp;denied</pre><p><br/></p>_ueditor_page_break_tag_<p>此处比较常用的有如下几种：</p><p>Require all denied</p><p>Require all granted</p><p>Require host xxx.com</p><p>Require ip 192.168.1 192.168.2</p><p>Require local</p><p>注意：若有设定在htaccess文件中的也要修改</p><p><strong>2、设定日志纪录方式变更</strong></p><p>RewriteLogLevel 指令改为 logLevel</p><p>LOGLEVEL设置第一个值是针对整个Apache的预设等级，后方可以对指定的模块修改此模块的日志记录等级</p><p>比如：</p><pre class="brush:plain;toolbar:false">LogLevel&nbsp;warn&nbsp;rewrite:&nbsp;warn</pre><p><strong>3、Namevirtualhost 被移除</strong></p><p><strong>4、需载入更多的模块</strong></p><p>开启Gzip在apache2.2中需载入<span style="line-height:1.5;">mod_deflate，apache2.4中需载入</span><span style="line-height:1.5;">mod_filter和<span style="white-space:normal;">mod_deflate</span></span></p><p>开启SSL<span style="white-space:normal;">在apache2.2中需载入</span><span style="line-height:1.5;">mod_ssl，<span style="white-space:normal;">apache2.4中需载入</span></span><span style="line-height:1.5;">mod_socache_shmcb和<span style="white-space:normal;">mod_ssl</span></span></p><p><span style="line-height:1.5;"><strong>5、在windows环境建议的设置</strong></span></p><pre class="brush:plain;toolbar:false">EnableSendfile&nbsp;Off\r\nEnableMMAP&nbsp;Off</pre><p>当Log日志出现AcceptEx failed等错误时建议设置</p><pre class="brush:plain;toolbar:false">AcceptFilter&nbsp;http&nbsp;none\r\nAcceptFilter&nbsp;https&nbsp;none</pre><p>说明：Win32DisableAcceptEx在apache2.4中被AcceptFilter None取代</p><p><strong>6、Listen设定的调整</strong></p><p><span style="line-height:1.5;"><span style="white-space:normal;"><p>以443为例，不可以只设定Listen 443</p><p>会出现以下错误：</p><p>(OS 10048)一次只能用一个通讯端地址（通讯协定/网路位址/连接) : AH00072: make_sock: could not bind to address [::]:443</p><p>(OS 10048)一次只能用一个通讯端地址（通讯协定/网路位址/连接) : AH00072: make_sock: could not bind to address 0.0.0.0:443</p><p>AH00451: no listening sockets available, shutting down</p><p>AH00015: Unable to open logs</p><p>因此需指定监听的IP，可设定多个</p><p>例如：</p></span></span></p><pre class="brush:plain;toolbar:false">Listen&nbsp;192.168.2.1:443\r\nListen&nbsp;127.0.0.1:443</pre><p><br/></p>', 0, 0, 0, 0, 0, 0, 1450255055, 1450255055, 0),
(5, '', '', '', '<p>对 WEB 应用进行 XSS 漏洞测试，不能仅仅局限于在 WEB 页面输入 XSS 攻击字段，然后提交。绕过 JavaScript 的检测，输入 XSS 脚本，通常被测试人员忽略。下图为 XSS 恶意输入绕过 JavaScript 检测的攻击路径。</p><h5 id="N10073">图 1. XSS 攻击测试路径 – 绕过 JavaScript 校验</h5><p><img style="width: 554px; height: 273px;" src="http://crcms.cn/Uploads/ueditor/175/20140516/7fb1120bb8d9353a62c3766837bcb0d8.jpg" title="crcms_PHP防止XSS攻击" border="0" height="273" hspace="0" vspace="0" width="554"/></p><h3 id="N1007D"><br/></h3>_ueditor_page_break_tag_<h3 id="N1007D">常见的 XSS 输入</h3><ul class="ibm-bullet-list list-paddingleft-2"><li><p>XSS 输入通常包含 JavaScript 脚本，如弹出恶意警告框：&lt;script&gt;alert(&quot;XSS&quot;);&lt;/script&gt;</p></li><li><p>XSS 输入也可能是 HTML 代码段，譬如：</p></li><ul style="list-style-type: square;" class="ibm-bullet-list list-paddingleft-2"><li><p>网页不停地刷新 &lt;meta http-equiv=&quot;refresh&quot; content=&quot;0;&quot;&gt;</p></li><li><p>嵌入其它网站的链接 &lt;iframe src=http://xxxx &nbsp;width=250 height=250&gt;&lt;/iframe&gt;</p></li></ul></ul><p><a title="crcms_PHP防止XSS攻击" target="_blank" href="http://ha.ckers.org/xss.html">XSS (Cross Site Scripting) Cheat Sheet</a> 维护了一份常见的 XSS 攻击脚本列表，可用来作为检测 WEB 应用是否存在 XSS 漏洞的测试用例输入。初次接触 XSS 攻击的开发人员可能会对列表提供的一些 XSS 输入不是很理解，本文第二部分将会针对不同代码上下文的 XSS 输入作进一步的解释。</p><h3 id="N1009B">测试工具</h3><p>很多工具可以在浏览器发送 Get/Post 请求前将其截取，攻击者可以修改请求中的数据，从而绕过 JavaScript 的检验将恶意数据注入服务器。以下是一些常用的截取 HTTP 请求的工具列表。</p><ul class="ibm-bullet-list list-paddingleft-2"><li><p><a title="crcms_PHP防止XSS攻击" target="_blank" href="http://www.parosproxy.org/">Paros proxy</a> (http://www.parosproxy.org)</p></li><li><p><a title="crcms_PHP防止XSS攻击" target="_blank" href="http://www.fiddlertool.com/fiddler">Fiddler</a> (http://www.fiddlertool.com/fiddler)</p></li><li><p><a title="crcms_PHP防止XSS攻击" target="_blank" href="http://www.portswigger.net/proxy/">Burp proxy</a> (http://www.portswigger.net/proxy/)</p></li><li><p><a title="crcms_PHP防止XSS攻击" target="_blank" href="http://www.bayden.com/dl/TamperIESetup.exe">TamperIE</a> (http://www.bayden.com/dl/TamperIESetup.exe)</p></li></ul><p>笔\n者曾经使用 TamperIE 对 WEB 应用进行安全性测试。TamperIE 小巧易用，能够截取 IE 浏览器发送的 Get/Post \n请求，甚至能绕过 SSL 加密。不过 TamperIE + IE7 工作不稳定。IE7 提供了对 IPV6 的支持，如果你并不计划测试你的 \nWeb 应用对 IPV6 的支持，建议还是使用 TamperIE + IE6 的组合。</p><p>如图2所示: TamperIE \n绕过客户端浏览器 JavaScript 的校验，在 POST 请求提交时将其截取，用户可以任意修改表单输入项 name 和 message \n的值，譬如将 message 的值修改为 &quot;&lt;script&gt;alert(“XSS \nhole!!”);&lt;/script&gt;&quot;，然后点击 ”Send altered data” 按钮，将修改后的恶意数据发送给 Web \n服务器。</p><h5 id="N100BF">图 2. 使用 TamperIE 截取 Post 请求</h5><p><br/></p><p class="ibm-ind-link ibm-back-to-top"><img style="width: 533px; height: 339px;" src="http://crcms.cn/Uploads/ueditor/51/20140516/453b3ae47abf6881fd05b9eb29e827e4.jpg" title="crcms_PHP防止XSS攻击" border="0" height="339" hspace="0" vspace="0" width="533"/></p><h2 id="3.在输出端对动态内容进行编码|outline">在输出端对动态内容进行编码</h2><p>对\n一个 Web \n应用而言，其动态内容可能来源于用户输入、后台数据库、硬件状态改变或是网络信息等。动态内容特别是来自用户输入的动态内容很有可能包含恶意数据，从而影\n响网页的正常显示或是执行恶意脚本。将动态内容安全地显示在浏览器端与动态内容所处的上下文背景有关，譬如动态内容处在 HTML \n正文、表单元素的属性、或是 JavaScript 代码段中。对于一个基于 PHP 语言的 Web 应用，当执行 \n&quot;echo&quot;、&quot;print&quot;、&quot;printf&quot;、&quot;&lt;?=&quot; 等语句时表示正在处理动态内容。本节将首先介绍 PHP 提供的库函数 \nhtmlspecialchars()的用法，此函数能将 5 个 HTML 特殊字符转化为可在网页显示的 HTML \n实体编码；然后将介绍一些常见背景下的 XSS 攻击输入，以及如何在输出端对动态内容进行转义、编码从而避免 XSS 攻击。</p><h3 id="N100E0">使用 PHP 的 htmlspecialchars() 显示 HTML 特殊字符</h3><p>从\n上文列举的 XSS 恶意输入可以看到，这些输入中包含了一些特殊的 HTML 字符如 \n&quot;&lt;&quot;、&quot;&gt;&quot;。当传送到客户端浏览器显示时，浏览器会解释执行这些 HTML 或JavaScript \n代码而不是直接显示这些字符串。&lt; &gt; &amp; “ \n等字符在HTML语言中有特殊含义，对于用户输入的特殊字符，如何直接显示在网页中而不是被浏览器当作特殊字符进行解析?</p><p>HTML字符实体由 &amp; 符号、实体名字或者 # 加上实体编号、分号三部分组成。以下为 HTML 中一些特殊字符的编码。有的字符实体只有实体编号，没有对应的实体名字，譬如单引号。</p><h5 id="表格1|table">表 1. 一些 HTML 特殊字符的实体编码</h5><table class="ibm-data-table" cellpadding="0" cellspacing="0"><thead><tr class="firstRow"><th style="text-align:left; vertical-align:top">显示</th><th style="text-align:left; vertical-align:top">实体名字</th><th style="text-align:left; vertical-align:top">实体编号</th></tr></thead><tbody><tr><td style="text-align:left; vertical-align:top">&lt;</td><td style="text-align:left; vertical-align:top">&amp;lt;</td><td style="text-align:left; vertical-align:top">&amp;#60;</td></tr><tr><td style="text-align:left; vertical-align:top">&gt;</td><td style="text-align:left; vertical-align:top">&amp;gt;</td><td style="text-align:left; vertical-align:top">&amp;#62;</td></tr><tr><td style="text-align:left; vertical-align:top">&amp;</td><td style="text-align:left; vertical-align:top">&amp;amp;</td><td style="text-align:left; vertical-align:top">&amp;#38;</td></tr><tr><td style="text-align:left; vertical-align:top">“</td><td style="text-align:left; vertical-align:top">&amp;quot;</td><td style="text-align:left; vertical-align:top">&amp;#34;</td></tr><tr><td style="text-align:left; vertical-align:top">‘</td><td style="text-align:left; vertical-align:top">N/A</td><td style="text-align:left; vertical-align:top">&amp;#39;</td></tr></tbody></table><p>PHP\n 提供了htmlspecialchars()函数可以将 HTML 特殊字符转化成在网页上显示的字符实体编码。这样即使用户输入了各种 HTML \n标记，在读回到浏览器时，会直接显示这些 HTML 标记，而不是解释执行。htmlspecialchars()函数可以将以下五种 HTML \n特殊字符转成字符实体编码：</p><ul class="ibm-bullet-list list-paddingleft-2"><li><p>&amp; 转成 &amp;amp;</p></li><li><p>“ 转成 &amp;quot;</p></li><li><p>&lt; 转成 &amp;lt;</p></li><li><p>&gt; 转成 &amp;gt;</p></li><li><p>‘ 转成 &amp;#39;</p></li></ul><p>当直接调用 htmlspecialchars($str)时, &amp; &quot; &lt; &gt; 被转义。</p><p>当设置 ENT_QUOTES 标记时, 即调用htmlspecialchars($str, ENT_QUOTES)时，单引号也被转义。</p><p>当设置 ENT_NOQUOTES 标记时，单引号和双引号都不会被转义。即调用 htmlspecialchars($str, ENT_NOQUOTES)时，只有&amp; &lt; &gt; 被转义。</p><h3 id="N1015B">不同背景下的动态内容的 XSS 攻击及解决方案</h3><p>XSS 攻击输入与动态内容所处的代码背景相关，譬如动态内容为表单元素属性的值、位于 HTML 正文、或是 Javascript 代码段中等等。</p><p><strong>HTML</strong><strong>标记的属性为动态内容</strong></p><p>Web 应用中，&quot;input&quot;、&quot;style&quot;、&quot;color&quot; 等 HTML 标记的属性都可能为动态内容，其中&quot;input&quot; 标记的 &quot;value&quot; 属性通常为动态内容。</p><p><em>例子1</em></p><pre class="brush:html;toolbar:false">&lt;form…&gt;&lt;INPUT&nbsp;type=text&nbsp;name=&quot;msg&quot;&nbsp;id=&quot;msg&quot;&nbsp;size=10&nbsp;maxlength=8&nbsp;\nvalue=&quot;&lt;?=&nbsp;$msg?&gt;&quot;&gt;&lt;/form&gt;</pre><p><br/></p><p><em>攻击</em><em>XSS</em><em>输入</em></p><pre class="brush:html;toolbar:false">Hello&quot;&gt;&lt;script&gt;evil_script()&lt;/script&gt;</pre><p><em>将动态内容替换</em></p><p>将 $msg 替换为恶意 XSS 输入:</p><pre class="brush:html;toolbar:false">&lt;form…&gt;&lt;INPUT&nbsp;type=text&nbsp;name=&quot;msg&quot;&nbsp;id=&quot;msg&quot;&nbsp;size=10&nbsp;maxlength=8&nbsp;\nvalue=&quot;Hello&quot;&gt;&lt;script&gt;evil_script()&lt;/script&gt;&quot;&gt;&lt;/form&gt;</pre><p><em>例子</em><em>2</em></p><pre class="brush:html;toolbar:false">&lt;form…&gt;&lt;INPUT&nbsp;type=text&nbsp;name=&quot;msg&quot;&nbsp;id=&quot;msg&quot;&nbsp;size=10&nbsp;\nmaxlength=8&nbsp;value=&lt;?=&nbsp;$msg?&gt;&gt;&lt;/form&gt;</pre><p><em>攻击 XSS 输入</em></p><pre class="brush:html;toolbar:false">Hello&nbsp;onmouseover=evil_script()</pre><p><em>将动态内容替换</em></p><p>将 $msg 替换为恶意 XSS 输入:</p><pre class="brush:html;toolbar:false">&lt;form…&gt;&lt;INPUT&nbsp;type=text&nbsp;name=&quot;msg&quot;&nbsp;id=&quot;msg&quot;&nbsp;size=10&nbsp;\nmaxlength=8&nbsp;value=Hello&nbsp;onmouseover=evil_script()&gt;&lt;/form&gt;</pre><p><em>分析</em></p><p>从例子 1 可以看到其 XSS攻击输入中包含了 HTML 特殊字符 &lt; &gt; &quot;</p><p>从例子 2 可以看到其 XSS 攻击输入中没有包含上节中提到的五种 HTML 字符， 但是 &quot;value&quot;属性值没有使用双引号包围。</p><p><em>解决方案</em></p><p>调用htmlspecialchars($str, ENT_QUOTES)将以下 5 种 HTML 特殊字符 &lt; &gt; &amp;‘ “ 转义；同时使属性值被双引号包围。譬如：</p><pre class="brush:html;toolbar:false">&lt;form…&gt;&lt;INPUT&nbsp;type=text&nbsp;name=&quot;msg&quot;&nbsp;id=&quot;msg&quot;&nbsp;size=10&nbsp;\nmaxlength=8&nbsp;value=&quot;&lt;?=&nbsp;htmlspecialchars($msg,&nbsp;ENT_QUOTES))?&gt;&quot;&gt;&lt;/form&gt;</pre><p><em>注意事项</em></p><p>将\n input 的 value \n进行转义，必须考虑显示和存储数据的一致性问题，即显示在浏览器端和存储在服务器端后台的数据可能因为转义而变得不一致。譬如存储在服务器端的后台原始数\n据包含了以上 5 种特殊字符，但是没有转义，为了防止 XSS 攻击，在浏览器端输出时对 HTML 特殊字符进行了转义：</p><p>1. 当再度将表单提交时，存储的内容将会变成转义后的值。</p><p>2. 当使用 JavaScript 操作表单元素，需要使用到表单元素的值时，必须考虑到值可能已经被转义。</p><p><strong>HTML</strong><strong>文本为动态内容</strong></p><p><em>例子</em></p><pre class="brush:html;toolbar:false">&lt;b&gt;&nbsp;欢迎：&lt;?=&nbsp;$welcome_msg?&gt;&lt;/b&gt;</pre><p><em>攻击XSS输入</em></p><pre class="brush:html;toolbar:false">&lt;script&gt;evil_script()&lt;/script&gt;</pre><p><em>将动态内容替换</em></p><p>将$welcome_msg 替换为恶意 XSS 输入:</p><pre class="brush:html;toolbar:false">&lt;b&gt;欢迎：&lt;script&gt;evil_script()&lt;/script&gt;&lt;/b&gt;</pre><p><em>分析</em></p><p>在 HTML 正文背景下，&lt; &gt; 字符会引入 HTML 标记，&amp; 可能会认为字符实体编码的开始，所以需要将 &lt; &gt; &amp; 转义</p><p><em>解决方案</em></p><p>为简洁起见，直接使用 htmlspecialchars()将 5 种 HTML 特殊字符转义，如：</p><pre class="brush:html;toolbar:false">&lt;b&gt;欢迎：&lt;?=&nbsp;htmlspecialchars($welcome_msg,,&nbsp;ENT_NOQUOTES)?&gt;&lt;/b&gt;</pre><p><strong>URL</strong><strong>的值为动态内容</strong></p><p>Script/Style/Img/ActiveX/Applet/Frameset… 等标记的 src 或 href 属性如果为动态内容，必须确保这些 URL 没有指向恶意链接。</p><p><em>例子1</em></p><pre class="brush:html;toolbar:false">&lt;script&nbsp;src=&lt;?=&nbsp;&quot;$script_url&gt;&quot;&gt;</pre><p><em>攻击XSS输入</em></p><pre class="brush:html;toolbar:false">http://evil.org/evil.js</pre><p><em>将动态内容替换</em></p><p>将$script_url替换为恶意 XSS 输入:</p><pre class="brush:js;toolbar:false">&lt;script&nbsp;src=&quot;http://evil.org/evil.js&quot;&gt;</pre><p><em>例子2</em></p><pre class="brush:html;toolbar:false">&lt;img&nbsp;src=”&lt;?=&nbsp;$img_url&gt;”&gt;</pre><p><em>攻击XSS输入</em></p><pre class="brush:js;toolbar:false">javascript:evil_script()</pre><p><em>将动态内容替换</em></p><p>将$img_url替换为恶意XSS输入:</p><pre class="brush:html;toolbar:false">&lt;img&nbsp;src=”&nbsp;javascript:evil_script()”&gt;</pre><p><em>分析</em></p><p>一般情况下尽量不要让 URL 的值被用户控制。如果用户需要自己定义自己的风格及显示效果，也不能让用户直接控制整个 URL 的内容，而是提供预定义好的风格供用户设置、装配，然后由后台程序根据用户的选择组合成安全的 URL 输出。</p><p><strong>字符集编码</strong></p><p>浏\n览器需要知道字符集编码才能正确地显示网页。如果字符集编码没有显式在 content-type 或meta \n中定义，浏览器会有算法猜测网页的字符集编码。譬\n如&lt;script&gt;alert(document.cookie)&lt;/script&gt; 的 UTF-7 编码为：</p><pre class="brush:html;toolbar:false">+ADw-script+AD4-alert(document.cookie)+ADw-/script+AD4-</pre><p>如果+ADw-script+AD4-alert(document.cookie)+ADw-/script+AD4-作为动态内容位于网页的顶端并传送到浏览器端，IE 会认为此网页是 UTF-7 编码，从而使网页不能正常显示。</p><p><em>解决方案</em></p><p>显式定义网页的字符集编码，譬如</p><pre class="brush:html;toolbar:false">&lt;meta&nbsp;http-equiv=content-type&nbsp;content=&quot;text/html;&nbsp;charset=UTF-8&quot;&gt;</pre><p><strong>动态内容为</strong><strong>Java</strong><strong>S</strong><strong>cript</strong><strong>事件处理函数的参数</strong></p><p>JavaScript 事件处理函数如 onClick/onLoad/onError/onMouseOver/ 的参数可能包含动态内容。</p><p><em>例子</em></p><pre class="brush:html;toolbar:false">&lt;input&nbsp;type=&quot;button&quot;&nbsp;value=&quot;go&nbsp;to&quot;&nbsp;onClick=&#39;goto_url(&quot;&lt;?=&nbsp;$target_url&gt;&quot;);&#39;&gt;</pre><p><em>攻击XSS输入</em></p><pre class="brush:html;toolbar:false">foo&amp;quot;);evil_script(&amp;quot;</pre><p><em>将动态内容替换</em></p><p>HTML 解析器会先于 JavaScript 解析器解析网页，将$target_url 替换为恶意 XSS 输入:</p><pre class="brush:html;toolbar:false">&lt;input&nbsp;type=&quot;button&quot;&nbsp;value=&quot;go&nbsp;to&quot;&nbsp;onClick=&#39;goto_url(&quot;foo&quot;);evil_script(&quot;&quot;);&#39;&gt;</pre><p><strong>动态内容位于 JavaScript 代码段中</strong></p><p><em>例子</em></p><pre class="brush:html;toolbar:false">&lt;SCRIPT&nbsp;language=&quot;javascript1.2&quot;&gt;\nvar&nbsp;msg=&#39;&lt;?=&nbsp;$welcome_msg?&gt;&nbsp;&#39;;\n//&nbsp;…\n&lt;/SCRIPT&gt;</pre><p><em>攻击XSS输入1</em></p><pre class="brush:html;toolbar:false">Hello&#39;;&nbsp;evil_script();&nbsp;//</pre><p><em>将动态内容替换</em></p><p>将 $welcome_msg 替换为恶意 XSS 输入:</p><pre class="brush:html;toolbar:false">&lt;SCRIPT&nbsp;language=&quot;javascript1.2&quot;&gt;\nvar&nbsp;msg=&#39;Hello&#39;;&nbsp;evil_script();&nbsp;//&#39;;\n//&nbsp;…\n&lt;/SCRIPT&gt;</pre><p><em>攻击XSS输入2</em></p><pre class="brush:html;toolbar:false">Hello&lt;/script&gt;&lt;script&gt;evil_script();&lt;/script&gt;&lt;script&gt;</pre><p><em>将动态内容替换</em></p><p>将$welcome_msg 替换为恶意 XSS 输入:</p><pre class="brush:js;toolbar:false">&lt;script&gt;&nbsp;var&nbsp;msg&nbsp;=&nbsp;&#39;Hello&lt;/script&gt;&nbsp;\n&lt;script&gt;evil_script();&lt;/script&gt;&nbsp;\n&lt;script&gt;&#39;&nbsp;//&nbsp;...&nbsp;//&nbsp;do&nbsp;something&nbsp;with&nbsp;msg_text&nbsp;&lt;/script&gt;</pre><p><em>分析</em></p><p>如上文所示，在 JavaScript 背景中使用动态内容需要非常谨慎。一般情况下，尽量避免或减少在 Javascript 的背景下使用动态内容，如果必须使用动态内容，在开发或代码审计时必须考虑这些动态内容可能的取值，是否会导致 XSS 攻击。</p><h2 id="4.建立PHP库函数校验输入|outline">建立PHP库函数校验输入</h2><p>Web\n\n 开发人员必须了解，仅仅在客户端使用 JavaScript 函数对非法输入进行检测过滤对于构建安全的 WEB \n应用是不够的。如上文所述，攻击者可以轻易地借助工具绕过 JavaScript 校验甚至 SSL \n加密输入恶意数据。在输出端对动态内容进行编码也只能起到一种双重保护的作用，更重要的应该在服务器端对输入进行校验。PHP \n提供了strpos()、strstr()、preg_match()等函数可用于检测非法字符和字符串；preg_replace() \n函数可用于替换非法字符串。<a title="" target="_blank" href="http://www.owasp.org/index.php/OWASP_PHP_Filters">OWASP PHP Filters</a> 开源项目提供了一些 PHP 库函数用于过滤非法输入可作为参考。一些常见的检测和过滤包括：</p><ol class="ibm-alpha-list list-paddingleft-2" type="a"><li><p>输入是否仅仅包含合法的字符；</p></li><li><p>输入如果为数字，数字是否在指定的范围；</p></li><li><p>输入字符串是否超过最大长度限制；</p></li><li><p>输入是否符合特殊的格式要求，譬如email 地址、IP 地址；</p></li><li><p>不同的输入框在逻辑上存在的耦合和限制的关系；</p></li><li><p>除去输入首尾的空格；</p></li></ol><p>最后</p><p>附上HTML实体：<a title="html实体" target="_blank" href="http://www.w3.org/TR/html4/sgml/entities.html">html实体</a></p><p><br/></p>', 0, 0, 0, 0, 0, 0, 1450255676, 1450255676, 0),
(6, '', '', '', '<p>工作需要，在windows上装了个memcached软件，网上最好找的版本是1.2.6，我用的是1.4的版本，自己测试过，现在也在正式使用还算不错</p><p>废话不多说，直接说安装</p><p>c:\\windows\\memcache\\memcached.exe -m 500 -d install</p><p>最常用的安装，</p><p>也是简洁，安装完成后直接&nbsp; memcached.exe -d start</p><p>就可以使用了，</p><p>很平常的一件事，为什么要说明，</p>_ueditor_page_break_tag_<p>主要说明点如下：</p><p>当-m 500就是表示 分配 500m的内存大小 ，这无可争议，但此种方法，并不适合于windows系统，</p><p>不相信的话，大家这样安装启动完成后可以使用Memcache类中的getStatus方法查看</p><p>直接打印状态则会看到有一个<span style="color: rgb(255, 0, 0);">limit_maxbytes&nbsp; </span>属\r\n性，memcache默认分配的内存是64m，在windows下如果你的内存稍大，则会稍微多一点，我的机子默认安装完成后是67m左右，此时我上面已\r\n经定义-m 500任然是不管用的，也有人没有定义单位，这根本不需要，(PS:本人也使用过-m 500mb ,-m 500m，甚至在启动时-d \r\nstart 上也重新分配 了下，结果还是一样)<br/></p><p>那如何更改memcache在windows下的内存分配呢，很简单直接改注册表</p><p><span style="color:rgb(51,51,51); font-family:Arial,Tahoma,Verdana,sans-serif; font-size:14px; line-height:25px; background-color:rgb(247,252,255)"><span style="color:rgb(51,51,51); font-family:Arial,Tahoma,Verdana,sans-serif; font-size:14px; line-height:25px; background-color:rgb(247,252,255)"><span style="color:rgb(51,51,51); font-family:Arial,Tahoma,Verdana,sans-serif; font-size:14px; line-height:25px; background-color:rgb(247,252,255)"></span></span></span>1&gt;开始&gt;运行：regedit(回车) <br/></p><p>2&gt;在注册表中找到：HKEY_LOCAL_MACHINE\\SYSTEM\\CurrentControlSet\\Services\\memcached Server <br/></p><p>3&gt;\r\n默认的ImagePath键的值是：&quot;c:\\memcached\\memcached.exe&quot; -d \r\nrunservice，改为：&quot;c:\\memcached\\memcached.exe&quot; -d runservice -m 500 -p 11200\r\n -l 192.168.1.251（确定，关闭注册表） <br/></p><p>4&gt;我的电脑（右键）&gt;管理&gt;服务 找到memcache的服务，重新启动一次即可生效。</p><p>再次PS一样：</p><p>-p 表示memcache占用的端口</p><p>-l 表示 监听的服务器IP地址，一搬不设置，</p><p>还有其它参数，可直接Google，</p><p><br/></p>', 0, 0, 0, 0, 0, 0, 1450255942, 1450255942, 0),
(7, '', '', '', '<p>昨天在一个项目中需要用到Mysql的触发器，以前在学习的时候只是简单扫了下触发器，很少写过，于是乎，抓住了这个机会，增加下印象。</p><p>首先当然是语法规则：</p><pre class="brush:sql;toolbar:false">CREATE&nbsp;TRIGGER&nbsp;trigger_name&nbsp;trigger_type&nbsp;trigger_action&nbsp;ON&nbsp;trigger_table&nbsp;FOR&nbsp;EACH&nbsp;ROW\nBEGIN&nbsp;\n--......\nEND;</pre><p>trigger_name ： 触发器名称，</p><p>trigger_type : 触发的类型&nbsp; after before<br/></p><p>trigger_action : 触发的动作&nbsp; insert update delete</p><p>trigger_table 需要在哪张表上触发</p><p><br/></p>_ueditor_page_break_tag_<p>以我的实际案例为准：</p><pre class="brush:sql;toolbar:false">CREATE&nbsp;TRIGGER&nbsp;orders_insert&nbsp;AFTER&nbsp;INSERT&nbsp;ON&nbsp;orders&nbsp;FOR&nbsp;EACH&nbsp;ROW\nBEGIN\nINSERT&nbsp;INTO&nbsp;`crcms_orders`(`wid`,`create_time`,`expire_time`,`wr_status`)&nbsp;VALUES&nbsp;(NEW.id,NEW.create_time,NEW.expire_time,1);\nEND</pre><pre class="brush:sql;toolbar:false">CREATE&nbsp;TRIGGER&nbsp;orders_insert&nbsp;AFTER&nbsp;UPDATE&nbsp;ON&nbsp;orders&nbsp;FOR&nbsp;EACH&nbsp;ROW\nBEGIN\nIF(NEW.w_status=1&nbsp;||&nbsp;NEW.w_status=7)&nbsp;THEN\nUPDATE&nbsp;`crcms_orders`&nbsp;SET&nbsp;`expire_time`=NEW.expire_time,`wr_status`=2&nbsp;WHERE&nbsp;`wid`=OLD.id;\nELSE\nUPDATE&nbsp;`crcms_orders`&nbsp;SET&nbsp;`expire_time`=NEW.expire_time,`wr_status`=1&nbsp;WHERE&nbsp;wid=OLD.id;\nEND&nbsp;IF\nEND</pre><pre class="brush:sql;toolbar:false">CREATE&nbsp;TRIGGER&nbsp;orders_insert&nbsp;AFTER&nbsp;DELETE&nbsp;ON&nbsp;orders&nbsp;FOR&nbsp;EACH&nbsp;ROW\nBEGIN\nDELETE&nbsp;FROM&nbsp;`crm_work_orders_remind`&nbsp;WHERE&nbsp;`wid`=OLD.id;\nEND</pre><p>//上述中就是触发器的基本用法，</p><p>让我欣喜的是NEW,OLD，这两个超级变量，原来在不知道的情况下，还想一条条查询，太耗性能呢</p><p>NEW 只能用在insert 的时候</p><p>OLD 只能用在delete 的时候</p><p>NEW,OLD 可同时能用在update</p><p>上述中还用于IF THEN ELSE ENDIF,顺便连IF也熟悉了下，Happy!</p><p>当然尝试中，还用到一条记录的多变量赋值</p><p>如：</p><pre class="brush:sql;toolbar:false">set&nbsp;@id=0,@num=&#39;&#39;;\nSELECT&nbsp;id,name&nbsp;INTO&nbsp;@id,@name&nbsp;FROM&nbsp;table&nbsp;WHERE&nbsp;id=1;</pre><p>这样做可以使</p><p>id,name 字段的值直接赋值到变量id,name中去，又是一个知识点。</p><p><br/></p><p>平时在Mysql中主要用的就是SQL语句，以及SQL语句的索引，优化，很少看它的其它东西，这方面确实薄弱，</p><p>但也没事，个人感觉不常用的东西，用到时，再去学习它，这样既快又长记性，何乐而不为呢，对吧？</p><p><br/></p>', 0, 0, 0, 0, 0, 0, 1450342775, 1450342775, 0),
(20, '', '', '', '<p>asfdsafdsafdas<br/></p>', 1, 0, 0, 1, 0, 0, 1453347419, 1453347419, 0),
(21, '', '', '', '<p>第一步更新系统，</p><p>Linux小菜一枚，这几天一直在折腾Ubuntu，其中，各种纠结,各种Google，基本已经搞定，记录下安装过程。以作笔记。</p><p>安装系统没什么好说的，直接使用U盘安装即可，安装完成后，对系统进行基本使用配置<br/></p><p><br/></p><p>（1）更新系统</p><p><img style="width: 710px; height: 371px;" alt="1.jpg" src="/uploads/2/e/bf81c05e3ab5c31c7b9a076d49483880c9f48645127.jpg" title="bf81c05e3ab5c31c7b9a076d49483880c9f48645127.jpg" height="371" width="710"/></p><p><br/></p><p>（2）安装 vim</p><pre class="brush:bash;toolbar:false">sudo&nbsp;apt-get&nbsp;install&nbsp;vim</pre><p><br/></p>_ueditor_page_break_tag_<p>（3）更新源</p><p>本人使用的是aliyun的源，</p><p>可在ubuntu源列表中查找&nbsp;<a title="http://wiki.ubuntu.org.cn/%E6%BA%90%E5%88%97%E8%A1%A8" target="_blank" href="http://wiki.ubuntu.org.cn/%E6%BA%90%E5%88%97%E8%A1%A8">http://wiki.ubuntu.org.cn/%E6%BA%90%E5%88%97%E8%A1%A8</a></p><pre>deb&nbsp;http://mirrors.aliyun.com/ubuntu/&nbsp;vivid&nbsp;main&nbsp;restricted&nbsp;universe&nbsp;multiverse\r\ndeb&nbsp;http://mirrors.aliyun.com/ubuntu/&nbsp;vivid-security&nbsp;main&nbsp;restricted&nbsp;universe&nbsp;multiverse\r\ndeb&nbsp;http://mirrors.aliyun.com/ubuntu/&nbsp;vivid-updates&nbsp;main&nbsp;restricted&nbsp;universe&nbsp;multiverse\r\ndeb&nbsp;http://mirrors.aliyun.com/ubuntu/&nbsp;vivid-proposed&nbsp;main&nbsp;restricted&nbsp;universe&nbsp;multiverse\r\ndeb&nbsp;http://mirrors.aliyun.com/ubuntu/&nbsp;vivid-backports&nbsp;main&nbsp;restricted&nbsp;universe&nbsp;multiverse\r\ndeb-src&nbsp;http://mirrors.aliyun.com/ubuntu/&nbsp;vivid&nbsp;main&nbsp;restricted&nbsp;universe&nbsp;multiverse\r\ndeb-src&nbsp;http://mirrors.aliyun.com/ubuntu/&nbsp;vivid-security&nbsp;main&nbsp;restricted&nbsp;universe&nbsp;multiverse\r\ndeb-src&nbsp;http://mirrors.aliyun.com/ubuntu/&nbsp;vivid-updates&nbsp;main&nbsp;restricted&nbsp;universe&nbsp;multiverse\r\ndeb-src&nbsp;http://mirrors.aliyun.com/ubuntu/&nbsp;vivid-proposed&nbsp;main&nbsp;restricted&nbsp;universe&nbsp;multiverse\r\ndeb-src&nbsp;http://mirrors.aliyun.com/ubuntu/&nbsp;vivid-backports&nbsp;main&nbsp;restricted&nbsp;universe&nbsp;multiverse</pre><p>可以使用界面更新，也可以使用命令</p><pre class="brush:bash;toolbar:false">sudo&nbsp;vim&nbsp;/etc/apt/sources.list</pre><p>在最后面添加aliyun源，再更新源</p><pre class="brush:bash;toolbar:false">sudo&nbsp;apt-get&nbsp;update</pre><p>&nbsp; <br/></p><p>（4）删除libreoffice</p><pre class="brush:bash;toolbar:false">sudo&nbsp;apt-get&nbsp;remove&nbsp;libreoffice</pre><p><br/></p><p>（5）删除Amazon链接<br/></p><pre class="brush:bash;toolbar:false">sudo&nbsp;apt-get&nbsp;remove&nbsp;unity-webapps-common</pre><p><br/></p><p>（6）安装搜狗输入法</p><p>下载地址：<a title="http://pinyin.sogou.com/linux/" target="_blank" href="http://pinyin.sogou.com/linux/">http://pinyin.sogou.com/linux/</a>下载完成后，进入下载目录，运行</p><pre class="brush:bash;toolbar:false">sudo&nbsp;dpkg&nbsp;-i&nbsp;{sougou...}</pre><p><br/></p><p>（7）安装WPS-Office，虽然不是太好用，将就着吧</p><pre class="brush:bash;toolbar:false">sudo&nbsp;apt-get&nbsp;install&nbsp;wps-office</pre><p><br/></p><p>（8）安装经典指示菜单<br/></p><pre class="brush:bash;toolbar:false">sudo&nbsp;add-apt-repository&nbsp;ppa:diesch/testing\r\nsudo&nbsp;apt-get&nbsp;update\r\nsudo&nbsp;apt-get&nbsp;install&nbsp;classicmenu-indicator</pre><p><br/></p><p>（9）安装系统指示器SysPeek<br/></p><pre class="brush:bash;toolbar:false">sudo&nbsp;add-apt-repository&nbsp;ppa:nilarimogard/webupd8sudo\r\napt-get&nbsp;update\r\nsudo&nbsp;apt-get&nbsp;install&nbsp;syspeek</pre><p><br/></p><p>（10）安装酷我音乐盒Linux版</p><p><br/></p>', 1, 1, 0, 1, 1, 0, 1453348683, 1453357221, 0);
INSERT INTO `document_datas` (`did`, `seo_title`, `keyword`, `intro`, `content`, `created_type`, `updated_type`, `deleted_type`, `created_uid`, `updated_uid`, `deleted_uid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(22, '', '', '', '<pre class="brush:js;toolbar:false">//&nbsp;$q&nbsp;是内置服务，所以可以直接使用\r\nngApp.factory(&#39;UserInfo&#39;,&nbsp;[&#39;$http&#39;,&nbsp;&#39;$q&#39;,&nbsp;function&nbsp;($http,&nbsp;$q)&nbsp;\r\n{\r\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;query&nbsp;:&nbsp;function()&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;deferred&nbsp;=&nbsp;$q.defer();&nbsp;//&nbsp;声明延后执行，表示要去监控后面的执行\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$http({method:&nbsp;&#39;GET&#39;,&nbsp;url:&nbsp;&#39;scripts/mine.json&#39;})\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.success(function(data,&nbsp;status,&nbsp;headers,&nbsp;config)&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;deferred.resolve(data);&nbsp;&nbsp;//&nbsp;声明执行成功，即http请求数据成功，可以返回数据了\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;})\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.error(function(data,&nbsp;status,&nbsp;headers,&nbsp;config)\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;deferred.reject(data);&nbsp;&nbsp;&nbsp;//&nbsp;声明执行失败，即服务器返回错误\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;});\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;deferred.promise;&nbsp;&nbsp;&nbsp;//&nbsp;返回承诺，这里并不是最终数据，而是访问最终数据的API}&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;end&nbsp;query\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;};\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;angular.module(&#39;ngApp&#39;)\r\n.controller(&#39;MainCtrl&#39;,&nbsp;[&#39;$scope&#39;,&nbsp;&#39;UserInfo&#39;,&nbsp;function&nbsp;($scope,&nbsp;UserInfo)&nbsp;{&nbsp;//&nbsp;引用我们定义的UserInfo服务\r\nvar&nbsp;promise&nbsp;=&nbsp;UserInfo.query();&nbsp;//&nbsp;同步调用，获得承诺接口\r\npromise.then(function(data)&nbsp;{&nbsp;&nbsp;//&nbsp;调用承诺API获取数据&nbsp;.resolve\r\n&nbsp;&nbsp;&nbsp;&nbsp;$scope.user&nbsp;=&nbsp;data;\r\n},&nbsp;function(data)&nbsp;{&nbsp;&nbsp;//&nbsp;处理错误&nbsp;.reject\r\n&nbsp;&nbsp;&nbsp;&nbsp;$scope.user&nbsp;=&nbsp;{error:&nbsp;&#39;用户不存在！&#39;};\r\n});\r\n}]);</pre><p>下面是我自己写的</p><pre class="brush:js;toolbar:false">app.factory(&#39;documentListFactory&#39;,[&#39;$http&#39;,&#39;$q&#39;,function($http,$q){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//申明一个延迟\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;deferred&nbsp;=&nbsp;$q.defer();\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$http.get(&#39;http://3.cs/index.php?_json=1&amp;_content=1&#39;).success(function(response){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;deferred.resolve(response);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}).error(function(response){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;deferred.reject(response);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;});\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;返回承诺，这里并不是最终数据，而是访问最终数据的API&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;deferred.promise;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;}]);\r\n&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;app.controller(&#39;listController&#39;,[&#39;$scope&#39;,&#39;$http&#39;,&#39;documentListFactory&#39;,function($scope,$http,documentListFactory){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//var&nbsp;promise&nbsp;=&nbsp;documentListFactory;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//then方法//&nbsp;调用承诺API获取数据\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;documentListFactory.then(function(data){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;alert(data.msg);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;console.log(data);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;})\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//console.log(documentListFactory.status);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;}]);</pre><p><br/></p>', 1, 0, 0, 5, 0, 0, 1456840023, 1456840023, 0),
(23, 'SEO标题', 'SEO关键字', 'SEO描述', '<p>内容内容内容内容内容<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 'SEO标题', 'SEO关键字', 'SEO描述', '<p>内容内容内容内容内容<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, '', '', '', '<p>dasfdsafdsafdsafdasfads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, '', '', '', '<p>fdsafdsafdsafdsafdsafdsasa<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, '', '', '', '<p>标题标题标题标题标题标题标题标题标题标题标题标题标题标题</p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, '', '', '', '<p>fdsafdsaf<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, '', '', '', '<p>fdsafdsafdsafdsafdsafdsafsafdsafdsa<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, '', '', '', '<p>afdsafdsafdsa<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, '', '', '', '<p>afdsafdsafdsa<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, '', '', '', '<p>afdsafdsafdsa<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, '', '', '', '<p>afdsafdsafdsa<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(37, '', '', '', '<p>afdsafdsafdsa<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38, '', '', '', '<p>afdsafdsafdsa<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39, '', '', '', '<p>afdsafdsafdsa<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, '', '', '', '<p>afdsafdsafdsa<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(41, '', '', '', '<p>afdsafdsafdsa<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, '', '', '', '<p>afdsafdsafdsa<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43, '', '', '', '<p>fdasfdsafsdafd<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44, '', '', '', '<p>dsafsdafdsafdsafdsa<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(45, '', '', '', '<p>dsafsdafdsafdsafdsa<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(48, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(49, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(51, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(52, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(53, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(54, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(55, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(56, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(57, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(58, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(59, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(60, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(61, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(62, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(63, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(64, '', '', '', '<p>fsdafdsafdsafads<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(65, '', '', '', '<p>fsdafdsafdsafads1212121212<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(66, '', '', '', '<p>atatatatata<br/></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(68, '', '', '', '<p>fdsafdasfdasfdasfdasfdsafdsafdas</p>\r\n\r\n<p><img src="http://localhost/3.1/public/index.php/image/original/L2IvMy81Mjg1ZjhhNzNiYTYzNGRlOWI1NjAzYmFjNTBjMDQ0YjQ3OTFmNDZkNjEzLmpwZw==" alt="L2IvMy81Mjg1ZjhhNzNiYTYzNGRlOWI1NjAzYmFj" /></p>\r\n\r\n<p><img src="http://localhost/3.1/public/index.php/image/original/LzUvMy83NWNhNThmNjg3ODhkZDRkZWJmMmJmOGY5MDdkOWI0MDhjY2QxMGFmMi5qcGc=" alt="LzUvMy83NWNhNThmNjg3ODhkZDRkZWJmMmJmOGY5" /></p>\r\n\r\n<p><br /></p>\r\n\r\n<p>fdafasfa</p>\r\n\r\n<p><br /></p>\r\n\r\n<p>f</p>\r\n\r\n<p>das</p>\r\n\r\n<p>fd</p>\r\n\r\n<p>as<br /></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(150) NOT NULL,
  `url` char(100) NOT NULL,
  `thumbnail` char(120) NOT NULL,
  `category_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `sort` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `audit_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `updated_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- 转存表中的数据 `documents`
--

INSERT INTO `documents` (`id`, `title`, `url`, `thumbnail`, `category_id`, `sort`, `status`, `audit_status`, `created_type`, `updated_type`, `deleted_type`, `created_uid`, `updated_uid`, `deleted_uid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'PHP获取远程文件大小的多种方法', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1450253223, 1450253223, 0),
(3, 'mysql使用MRG_MyISAM(MERGE)实现水平分表', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1450254269, 1450254269, 0),
(4, 'windows apache 从2.2到2.4配置差异', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1450255055, 1450255055, 0),
(5, 'PHP防止XSS攻击', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1450255676, 1450255676, 0),
(6, 'windows下安装memcache并重置内存占用空间', '', '', 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1450255942, 1457665616, 0),
(7, 'Mysql触发器trigger使用小记', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1450342775, 1450342775, 0),
(21, 'Ubuntu15.10下的各种折腾', '', '', 0, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1453348683, 1453357221, 0),
(22, 'angularjs $http 同步', '', '', 0, 0, 2, 0, 1, 0, 0, 5, 0, 0, 1456840022, 1456840022, 0),
(23, '标题标题标题标题', '', '/9/7/o_1afnak8621mdie9mno19uc2k97.jpg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1459998395, 1459998395, 0),
(24, '标题标题标题标题', '', '/9/7/o_1afnak8621mdie9mno19uc2k97.jpg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1459998447, 1459998447, 0),
(25, '标题标题标题标题', '', '/9/7/o_1afnak8621mdie9mno19uc2k97.jpg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1459998500, 1459998500, 0),
(26, 'afdafasfdasfdsaf', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460008320, 1460008320, 0),
(27, 'afdafasfdasfdsaf', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460008367, 1460008367, 0),
(28, 'afdafasfdasfdsaf', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460008380, 1460008380, 0),
(29, 'fdasfdsafdsa', '', '/9/7/o_1afnna8fm5t11jdp1qc21sa51nl67.jpg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460011436, 1460011436, 0),
(30, '标题标题标题标题11111111111', '', '/9/7/o_1afnndqt030f1dl713ms13mu1i6t7.jpg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460011468, 1460011468, 0),
(31, 'sdafdsfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460012738, 1460012738, 0),
(32, 'PHP 设计模式系列 —— 概述及常用设计模式大全', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460014418, 1460014418, 0),
(33, 'fdsafds', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460015263, 1460015263, 0),
(34, 'fdsafds', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460015291, 1460015291, 0),
(35, 'fdsafds', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460015374, 1460015374, 0),
(36, 'fdsafds', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460015464, 1460015464, 0),
(37, 'fdsafds', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460015506, 1460015506, 0),
(38, 'fdsafds', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460015533, 1460015533, 0),
(39, 'fdsafds', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460015588, 1460015588, 0),
(40, 'fdsafds', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460015614, 1460015614, 0),
(41, 'fdsafds', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460015658, 1460015658, 0),
(42, 'fdsafds', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460015752, 1460015752, 0),
(43, 'safdsafdsafdsadsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460080388, 1460080388, 0),
(44, 'fdsafdsaf', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460080469, 1460080469, 0),
(45, 'fdsafdsaf', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460080488, 1460080488, 0),
(46, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460080564, 1460080564, 0),
(47, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460080592, 1460080592, 0),
(48, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460080640, 1460080640, 0),
(49, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460080688, 1460080688, 0),
(50, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460080719, 1460080719, 0),
(51, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460080765, 1460080765, 0),
(52, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460080840, 1460080840, 0),
(53, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460080860, 1460080860, 0),
(54, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460080884, 1460080884, 0),
(55, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460080909, 1460080909, 0),
(56, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460081045, 1460081045, 0),
(57, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460081609, 1460081609, 0),
(58, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460081751, 1460081751, 0),
(59, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460081767, 1460081767, 0),
(60, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460082007, 1460082007, 0),
(61, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460082018, 1460082018, 0),
(62, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460082044, 1460082044, 0),
(63, 'fdasfdsa', '', '', 0, 0, 1, 0, 6, 0, 0, 5, 0, 0, 1460082082, 1460082082, 0),
(64, 'fdasfdsa', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460082327, 1460082327, 0),
(65, 'fdasfdsa212121212', '', '/f/3/o_1afqcp1id1oi61vah60u2ml1dbs7.jpg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460082441, 1460100994, 0),
(66, 'teteatetat', '', '/4/8/o_1ag26t5o51v6h1n8a1qbs120rnad7.jpg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460363244, 1460363244, 0),
(67, 'fdsafdsafdsaf', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460366090, 1460366090, 0),
(68, 'fdsafdsafdsaf', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1460366192, 1460366226, 0);

-- --------------------------------------------------------

--
-- 表的结构 `fields`
--

CREATE TABLE IF NOT EXISTS `fields` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `model_id` mediumint(8) unsigned NOT NULL,
  `name` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `alias` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `tip` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `validate_rule` text COLLATE utf8_unicode_ci NOT NULL,
  `attribute` text COLLATE utf8_unicode_ci NOT NULL,
  `setting` text COLLATE utf8_unicode_ci NOT NULL,
  `is_primary` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  `uri` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `fields`
--

INSERT INTO `fields` (`id`, `model_id`, `name`, `alias`, `tip`, `type`, `validate_rule`, `attribute`, `setting`, `is_primary`, `status`, `sort`, `created_uid`, `updated_uid`, `deleted_uid`, `created_at`, `updated_at`, `deleted_at`, `uri`) VALUES
(5, 0, 'radio_test', 'RadiTest', '', 'Radio', '"[\\"required\\",\\"integer\\"]"', '[]', '{"default_value":"6","type":"char","length":"20","radio_type":"select","option":"select id,name from models where id=? or id=?:6,7:id,name\\r\\nkey:Value\\r\\ntest:testValue"}', 2, 1, 0, 0, 0, 0, 1461290720, 1461290720, 0, ''),
(4, 0, 'title', '标题', '最大不可超过255字符', 'Text', '["required","min:5","max:255"]', '["class:form-control,a,b"]', '{"type":"char","length":"255"}', 2, 1, 0, 0, 0, 0, 1461290550, 1461315630, 0, ''),
(9, 0, 'mult', '多选框', '', 'Multiselect', '[]', '["class:form-control"]', '{"type":"","default_value":"7","mult_type":"checkbox","option":"select id,name from models where id IN(?,?,?):6,7,8:id,name","store_type":"table","store_table":"tests,fork_id:{Id},other_id:{Value}"}', 2, 1, 0, 0, 0, 0, 1461304522, 1461316209, 0, ''),
(10, 0, 'id', '主键', '', 'Hidden', '["integer","required"]', '[]', '{"type":"mediumInteger","default_value":""}', 2, 1, 0, 0, 0, 0, 1461573273, 1461573484, 0, '["manage\\/element\\/edit*","manage\\/element\\/update*"]'),
(11, 0, 'id', '主键', '', 'Hidden', '["required","integer"]', '[]', '{"type":"integer","default_value":""}', 1, 1, 0, 0, 0, 0, 1461639323, 1461639323, 0, '["manage\\/element\\/edit*","manage\\/element\\/update*"]'),
(12, 0, 'title', '标题', '', 'Text', '["required","max:255"]', '["class:form-control"]', '{"type":"char","length":"255"}', 2, 1, 0, 0, 0, 0, 1461639358, 1461639367, 0, '[]'),
(13, 0, 'sort', '排序', '排序', 'Numeric', '["integer","required"]', '["class:form-control"]', '{"type":"mediumInteger","default_value":"0"}', 2, 1, 0, 0, 0, 0, 1461639411, 1461639411, 0, '[]'),
(14, 0, 'mult', '多选框', '', 'Multiselect', '["array"]', '[]', '{"type":"","default_value":"11","mult_type":"checkbox","option":["select id,name from models where id in(?,?,?):9,10,11:id,name"],"store_type":"table","store_table":"tests,fork_id:{Id},other_id:{Value}"}', 2, 1, 0, 0, 0, 0, 1461639821, 1461639821, 0, '[]'),
(15, 0, 'radio', '单选', '', 'Radio', '["required"]', '[]', '{"type":"char","length":"10","default_value":"key","radio_type":"checkbox","option":["key:value","a:b,","v:v1"]}', 2, 1, 0, 0, 0, 0, 1461639873, 1461639873, 0, '[]'),
(16, 0, 'textarea', '内容', '', 'Textarea', '["required"]', '["class:form-control"]', '{"type":"text","length":""}', 2, 1, 0, 0, 0, 0, 1461639929, 1461639929, 0, '[]'),
(17, 0, 'id', '附加模型主键', '', 'Hidden', '["integer","required"]', '[]', '{"type":"mediumInteger","default_value":""}', 3, 1, 0, 0, 0, 0, 1461640025, 1461650284, 0, '["manage\\/element\\/edit*","manage\\/element\\/update*"]');

-- --------------------------------------------------------

--
-- 表的结构 `file_datas`
--

CREATE TABLE IF NOT EXISTS `file_datas` (
  `fid` mediumint(8) unsigned NOT NULL,
  `server_ip` bigint(20) unsigned NOT NULL DEFAULT '0',
  `domain` varchar(40) NOT NULL,
  `hash` char(40) NOT NULL,
  `extension` varchar(30) NOT NULL,
  `mime_type` varchar(70) NOT NULL,
  `save_path` varchar(255) NOT NULL,
  `created_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `updated_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `file_datas`
--

INSERT INTO `file_datas` (`fid`, `server_ip`, `domain`, `hash`, `extension`, `mime_type`, `save_path`, `created_type`, `updated_type`, `deleted_type`, `created_uid`, `updated_uid`, `deleted_uid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2130706433, '', 'bdd4ea1f022b12fa5b5c209e697a1521df39dddb', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 2130706433, '', '655114f7985bb70efeeb96efafe585bda5735714', 'zip', 'application/zip', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 2130706433, '', '0c3475229ea04b594c27afa2d0e6ba4c168fcbb3', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2130706433, '', 'fdb86b78bc0bf26d3d63d7943b52cac3327a3269', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2130706433, '', '05fdb9b69a41c5cd6ed947b91c2a7f6ac0b67c58', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 2130706433, '', 'f405690542780a99273fbdd0f3735f2a33af92b8', 'jpeg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 2130706433, '', '6c1bbb03276d90ad38aab4d41b6e729dae8ab5d3', 'jpeg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 2130706433, '', '7ed17db4609d29008065cc2867a1f33060e2f5a2', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 2130706433, '', 'd5a612bdd67abce2ea4618760fb33cba3c5857c2', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 2130706433, '', 'b0b0c71dfccc0d60b40ebdf131d2a27880dd3699', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 2130706433, '', '25e3bfc44cc1502092ebf9d14cba439be5d7a58e', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 2130706433, '', '36df23594e3e6a519c3f55bd80f058a686e16070', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 2130706433, '', 'cccafc83e24422735daa10f023a1f8dc9161b751', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 2130706433, '', 'f1962824108c6050e429eaadd25c3afd1988e5a7', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 2130706433, '', '19c427e02c7ed04315a4594059dc25743daf68de', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 2130706433, '', 'cb336af520cb5de668cf58a7731f151609bc1ee7', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 2130706433, '', '25126139a5f85114384fa8616278a8284d98848d', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 2130706433, '', '48a79414e387b800cd3b65f7c0d6fa4be215cc2b', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 2130706433, '', '2333752b17f1d7a6153747472c18971687b5408a', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 2130706433, '', '8ef34b3856a6994d1060d21790e30359b6b4f426', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 2130706433, '', 'fb2db09a90b43e395c9918c3a408a3c17091c381', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 2130706433, '', 'af78ebd45b1d59d73c5fef6524fb5f28bf5d0be9', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 2130706433, '', 'a6255d49965f2bde94f73cc6232f0a918bddb56b', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 2130706433, '', '4d30dd71020a68c1e44e2d32198ba1bd9e97c4a1', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 2130706433, '', '424fb428be924573d51787c01b3decdf063ec743', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 2130706433, '', '642e50a5bec7f258f6bbc522d3dfb7f058b7c744', 'rar', 'application/x-rar', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 2130706433, '', 'd766e4e5d9cc1dbe20d483227f564f5ad5c54664', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 2130706433, '', '7ce9f0afe36f4c4aa431ea4cddb2f869bd7cdf33', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 2130706433, '', 'f782e43848c4bf095ec4d186ab595bfe7065acd1', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 2130706433, '', '358fcc225d875deca92a14914b4d6b6912d4e627', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 2130706433, '', 'c5918215d4daabaca7962d4d207859fd08b2ac83', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 2130706433, '', '6b0644365390c4d7a8cd8950c55044eacf5fe86c', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 2130706433, '', '0e9df166564407bcc65530319b84b53353b63520', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 2130706433, '', 'a5a17ce1a610a09847f7f3cace3edce73f6fe046', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 2130706433, '', '17a5ed376eddfec3b28b307f21b4a57752fa3b5d', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 2130706433, '', '9f735ebddd630d316114dd88977c065db9c471eb', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 2130706433, '', 'e893d8a34fe0789c8f8ea0fa72122af82ce76516', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 2130706433, '', '2cdc2d33cf1d553d903ac9cb2bd103c6ab4639a9', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 2130706433, '', 'aebce8d8df261e365f13a01b349d28ff68e06c8b', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 2130706433, '', 'c3c2232c4b77a799c3be03999c410574ef965002', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 2130706433, '', '478da6a4a71491ed164414cf86eb4b04679e5423', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 2130706433, '', '10c6e55886d4c1540acbd912cbf088e6d3a4d5cf', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 2130706433, '', '566cb7e664ae0a716b9514f8a30bf694bba75676', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 2130706433, '', '7a39a146be84b399dda498cd216c05b5e93214a1', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(45, 2130706433, '', '4ead67feac3200987d82fe1877a2bc34246dfc79', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 2130706433, '', '515d713692149d1cc8a46b9c879407a38caaec00', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 2130706433, '', '8ab9b88211d916366a17ad47b662b4ddf65cdc29', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 2130706433, '', '6f80bd1357020349cd97b024a7b981a65882c1a6', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 2130706433, '', '882638c53c5f12a7d4803ecb4d735b1f6b151702', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 2130706433, '', '3631744a499fe866dbc6d9f7c4c1e83d44d0fc0b', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(51, 2130706433, '', '23942e3415bbccd1d9652e2f7f6bfaf2b13ffca9', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(52, 2130706433, '', 'edcc05d8ec0bfcdee8d6688bf1e2c6d5501fc268', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(53, 2130706433, '', 'd0cb9e3ddb16b6c2a9180f0e6091df87ed76c746', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 2130706433, '', '17bc07dff7a5ee8907c70b67f76e12a0f09be2ee', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(55, 2130706433, '', 'd051729d18f2b3a9f74db9e75e567b0c76be8d6e', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(56, 2130706433, '', 'cf7781c7807803bd247e633b03f759ea0cc2b550', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 2130706433, '', 'cbafd1adf1aea9d88a608d9bd363469ec4d73f43', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(58, 2130706433, '', 'eed24b2fed44e2b2ccb452f564b5250a5211dd2d', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(59, 2130706433, '', '050eb752d97eb26c2b6c40b9d21bc5b5e90413fd', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(60, 2130706433, '', '45236b70e78a8c388a352c07c97498706f9bdc6d', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(61, 2130706433, '', 'f626d971e144093fe0edb1490662c3438a63ab89', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(62, 2130706433, '', 'dc4bef13e91e5547a6bd063497fde3caf9388e4b', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(63, 2130706433, '', '6ca29e4a4182cc3a3c498dc82276643572cd47d4', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(64, 2130706433, '', '9c312e63a13ded075d967220aa1a658e0d2a58c2', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(65, 2130706433, '', '31572a4a982b6afb892793d04a504ee51978e83f', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(66, 2130706433, '', 'ce1ac8069fd11ebbceaae7fa0af9beacf448952a', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(67, 2130706433, '', '50774cc68c93a203ce18f8bac20ce43989e511ae', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(68, 2130706433, '', 'fc9ffcfc0f2b428da04bff84d96de58a33f2aecb', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(69, 2130706433, '', '3f3d5f4ac254cc797ad8bf542f376a8942581e85', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(70, 2130706433, '', '21fdec3fbb8f545737447bc60cef8797e4913995', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(71, 2130706433, '', 'a029550a5836b0c9ad637a2566b523db7fcaf2ff', 'jpeg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(72, 2130706433, '', '573a2054fbbd23884b0d502e355bc3c5873ca068', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(73, 2130706433, '', 'c0ab8f41201c31589fc850a304c00de078daf145', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 2130706433, '', '3a946bc51ab8db2f697f2c1461125a3d70c3e865', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(75, 2130706433, '', '94c019cf27a5c6facc3081ca67be7181ad5f4ad0', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 2130706433, '', 'e5dba60d271b5ba26f0b0c6adad490ba6a9619da', 'jpeg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 2130706433, '', '956877bed8519016e134fa25b9663bdd68df9308', 'jpeg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(78, 2130706433, '', '6b75d6b8af335d0bafc014e99dc527aadeb21157', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 2130706433, '', 'e324f20b36a20ba1b35f9d4bc3d90f077b75acfc', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(80, 2130706433, '', 'e8ffd78c5b433e1b1e855e9d385abad2d3ae2816', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 2130706433, '', '516309fbc7f8a97997b783c0e76bead36f2e96ab', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(82, 2130706433, '', '3c6ab433fa99560d9deffddbab0707a296a7a55b', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(83, 2130706433, '', '5c6334c992bf8a1bb816a3471100623c42acbc37', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 2130706433, '', 'debeaa0dccbad542192f831831a2aa3afc30ef39', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(85, 2130706433, '', 'a4765139ec1f73e74420c50214b37440fe3bbcd8', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(86, 2130706433, '', '3185cb598cc89b5285a22364c0ff92ff3c96ce09', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(87, 2130706433, '', '692a341131dda7b42df051d92e2d6eacb2a901b3', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(88, 2130706433, '', 'e854ad55e43bb65c72ff54490fd4fcd599394bc6', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 2130706433, '', '94633b62c1cb132ca5b2da2582948b82f6712d73', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(90, 2130706433, '', '99086f79c8b1187594d39bb230997c1668fc2e56', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 2130706433, '', '766b9fd6c9617766014d5678091777f95d8a9f63', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(92, 2130706433, '', 'c0297962434ddc7bfa77ae7d474ebee005f97f7a', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(93, 2130706433, '', '437e4eba09a11c57c6dee0495218dbfeb4c4e90b', 'jpg', 'image/jpeg', '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(94, 2130706433, '', '66409eff49ec49359cd6bbe840a3e7910dfd9aec', 'jpg', 'image/jpeg', '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(95, 2130706433, '', '676b0cfc263700375482c1559348d04e2d400088', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/storage/uploads/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(96, 2130706433, '', '4bd3056c9712b474a9cf0260462a0ec764ccfeac', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/storage/uploads/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(97, 2130706433, '', '3dc80a7784fbc8b27e3fcf90bba1670ac554af80', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(98, 2130706433, '', '4fbb1f470ecbc91b0ee1b41c6871ab4821a10387', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(99, 2130706433, '', '3482576c6ab2e03178e1c52acd73124c43e19b42', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(100, 2130706433, '', '48d1999facc224562d8ddf0fc84c96bd5fd2ea9b', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(101, 2130706433, '', 'fd66ff06d6fad62ba5ddbb1d17a590fb94b54e84', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.0/public/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(111, 2130706433, '', '66d7b53c855aa2dafd7e3368a2b7638c7ad3527f', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(112, 2130706433, '', '43998f373055b66d8806819e5d1cb12a0737a884', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(113, 2130706433, '', '22327c731c38eeb625fd34a21aea79f112a4620d', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(114, 2130706433, '', '6934dd8044f30d7c4e83f39ee4bdefcb238c2d83', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(115, 2130706433, '', '564ccd5330f758ef885ef5c1d7538ad7f9c70d43', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(116, 2130706433, '', '6fafbff5174b518994d429162978366ab84970ee', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(117, 2130706433, '', '22d45633b40fe58b88d4c34d214b8ce56f5256ba', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(118, 2130706433, '', '4734a2c356f13d925ec36c56b29eb6067f579225', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(119, 2130706433, '', '46d5fbacf4ddc0b40802addf455a3f3bbbc06ed6', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(120, 2130706433, '', '69ed9756a1403f7ee314c7540fe9938c7c25519e', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(121, 2130706433, '', 'b7e05ca4981602fbf0d6163dcbe810fc623ac76e', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(122, 2130706433, '', '71b9ebb2de074d9f13c82f6c80e1121475556d27', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(123, 2130706433, '', '7241ddb9ffc8f759909e325ce75740a02aee5618', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(124, 2130706433, '', '4b8602fd62e80fda8548a210975e38615e19bf4d', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(125, 2130706433, '', '8e4f4126164ed292128c964baadbab2a61e1f9f1', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(126, 2130706433, '', 'a793cc1e322ad0cf0380684c2807ea1f224de15f', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(127, 2130706433, '', '1dbe8e186b5558fc7354067d85facbd74f0792be', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(128, 2130706433, '', '95a703feaf3ee73dcc26f38d3d64ab94f35c4ae5', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(129, 2130706433, '', '867f8fd47ddbd64b9cdc4195efba3f758188a950', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(130, 2130706433, '', '37bf6b3f9b1fc4e81bf487042e38c15605907842', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(131, 2130706433, '', 'baf370a5fdc7971cabbbffc4c2d2b9b69ba92af6', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(132, 2130706433, '', '9363e78dcff8544b3b5cc7855a8db7486e87e4d8', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(133, 2130706433, '', 'f03c5dc5271423882d102ef3d7169c073af082e1', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(134, 2130706433, '', '1b00a6c5f432450951d96ab9d4d7cb37c14909fd', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(135, 2130706433, '', '1e367a95157a6f86b1d5e2703048c053e959225e', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(136, 2130706433, '', '92f87ab880722c1a09263affcfc23df1f02d29d1', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(137, 2130706433, '', '98d6380df0e20e2cea0fe96dc63aa0684a430fb5', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(138, 2130706433, '', 'c7acf96b362255589b542c08c87ff1bf59802a1f', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(139, 2130706433, '', '75c16b2ff9fea582fec668e209e4fca4735429fe', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(140, 2130706433, '', '3f3487514c9287fdab64900d568dafb4a7b0876d', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(141, 2130706433, '', '2e1cb71a6eba02f8051bb8da26fbaa252fd75d23', 'jpg', 'image/jpeg', 'E:/phpstudy/WWW/3.1/storage/app/uploads', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `old_name` char(100) NOT NULL,
  `new_name` char(50) NOT NULL,
  `hash` char(40) NOT NULL,
  `full_path` char(255) NOT NULL,
  `full_root` char(255) NOT NULL,
  `mark` char(30) NOT NULL,
  `port` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `filesize` bigint(20) unsigned NOT NULL DEFAULT '0',
  `client_ip` bigint(20) unsigned NOT NULL DEFAULT '0',
  `scheme` char(15) NOT NULL,
  `domain` char(40) NOT NULL,
  `full_domain` char(255) NOT NULL,
  `upload_time` char(20) NOT NULL DEFAULT '0',
  `created_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `updated_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  `uri` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `files_mark_index` (`mark`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=142 ;

--
-- 转存表中的数据 `files`
--

INSERT INTO `files` (`id`, `old_name`, `new_name`, `hash`, `full_path`, `full_root`, `mark`, `port`, `filesize`, `client_ip`, `scheme`, `domain`, `full_domain`, `upload_time`, `created_type`, `updated_type`, `deleted_type`, `created_uid`, `updated_uid`, `deleted_uid`, `created_at`, `updated_at`, `deleted_at`, `uri`) VALUES
(106, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1afl7d4321i5d1ph21a1elvd15hl10.jpg', '2f0e371c8ef6c77619870c9a4a73bb721c63887c', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1afl7d4321i5d1ph21a1elvd15hl10.jpg', '/f/3/o_1afl7d4321i5d1ph21a1elvd15hl10.jpg', '', 80, 0, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459927553.5007', 0, 0, 0, 0, 0, 0, 1459927553, 1459927553, 0, ''),
(107, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1afl7g7j6ma21pf2ec91shcq6c1a.jpg', 'e51535f13b2c5279031f1626e50013086c0e2a8e', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1afl7g7j6ma21pf2ec91shcq6c1a.jpg', '/f/3/o_1afl7g7j6ma21pf2ec91shcq6c1a.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459927654.7372', 0, 0, 0, 0, 0, 0, 1459927654, 1459927654, 0, ''),
(108, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1afl7iuc013v5qll1lcd162jmg1f.jpg', 'eebaddc0ef788c1f3ed9ce3eeca8bcfb39da8ea4', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1afl7iuc013v5qll1lcd162jmg1f.jpg', '/f/3/o_1afl7iuc013v5qll1lcd162jmg1f.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459927743.7707', 0, 0, 0, 0, 0, 0, 1459927743, 1459927743, 0, ''),
(109, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1afl7jri5qo234a1t191u6g1ngd1k.jpg', 'a1ca8356715279250fe3d95697a33acfef466ff3', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1afl7jri5qo234a1t191u6g1ngd1k.jpg', '/f/3/o_1afl7jri5qo234a1t191u6g1ngd1k.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459927773.6463', 0, 0, 0, 0, 0, 0, 1459927773, 1459927773, 0, ''),
(110, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1afl7kka625k72u10khvs817511p.jpg', '1dd3867817f5aa94c4f5cff45fbf768c284cc36f', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1afl7kka625k72u10khvs817511p.jpg', '/f/3/o_1afl7kka625k72u10khvs817511p.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459927798.8778', 0, 0, 0, 0, 0, 0, 1459927798, 1459927798, 0, ''),
(111, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1afl7l8br1lsg1uc0o5e149k1fp51u.jpg', '66d7b53c855aa2dafd7e3368a2b7638c7ad3527f', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1afl7l8br1lsg1uc0o5e149k1fp51u.jpg', '/f/3/o_1afl7l8br1lsg1uc0o5e149k1fp51u.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459927819.6785', 0, 0, 0, 0, 0, 0, 1459927819, 1459927819, 0, ''),
(112, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1afl7on3ngkgo1apnp11o16487.jpg', '43998f373055b66d8806819e5d1cb12a0737a884', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1afl7on3ngkgo1apnp11o16487.jpg', '/f/3/o_1afl7on3ngkgo1apnp11o16487.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459927932.8432', 0, 0, 0, 0, 0, 0, 1459927932, 1459927932, 0, ''),
(113, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1afl7r5f71jsee70r1qebsoq97.jpg', '22327c731c38eeb625fd34a21aea79f112a4620d', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1afl7r5f71jsee70r1qebsoq97.jpg', '/f/3/o_1afl7r5f71jsee70r1qebsoq97.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459928013.2753', 0, 0, 0, 0, 0, 0, 1459928013, 1459928013, 0, ''),
(114, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1afl7s0621lgpibc17jueaj5u2c.jpg', '6934dd8044f30d7c4e83f39ee4bdefcb238c2d83', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1afl7s0621lgpibc17jueaj5u2c.jpg', '/f/3/o_1afl7s0621lgpibc17jueaj5u2c.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459928040.687', 0, 0, 0, 0, 0, 0, 1459928040, 1459928040, 0, ''),
(115, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1afl81pgr1a7i1ru01okl1mvs1cim7.jpg', '564ccd5330f758ef885ef5c1d7538ad7f9c70d43', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1afl81pgr1a7i1ru01okl1mvs1cim7.jpg', '/f/3/o_1afl81pgr1a7i1ru01okl1mvs1cim7.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459928230.1649', 0, 0, 0, 0, 0, 0, 1459928230, 1459928230, 0, ''),
(116, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1afl856so1doi1gup1b4m1s7rtrp7.jpg', '6fafbff5174b518994d429162978366ab84970ee', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1afl856so1doi1gup1b4m1s7rtrp7.jpg', '/f/3/o_1afl856so1doi1gup1b4m1s7rtrp7.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459928342.5277', 0, 0, 0, 0, 0, 0, 1459928342, 1459928342, 0, ''),
(117, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1aflbq0onapp13no1lj2lb2pf17.jpg', '22d45633b40fe58b88d4c34d214b8ce56f5256ba', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1aflbq0onapp13no1lj2lb2pf17.jpg', '/f/3/o_1aflbq0onapp13no1lj2lb2pf17.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459932171.7659', 0, 0, 0, 0, 0, 0, 1459932171, 1459932171, 0, ''),
(118, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1aflc214nqu310n317uasikr5s9.jpg', '4734a2c356f13d925ec36c56b29eb6067f579225', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1aflc214nqu310n317uasikr5s9.jpg', '/f/3/o_1aflc214nqu310n317uasikr5s9.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459932433.2125', 0, 0, 0, 0, 0, 0, 1459932433, 1459932433, 0, ''),
(119, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1aflcnmc96sb18fp1gs15uh1b7.jpg', '46d5fbacf4ddc0b40802addf455a3f3bbbc06ed6', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1aflcnmc96sb18fp1gs15uh1b7.jpg', '/f/3/o_1aflcnmc96sb18fp1gs15uh1b7.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459933142.283', 0, 0, 0, 0, 0, 0, 1459933142, 1459933142, 0, ''),
(120, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1aflcp9pe17dk1hhu3r5lqv11m37.jpg', '69ed9756a1403f7ee314c7540fe9938c7c25519e', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1aflcp9pe17dk1hhu3r5lqv11m37.jpg', '/f/3/o_1aflcp9pe17dk1hhu3r5lqv11m37.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459933195.3468', 0, 0, 0, 0, 0, 0, 1459933195, 1459933195, 0, ''),
(121, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1aflcqoo247qta7161qu0r1kb07.jpg', 'b7e05ca4981602fbf0d6163dcbe810fc623ac76e', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1aflcqoo247qta7161qu0r1kb07.jpg', '/f/3/o_1aflcqoo247qta7161qu0r1kb07.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459933243.0202', 0, 0, 0, 0, 0, 0, 1459933243, 1459933243, 0, ''),
(122, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1aflctedl18lg1rdkgea1gsj1auh9.jpg', '71b9ebb2de074d9f13c82f6c80e1121475556d27', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1aflctedl18lg1rdkgea1gsj1auh9.jpg', '/f/3/o_1aflctedl18lg1rdkgea1gsj1auh9.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459933331.0082', 0, 0, 0, 0, 0, 0, 1459933331, 1459933331, 0, ''),
(123, 'bg.jpg', 'o_1aflcug1e5o61eds7un3rmgmu7.jpg', '7241ddb9ffc8f759909e325ce75740a02aee5618', 'E:/phpstudy/WWW/3.1/storage/app/uploads/9/7/o_1aflcug1e5o61eds7un3rmgmu7.jpg', '/9/7/o_1aflcug1e5o61eds7un3rmgmu7.jpg', '', 80, 281248, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459933365.5215', 0, 0, 0, 0, 0, 0, 1459933365, 1459933365, 0, ''),
(124, 'bg.jpg', 'o_1aflcuups11a64oc107k116h1kc57.jpg', '4b8602fd62e80fda8548a210975e38615e19bf4d', 'E:/phpstudy/WWW/3.1/storage/app/uploads/9/7/o_1aflcuups11a64oc107k116h1kc57.jpg', '/9/7/o_1aflcuups11a64oc107k116h1kc57.jpg', '', 80, 281248, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459933380.438', 0, 0, 0, 0, 0, 0, 1459933380, 1459933380, 0, ''),
(125, 'bg.jpg', 'o_1afnak8621mdie9mno19uc2k97.jpg', '8e4f4126164ed292128c964baadbab2a61e1f9f1', 'E:/phpstudy/WWW/3.1/storage/app/uploads/9/7/o_1afnak8621mdie9mno19uc2k97.jpg', '/9/7/o_1afnak8621mdie9mno19uc2k97.jpg', '', 80, 281248, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1459998040.9965', 0, 0, 0, 0, 0, 0, 1459998041, 1459998041, 0, ''),
(126, 'bg.jpg', 'o_1afnna8fm5t11jdp1qc21sa51nl67.jpg', 'a793cc1e322ad0cf0380684c2807ea1f224de15f', 'E:/phpstudy/WWW/3.1/storage/app/uploads/9/7/o_1afnna8fm5t11jdp1qc21sa51nl67.jpg', '/9/7/o_1afnna8fm5t11jdp1qc21sa51nl67.jpg', '', 80, 281248, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1460011345.8213', 0, 0, 0, 0, 0, 0, 1460011345, 1460011345, 0, ''),
(127, 'bg.jpg', 'o_1afnndqt030f1dl713ms13mu1i6t7.jpg', '1dbe8e186b5558fc7354067d85facbd74f0792be', 'E:/phpstudy/WWW/3.1/storage/app/uploads/9/7/o_1afnndqt030f1dl713ms13mu1i6t7.jpg', '/9/7/o_1afnndqt030f1dl713ms13mu1i6t7.jpg', '', 80, 281248, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1460011462.6153', 0, 0, 0, 0, 0, 0, 1460011462, 1460011462, 0, ''),
(128, 'bg.jpg', 'o_1afnsvsfb14n67b1goukmkuas7.jpg', '95a703feaf3ee73dcc26f38d3d64ab94f35c4ae5', 'E:/phpstudy/WWW/3.1/storage/app/uploads/9/7/o_1afnsvsfb14n67b1goukmkuas7.jpg', '/9/7/o_1afnsvsfb14n67b1goukmkuas7.jpg', '', 80, 281248, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1460017297.2117', 0, 0, 0, 0, 0, 0, 1460017297, 1460017297, 0, ''),
(129, 'bg.jpg', 'o_1afpp3b47f82436ola10cqfuv7.jpg', '867f8fd47ddbd64b9cdc4195efba3f758188a950', 'E:/phpstudy/WWW/3.1/storage/app/uploads/9/7/o_1afpp3b47f82436ola10cqfuv7.jpg', '/9/7/o_1afpp3b47f82436ola10cqfuv7.jpg', '', 80, 281248, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1460080325.064', 0, 0, 0, 0, 0, 0, 1460080325, 1460080325, 0, ''),
(130, 'a8014c086e061d956560a8877cf40ad162d9ca6f.jpg', 'o_1afpp4t6aq70gj9o21m5s16e98.jpg', '37bf6b3f9b1fc4e81bf487042e38c15605907842', 'E:/phpstudy/WWW/3.1/storage/app/uploads/9/2/o_1afpp4t6aq70gj9o21m5s16e98.jpg', '/9/2/o_1afpp4t6aq70gj9o21m5s16e98.jpg', '', 80, 8330, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1460080375.9429', 0, 0, 0, 0, 0, 0, 1460080375, 1460080375, 0, ''),
(131, 'u=1007347968,2948825197&fm=23&gp=0.jpg', 'o_1afpp4t6b19cj1h249c9i01o2e9.jpg', 'baf370a5fdc7971cabbbffc4c2d2b9b69ba92af6', 'E:/phpstudy/WWW/3.1/storage/app/uploads/a/0/o_1afpp4t6b19cj1h249c9i01o2e9.jpg', '/a/0/o_1afpp4t6b19cj1h249c9i01o2e9.jpg', '', 80, 9104, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1460080376.1557', 0, 0, 0, 0, 0, 0, 1460080376, 1460080376, 0, ''),
(132, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1afpp7gqg1km11akn19m01bpmt649.jpg', '9363e78dcff8544b3b5cc7855a8db7486e87e4d8', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1afpp7gqg1km11akn19m01bpmt649.jpg', '/f/3/o_1afpp7gqg1km11akn19m01bpmt649.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1460080461.5765', 0, 0, 0, 0, 0, 0, 1460080461, 1460080461, 0, ''),
(133, 'a8014c086e061d956560a8877cf40ad162d9ca6f.jpg', 'o_1afpp7gqg17dfmj112eemhc1sjpa.jpg', 'f03c5dc5271423882d102ef3d7169c073af082e1', 'E:/phpstudy/WWW/3.1/storage/app/uploads/9/2/o_1afpp7gqg17dfmj112eemhc1sjpa.jpg', '/9/2/o_1afpp7gqg17dfmj112eemhc1sjpa.jpg', '', 80, 8330, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1460080461.7786', 0, 0, 0, 0, 0, 0, 1460080461, 1460080461, 0, ''),
(134, 'u=1007347968,2948825197&fm=23&gp=0.jpg', 'o_1afpp7gqgdo5l5te4s1oh71qb3b.jpg', '1b00a6c5f432450951d96ab9d4d7cb37c14909fd', 'E:/phpstudy/WWW/3.1/storage/app/uploads/a/0/o_1afpp7gqgdo5l5te4s1oh71qb3b.jpg', '/a/0/o_1afpp7gqgdo5l5te4s1oh71qb3b.jpg', '', 80, 9104, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1460080461.9772', 0, 0, 0, 0, 0, 0, 1460080461, 1460080461, 0, ''),
(135, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1afppa54e1pkk40pb0listijt9.jpg', '1e367a95157a6f86b1d5e2703048c053e959225e', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1afppa54e1pkk40pb0listijt9.jpg', '/f/3/o_1afppa54e1pkk40pb0listijt9.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1460080547.765', 0, 0, 0, 0, 0, 0, 1460080547, 1460080547, 0, ''),
(136, 'a8014c086e061d956560a8877cf40ad162d9ca6f.jpg', 'o_1afppa54e14s41ru012c01b6h1qq3a.jpg', '92f87ab880722c1a09263affcfc23df1f02d29d1', 'E:/phpstudy/WWW/3.1/storage/app/uploads/9/2/o_1afppa54e14s41ru012c01b6h1qq3a.jpg', '/9/2/o_1afppa54e14s41ru012c01b6h1qq3a.jpg', '', 80, 8330, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1460080547.9742', 0, 0, 0, 0, 0, 0, 1460080547, 1460080547, 0, ''),
(137, 'u=1007347968,2948825197&fm=23&gp=0.jpg', 'o_1afppa54e180s1b7pikm1dr76j0b.jpg', '98d6380df0e20e2cea0fe96dc63aa0684a430fb5', 'E:/phpstudy/WWW/3.1/storage/app/uploads/a/0/o_1afppa54e180s1b7pikm1dr76j0b.jpg', '/a/0/o_1afppa54e180s1b7pikm1dr76j0b.jpg', '', 80, 9104, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1460080548.1727', 0, 0, 0, 0, 0, 0, 1460080548, 1460080548, 0, ''),
(138, 'u=1007347968,2948825197&fm=23&gp=0.jpg', 'o_1afqc9cgg1vkk1t0t1gtvu7qfk17.jpg', 'c7acf96b362255589b542c08c87ff1bf59802a1f', 'E:/phpstudy/WWW/3.1/storage/app/uploads/a/0/o_1afqc9cgg1vkk1t0t1gtvu7qfk17.jpg', '/a/0/o_1afqc9cgg1vkk1t0t1gtvu7qfk17.jpg', '', 80, 9104, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1460100445.3058', 0, 0, 0, 0, 0, 0, 1460100445, 1460100445, 0, ''),
(139, '024b09e644a5ae3930e6922eb3e3599c.jpg', 'o_1afqcp1id1oi61vah60u2ml1dbs7.jpg', '75c16b2ff9fea582fec668e209e4fca4735429fe', 'E:/phpstudy/WWW/3.1/storage/app/uploads/f/3/o_1afqcp1id1oi61vah60u2ml1dbs7.jpg', '/f/3/o_1afqcp1id1oi61vah60u2ml1dbs7.jpg', '', 80, 79670, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1460100958.7247', 0, 0, 0, 0, 0, 0, 1460100958, 1460100958, 0, ''),
(140, 'u=1007347968,2948825197&fm=23&gp=0.jpg', 'o_1afqcpptctsm1chqcnqfo03ic7.jpg', '3f3487514c9287fdab64900d568dafb4a7b0876d', 'E:/phpstudy/WWW/3.1/storage/app/uploads/a/0/o_1afqcpptctsm1chqcnqfo03ic7.jpg', '/a/0/o_1afqcpptctsm1chqcnqfo03ic7.jpg', '', 80, 9104, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1460100983.5283', 0, 0, 0, 0, 0, 0, 1460100983, 1460100983, 0, ''),
(141, 'wKgKxlZrnN6AMrGyAALt36K7LNQ954.jpg', 'o_1ag26t5o51v6h1n8a1qbs120rnad7.jpg', '2e1cb71a6eba02f8051bb8da26fbaa252fd75d23', 'E:/phpstudy/WWW/3.1/storage/app/uploads/4/8/o_1ag26t5o51v6h1n8a1qbs120rnad7.jpg', '/4/8/o_1ag26t5o51v6h1n8a1qbs120rnad7.jpg', '', 80, 191967, 0, 'http', 'http://localhost/3.1/public', 'http://localhost/3.1/public/index.php/upload/upload', '1460363238.8815', 0, 0, 0, 0, 0, 0, 1460363238, 1460363238, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `remark` char(255) NOT NULL,
  `outside_type` char(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `outside_type` char(60) NOT NULL,
  `outside_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `path` char(255) NOT NULL,
  `alt` char(255) NOT NULL,
  `hash` char(40) NOT NULL,
  `created_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `updated_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- 转存表中的数据 `images`
--

INSERT INTO `images` (`id`, `outside_type`, `outside_id`, `path`, `alt`, `hash`, `created_type`, `updated_type`, `deleted_type`, `created_at`, `updated_at`, `deleted_at`, `created_uid`, `updated_uid`, `deleted_uid`) VALUES
(38, 'Simon\\Document\\Models\\Document', 61, '/f/3/o_1afppa54e1pkk40pb0listijt9.jpg', '', '', 0, 0, 0, 1460082018, 1460082018, 0, 0, 0, 0),
(39, 'Simon\\Document\\Models\\Document', 61, '/9/2/o_1afppa54e14s41ru012c01b6h1qq3a.jpg', '', '', 0, 0, 0, 1460082018, 1460082018, 0, 0, 0, 0),
(40, 'Simon\\Document\\Models\\Document', 61, '/a/0/o_1afppa54e180s1b7pikm1dr76j0b.jpg', '', '', 0, 0, 0, 1460082018, 1460082018, 0, 0, 0, 0),
(41, 'Simon\\Document\\Models\\Document', 62, '/f/3/o_1afppa54e1pkk40pb0listijt9.jpg', '', '', 4, 0, 0, 1460082044, 1460082044, 0, 3, 0, 0),
(42, 'Simon\\Document\\Models\\Document', 62, '/9/2/o_1afppa54e14s41ru012c01b6h1qq3a.jpg', '', '', 4, 0, 0, 1460082044, 1460082044, 0, 3, 0, 0),
(43, 'Simon\\Document\\Models\\Document', 62, '/a/0/o_1afppa54e180s1b7pikm1dr76j0b.jpg', '', '', 4, 0, 0, 1460082044, 1460082044, 0, 3, 0, 0),
(44, 'Simon\\Document\\Models\\Document', 63, '/f/3/o_1afppa54e1pkk40pb0listijt9.jpg', '', '', 0, 0, 0, 1460082082, 1460082082, 0, 0, 0, 0),
(45, 'Simon\\Document\\Models\\Document', 63, '/9/2/o_1afppa54e14s41ru012c01b6h1qq3a.jpg', '', '', 0, 0, 0, 1460082082, 1460082082, 0, 0, 0, 0),
(46, 'Simon\\Document\\Models\\Document', 63, '/a/0/o_1afppa54e180s1b7pikm1dr76j0b.jpg', '', '', 0, 0, 0, 1460082082, 1460082082, 0, 0, 0, 0),
(47, 'Simon\\Document\\Models\\Document', 64, '/f/3/o_1afppa54e1pkk40pb0listijt9.jpg', '', '', 0, 0, 0, 1460082327, 1460082327, 0, 0, 0, 0),
(48, 'Simon\\Document\\Models\\Document', 64, '/9/2/o_1afppa54e14s41ru012c01b6h1qq3a.jpg', '', '', 0, 0, 0, 1460082327, 1460082327, 0, 0, 0, 0),
(49, 'Simon\\Document\\Models\\Document', 64, '/a/0/o_1afppa54e180s1b7pikm1dr76j0b.jpg', '', '', 0, 0, 0, 1460082327, 1460082327, 0, 0, 0, 0),
(69, 'Simon\\Document\\Models\\Document', 65, '/a/0/o_1afqcpptctsm1chqcnqfo03ic7.jpg', '', '', 0, 0, 0, 1460100994, 1460100994, 0, 0, 0, 0),
(68, 'Simon\\Document\\Models\\Document', 65, '/f/3/o_1afppa54e1pkk40pb0listijt9.jpg', '', '', 0, 0, 0, 1460100994, 1460100994, 0, 0, 0, 0),
(67, 'Simon\\Document\\Models\\Document', 65, '/9/2/o_1afppa54e14s41ru012c01b6h1qq3a.jpg', '', '', 0, 0, 0, 1460100994, 1460100994, 0, 0, 0, 0),
(66, 'Simon\\Document\\Models\\Document', 65, '/a/0/o_1afppa54e180s1b7pikm1dr76j0b.jpg', '', '', 0, 0, 0, 1460100994, 1460100994, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_reserved_at_index` (`queue`,`reserved`,`reserved_at`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `login_errors`
--

CREATE TABLE IF NOT EXISTS `login_errors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(40) NOT NULL,
  `password` char(40) NOT NULL,
  `ip` bigint(20) unsigned NOT NULL DEFAULT '0',
  `remark` char(255) NOT NULL,
  `created_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `updated_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `login_logs`
--

CREATE TABLE IF NOT EXISTS `login_logs` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `userid` mediumint(8) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `url` varchar(255) NOT NULL,
  `client_ip` bigint(20) unsigned NOT NULL DEFAULT '0',
  `remark` char(255) NOT NULL,
  `login_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `updated_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `users` (`created_uid`,`created_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `m_table3`
--

CREATE TABLE IF NOT EXISTS `m_table3` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` mediumint(8) unsigned NOT NULL,
  `model_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `m_table3`
--

INSERT INTO `m_table3` (`id`, `title`, `sort`, `model_id`, `created_uid`, `updated_uid`, `deleted_uid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, '标题标题标题', 0, 0, 0, 0, 0, 0, 0, 0),
(7, '标题标题标题', 0, 0, 0, 0, 0, 0, 0, 0),
(8, '标题标题标题', 0, 0, 0, 0, 0, 0, 0, 0),
(9, '标题标题标题', 0, 0, 0, 0, 0, 0, 0, 0),
(10, '标题标题标题', 0, 0, 0, 0, 0, 0, 0, 0),
(11, '标题标题标题', 0, 0, 0, 0, 0, 0, 0, 0),
(12, '标题标题标题', 0, 0, 0, 0, 0, 0, 0, 0),
(13, '标题标题标题', 0, 0, 0, 0, 0, 0, 0, 0),
(14, '标题标题标题', 0, 0, 0, 0, 0, 0, 0, 0),
(15, '标题标题标题', 0, 0, 0, 0, 0, 0, 0, 0),
(16, '标题标题标题', 0, 0, 0, 0, 0, 0, 0, 0),
(17, '标题标题标题', 0, 0, 0, 0, 0, 0, 0, 0),
(18, '标题标题标题', 0, 0, 0, 0, 0, 0, 0, 0),
(19, '标题标题标题', 0, 0, 0, 0, 0, 0, 0, 0),
(20, '标题标题标题', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `mails`
--

CREATE TABLE IF NOT EXISTS `mails` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `template` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `updated_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_03_30_235342_create_file_table', 1),
('2015_03_31_000221_create_file_datas_table', 1),
('2015_10_15_020818_create_tags_table', 1),
('2015_10_15_021734_create_tag_contents_table', 1),
('2015_10_15_023738_create_tag_types_table', 1),
('2015_10_15_030330_create_tag_tag_types_table', 1),
('2015_10_19_064808_create_tag_outside_table', 1),
('2015_11_30_013216_create_document_table', 1),
('2015_11_30_013223_create_document_data_table', 1),
('2015_11_30_021138_create_category_table', 1),
('2015_12_15_024001_create_category_document_table', 1),
('2015_12_18_075316_create_admin_table', 1),
('2016_01_06_084635_create_login_errors_table', 1),
('2015_03_11_015536_create_action_logs_table', 2),
('2015_10_13_061719_create_login_logs_table', 2),
('2016_02_29_063728_create_images_table', 3),
('2016_03_04_131321_create_count_table', 4),
('2016_03_04_131830_create_count_detail_table', 4),
('2016_03_08_220707_create_jobs_table', 4),
('2016_03_13_210349_create_permission_rule_table', 4),
('2016_03_13_210408_create_permission_group_table', 4),
('2016_03_13_215129_create_group__table', 4),
('2016_03_13_215148_create_user_group_table', 4),
('2015_10_13_061719_create_auth_logs_table', 7),
('2015_10_22_065839_create_mails_table', 6),
('2015_03_10_032157_create_models_table', 8),
('2016_04_20_073028_create_model_relations_table', 9),
('2015_05_28_030749_create_fields_table', 10),
('2016_04_21_082338_create_model_field_table', 10);

-- --------------------------------------------------------

--
-- 表的结构 `model_fields`
--

CREATE TABLE IF NOT EXISTS `model_fields` (
  `model_id` int(10) unsigned NOT NULL DEFAULT '0',
  `field_id` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `model_fields`
--

INSERT INTO `model_fields` (`model_id`, `field_id`) VALUES
(7, 3),
(6, 3),
(6, 4),
(7, 4),
(7, 5),
(6, 5),
(7, 6),
(6, 6),
(7, 7),
(6, 7),
(7, 8),
(6, 8),
(6, 9),
(7, 9),
(6, 10),
(7, 10),
(11, 17),
(12, 17),
(10, 11),
(10, 12),
(10, 13),
(11, 14),
(11, 15),
(12, 16);

-- --------------------------------------------------------

--
-- 表的结构 `model_relations`
--

CREATE TABLE IF NOT EXISTS `model_relations` (
  `model_id` int(10) unsigned NOT NULL DEFAULT '0',
  `extend_id` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `model_relations`
--

INSERT INTO `model_relations` (`model_id`, `extend_id`) VALUES
(4, 1),
(4, 3),
(8, 6),
(5, 1),
(9, 7),
(11, 10),
(12, 10);

-- --------------------------------------------------------

--
-- 表的结构 `models`
--

CREATE TABLE IF NOT EXISTS `models` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `mark` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `table_name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `model_path` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `field_path` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `engine` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `remark` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_created` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `models`
--

INSERT INTO `models` (`id`, `mark`, `table_name`, `name`, `model_path`, `field_path`, `engine`, `remark`, `is_created`, `status`, `type`, `created_uid`, `updated_uid`, `deleted_uid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'm_model3', 'm_table3', '主模型3', '', '', 'InnoDB', '', 0, 1, 1, 0, 0, 0, 1461639186, 1461639186, 0),
(9, 'f_model2', 'f_table2', '附加模型2', '', '', 'InnoDB', '', 0, 1, 2, 0, 0, 0, 1461226921, 1461226921, 0),
(8, 'f_model1', 'f_table1', '附加模型1', '', '', 'InnoDB', '', 0, 1, 2, 0, 0, 0, 1461226894, 1461226894, 0),
(7, 'm_model2', 'm_table2', '主模型2', '', '', 'InnoDB', '', 0, 1, 1, 0, 0, 0, 1461226734, 1461226734, 0),
(6, 'm_model1', 'm_table1', '主模型1', '', '', 'InnoDB', '', 0, 1, 1, 0, 0, 0, 1461226708, 1461226708, 0),
(11, 'a_model4', 'a_table4', '附加模型3', '', '', 'InnoDB', '', 0, 1, 2, 0, 0, 0, 1461639211, 1461639211, 0),
(12, 'a_model5', 'a_table5', '附加模型5', '', '', 'InnoDB', '', 0, 1, 2, 0, 0, 0, 1461639233, 1461639233, 0);

-- --------------------------------------------------------

--
-- 表的结构 `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `permission_groups`
--

CREATE TABLE IF NOT EXISTS `permission_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `group_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `outside_type` char(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permission_groups_permission_id_group_id_outside_type_unique` (`permission_id`,`group_id`,`outside_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `permission_rules`
--

CREATE TABLE IF NOT EXISTS `permission_rules` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `mark` char(50) NOT NULL,
  `rule` char(100) NOT NULL,
  `name` char(50) NOT NULL,
  `outside_type` char(60) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `updated_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permission_rules_mark_outside_type_unique` (`mark`,`outside_type`),
  UNIQUE KEY `permission_rules_rule_outside_type_unique` (`rule`,`outside_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tag_contents`
--

CREATE TABLE IF NOT EXISTS `tag_contents` (
  `tid` mediumint(8) unsigned NOT NULL,
  `content` text NOT NULL,
  `created_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `updated_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tag_contents`
--

INSERT INTO `tag_contents` (`tid`, `content`, `created_type`, `updated_type`, `deleted_type`, `created_uid`, `updated_uid`, `deleted_uid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'afdasfdasfdasfdsafdsa', 0, 0, 0, 0, 0, 0, 1456132551, 1456132551, 0),
(10, 'sqlsrvsqlsrvsqlsrv', 0, 0, 0, 0, 0, 0, 1456730012, 1456730012, 0),
(9, '', 0, 0, 0, 0, 0, 0, 1456729871, 1456729871, 0),
(8, 'abcfdafasfds', 0, 0, 0, 0, 0, 0, 1456729864, 1456729864, 0),
(11, '', 0, 0, 0, 0, 0, 0, 1456900311, 1456900311, 0),
(12, '', 0, 0, 0, 0, 0, 0, 1456900316, 1456900316, 0),
(13, 'memcache', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, '1111111111111111122222', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 'fdasfdsafdsasda', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 'fafadsfdsafdsa', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tag_outsides`
--

CREATE TABLE IF NOT EXISTS `tag_outsides` (
  `tag_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `outside_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `outside_type` char(60) NOT NULL,
  PRIMARY KEY (`tag_id`,`outside_id`,`outside_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tag_outsides`
--

INSERT INTO `tag_outsides` (`tag_id`, `outside_id`, `outside_type`) VALUES
(10, 2, 'Simon\\Document\\Models\\Document'),
(10, 37, 'Simon\\Document\\Models\\Document'),
(10, 39, 'Simon\\Document\\Models\\Document'),
(10, 41, 'Simon\\Document\\Models\\Document'),
(10, 42, 'Simon\\Document\\Models\\Document'),
(11, 8, 'Simon\\Document\\Models\\Document'),
(11, 43, 'Simon\\Document\\Models\\Document'),
(11, 46, 'Simon\\Document\\Models\\Document'),
(11, 47, 'Simon\\Document\\Models\\Document'),
(11, 48, 'Simon\\Document\\Models\\Document'),
(11, 49, 'Simon\\Document\\Models\\Document'),
(11, 50, 'Simon\\Document\\Models\\Document'),
(11, 51, 'Simon\\Document\\Models\\Document'),
(11, 52, 'Simon\\Document\\Models\\Document'),
(11, 53, 'Simon\\Document\\Models\\Document'),
(11, 54, 'Simon\\Document\\Models\\Document'),
(11, 55, 'Simon\\Document\\Models\\Document'),
(11, 56, 'Simon\\Document\\Models\\Document'),
(11, 57, 'Simon\\Document\\Models\\Document'),
(11, 58, 'Simon\\Document\\Models\\Document'),
(11, 59, 'Simon\\Document\\Models\\Document'),
(11, 60, 'Simon\\Document\\Models\\Document'),
(11, 61, 'Simon\\Document\\Models\\Document'),
(11, 62, 'Simon\\Document\\Models\\Document'),
(11, 63, 'Simon\\Document\\Models\\Document'),
(11, 64, 'Simon\\Document\\Models\\Document'),
(11, 65, 'Simon\\Document\\Models\\Document'),
(12, 8, 'Simon\\Document\\Models\\Document'),
(13, 6, 'Simon\\Document\\Models\\Document'),
(14, 6, 'Simon\\Document\\Models\\Document'),
(18, 42, 'Simon\\Document\\Models\\Document');

-- --------------------------------------------------------

--
-- 表的结构 `tag_tag_types`
--

CREATE TABLE IF NOT EXISTS `tag_tag_types` (
  `tag_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `type_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`tag_id`,`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tag_types`
--

CREATE TABLE IF NOT EXISTS `tag_types` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `mark` char(30) NOT NULL,
  `name` char(50) NOT NULL,
  `description` char(255) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `updated_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `thumbnail` char(150) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `updated_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updated_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `deleted_uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_name_unique` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `tags`
--

INSERT INTO `tags` (`id`, `name`, `thumbnail`, `status`, `created_type`, `updated_type`, `deleted_type`, `created_uid`, `updated_uid`, `deleted_uid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 'test', '', 0, 0, 0, 0, 0, 0, 0, 1456900316, 1456900316, 0),
(11, 'abc', '', 0, 0, 0, 0, 0, 0, 0, 1456900311, 1456900311, 0),
(10, 'sqlsrv', '', 0, 0, 0, 0, 0, 0, 0, 1456730012, 1456730012, 0),
(15, 'fdsafdsa', '', 1, 0, 0, 0, 0, 0, 0, 1460009209, 1460009209, 0),
(16, 'afdafdasfdsafdsafas12222', '', 4, 0, 0, 0, 0, 0, 0, 1460009271, 1460009699, 0),
(17, 'fdasfd', '', 2, 0, 0, 0, 0, 0, 0, 1460014337, 1460014337, 0),
(18, 'sq;', '', 2, 0, 0, 0, 0, 0, 0, 1460014385, 1460014385, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `fork_id` mediumint(8) unsigned zerofill NOT NULL,
  `other_id` mediumint(8) unsigned zerofill NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `group_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `outside_type` char(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_groups_user_id_group_id_outside_type_unique` (`user_id`,`group_id`,`outside_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'abc3210', '', '$2y$10$3ZNnbSANXBpI1Thr7ol6R.NQsSLUod/P5HeWgoAczMGxvEIsaZnFC', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'abc3210', '', '$2y$10$5hDjSFn76OaEdNfc3ZKk/uaTKbJQK3h68zBJmTRd7KgyUqOpMvETy', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'test123', '', '$2y$10$wl7JJ14E3is3X91VVsr30O5yzGYIaKzRkhHJs8Uevaotdgs10lQe6', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'test123', '', '$2y$10$NjZfIlMTE9CW8/TS6u6bYeUd43ivQqjmjYkDFbj2590jxM3n9qJbK', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'test123', '', '$2y$10$kCAvSeCDKrUqh0iEH/qtxe3g0wh0lhco61OwfV0xFI69888cno7uu', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'test123', '', '$2y$10$utTgxv/PzqRlQXK84xLBcOV9dZNTD3dWhcz/7mL6NT5YbMcMzLLMe', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'abc3210', '', '$2y$10$jABMm5PCwXwJzrbLaSaCdeDHPSDMmyQeGjT37UMdUQGd9HFYKoywK', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'abc3210', '', '$2y$10$3b4EjdvlOazGxk4AiIwpc.EcgM/PjX.TpCMUkIioJ7XQhmLLe.k6q', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'abc3210', '', '$2y$10$AfX4QhO0nOi3kMqqUm8qDOTWkWDfJAo/q2M0dIqIjXcD6uZh2yDaC', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'abcdea', '', '$2y$10$bZSkcOx7B8fZBLiNQe1ETeWb54cB8AeCLh2Jwcly5QSwtMd4FpkDK', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'fdsafas', '434730525@qq.com', '$2y$10$E0rjfAyTysBUYR77N/U7z.4/1ToN5OuVDP/4r1/pcg0Vy794EOjeS', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'fdsafas', '434730525@qq.com', '$2y$10$S/rbidUu8OTb6jOa1ey6Q.98J3M3VhDYmd1FVdW/5nMhjvvqW6SW6', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'fdsafas', '434730525@qq.com', '$2y$10$47gFdfr2FhCytV6SMeBS4erP3sqqUFroyhvnAC/11b3XsOKw6XAFS', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'fdsafas', '434730525@qq.com', '$2y$10$DYPkDpp2z4jDvMhFHRvm9uo3v2q6qu5pqG4KtK1gwB6Vp7eYARUhW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'fdsafas', '434730525@qq.com', '$2y$10$OujQgHiewEVV1ZSrls/7jeW0N8tVDyApYImKMSjWpj7QsL7gwRA8a', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'fdsafas', '434730525@qq.com', '$2y$10$c0leQdzqvpv/ogg/vFYnT.t3oBHgqWvbaeTi00TS7xr7K5rwEqxTm', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'fdsafdsa', '434730525@qq.com', '$2y$10$U.TnM/R.ZpBc/cMT38LXeuLVegLlZ78l.c6ClCDF3PvaPMrLlQG2O', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'abc3210', '28737164@qq.com', '$2y$10$s7sqhA3wCmKvPcfRA.Iv1.nhlnjTiN2unJSo1XY8Ov9S6UPQdzdKK', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'hiword', '434730525@qq.com', '$2y$10$7SubivXy6Xq05.gm4MO.te8q.HpALXkFutcrkwnM8eOtCNOjWVqUG', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'fasdfas', '434730525@qq.com', '$2y$10$lFktieQ7imfdp8oGNpF01.oAxSkc0wpuM9uLsJSAwRgUDJOQlbuNa', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
