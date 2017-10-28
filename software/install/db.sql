-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 02, 2016 at 11:34 AM
-- Server version: 5.5.49-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shekharc_mytest`
--

-- --------------------------------------------------------

--
-- Table structure for table `appeal`
--

CREATE TABLE IF NOT EXISTS `appeal` (
  `ticket` varchar(200) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(200) NOT NULL,
  `body` varchar(2000) DEFAULT NULL,
  `tel` varchar(200) DEFAULT NULL,
  `timestamp` varchar(200) DEFAULT NULL,
  `IP` varchar(200) DEFAULT NULL,
  `stat` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ticket` (`ticket`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `banip`
--

CREATE TABLE IF NOT EXISTS `banip` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(200) DEFAULT NULL,
  `IP` varchar(200) DEFAULT NULL,
  `active` int(1) DEFAULT '0',
  `timestamp` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  UNIQUE KEY `IP` (`IP`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
  `credits` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `stamp` varchar(200) NOT NULL,
  `transid` varchar(200) NOT NULL,
  `status` varchar(20000) DEFAULT NULL,
  `ip` varchar(200) NOT NULL,
  UNIQUE KEY `transid_2` (`transid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blacklist`
--

CREATE TABLE IF NOT EXISTS `blacklist` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `time` varchar(200) DEFAULT NULL,
  `IP` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `boss`
--

CREATE TABLE IF NOT EXISTS `boss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `lastlogin` varchar(200) DEFAULT NULL,
  `active` varchar(5) DEFAULT 'y',
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `balance` int(12) DEFAULT NULL,
  `total` int(6) DEFAULT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(99) DEFAULT NULL,
  `apikey` varchar(200) DEFAULT NULL,
  `signature` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `boss`
--

INSERT INTO `boss` (`id`, `username`, `password`, `lastlogin`, `active`, `fname`, `lname`, `email`, `balance`, `total`, `tel`, `address`, `city`, `country`, `apikey`, `signature`) VALUES
(1, 'admin', 'admin', '2016-05-02 13:48:35', 'Y', 'My', 'Admin', 'admin@admin.com', 50000, 0, '0', 'Address', 'City', 'Country', '57c014e292245f9056', '');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(2000) NOT NULL,
  `grp` varchar(55000) DEFAULT NULL,
  `user` varchar(2000) NOT NULL,
  `time` varchar(200) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2055 ;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `stat` varchar(3) NOT NULL DEFAULT '1',
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Receiver` varchar(100) NOT NULL,
  `Sender` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Replyto` varchar(100) NOT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Content` longtext,
  `CC` varchar(1000) DEFAULT NULL,
  `BCC` varchar(1000) DEFAULT NULL,
  `Files` varchar(10) NOT NULL,
  `IP` varchar(100) DEFAULT NULL,
  `Stamp` varchar(250) NOT NULL DEFAULT 'now() + INTERVAL 630 MINUTE',
  `user` varchar(200) DEFAULT 'SYSTEM',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=163 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `grpname` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `time` varchar(200) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastlogin` varchar(250) NOT NULL DEFAULT 'NOW() + INTERVAL 630 MINUTE',
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `tel` mediumtext NOT NULL,
  `registerlog` varchar(500) NOT NULL,
  `active` varchar(5) NOT NULL DEFAULT 'Y',
  `total` int(11) DEFAULT '0',
  `balance` int(11) DEFAULT '5',
  `apikey` varchar(200) DEFAULT NULL,
  `signature` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `apikey` (`apikey`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE IF NOT EXISTS `main` (
  `id` int(1) DEFAULT NULL,
  `projectname` varchar(300) NOT NULL,
  `weburl` varchar(300) NOT NULL,
  `supporturl` varchar(300) NOT NULL,
  `supportemail` varchar(300) NOT NULL,
  `paypal` varchar(200) NOT NULL,
  `extcode` varchar(55000) DEFAULT NULL,
  `smsrate` double NOT NULL,
  `paysand` varchar(500) DEFAULT NULL,
  `smsapi` varchar(200) DEFAULT NULL,
  `univalert` varchar(2000) DEFAULT NULL,
  `license` varchar(200) NOT NULL,
  `install` int(1) DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`id`, `projectname`, `weburl`, `supporturl`, `supportemail`, `paypal`, `extcode`, `smsrate`, `paysand`, `smsapi`, `univalert`, `license`, `install`) VALUES
(1, 'Alien Master', 'https://manage.sendmymail.in/', 'https://support.hostdude.org/', 'helpline@hostdude.org', 'pay@hostdude.org', '', 0.06, 'sandbox.paypal.com', '97171AtgwE89LMjHq563b08a0', '', 'AA4FC2D671528C46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `resetpasslog`
--

CREATE TABLE IF NOT EXISTS `resetpasslog` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20000) NOT NULL,
  `otp` varchar(1000) DEFAULT NULL,
  `time` varchar(2000) DEFAULT NULL,
  `oldpass` varchar(2000) NOT NULL,
  `newpass` varchar(2000) NOT NULL,
  `IP` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(200) DEFAULT NULL,
  `body` longtext,
  `timestamp` varchar(200) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE IF NOT EXISTS `verify` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(200) NOT NULL,
  `passport` int(1) DEFAULT '0',
  `agreement` int(1) DEFAULT '0',
  `address` int(1) DEFAULT '0',
  `verifystamp` varchar(200) DEFAULT NULL,
  `registerstamp` varchar(200) DEFAULT NULL,
  `econf` int(1) DEFAULT '0',
  `mconf` int(1) DEFAULT '0',
  `ecode` varchar(200) DEFAULT NULL,
  `mcode` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

UPDATE main set install=2 where id=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
