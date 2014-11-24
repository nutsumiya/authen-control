-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- โฮสต์: 127.0.0.1
-- เวลาในการสร้าง: 
-- เวอร์ชั่นของเซิร์ฟเวอร์: 5.5.32
-- รุ่นของ PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ฐานข้อมูล: `acdb`
--
CREATE DATABASE IF NOT EXISTS `acdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `acdb`;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `authoriseds`
--

CREATE TABLE IF NOT EXISTS `authoriseds` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `cardid` varchar(10) NOT NULL,
  `enterTime` time NOT NULL,
  `exitTime` time NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- dump ตาราง `authoriseds`
--

INSERT INTO `authoriseds` (`aid`, `name`, `status`, `cardid`, `enterTime`, `exitTime`) VALUES
(1, 'ณัช เรือนเพ็ชร์', 'อนุญาต', '0011', '07:00:00', '13:00:00');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `guests`
--

CREATE TABLE IF NOT EXISTS `guests` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `cardid` varchar(10) NOT NULL,
  `enterTime` datetime NOT NULL,
  `exitTime` datetime NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `guests`
--

INSERT INTO `guests` (`gid`, `name`, `status`, `cardid`, `enterTime`, `exitTime`) VALUES
(1, 'คณิตส์', 'ไม่อนุญาต', '0012', '2014-11-02 06:22:00', '2014-11-26 03:05:00');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- dump ตาราง `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `name`, `isAdmin`) VALUES
(2, 'admin', '1q2w3e4r', 'ผู้คุมระบบ', 1),
(3, 'yam', '1q2w3e4r', 'ยาม', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
