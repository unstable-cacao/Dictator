-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2016 at 11:13 AM
-- Server version: 5.6.32-78.1-log
-- PHP Version: 5.6.23-1+deprecated+dontuse+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Dictator`
--

-- --------------------------------------------------------

--
-- Table structure for table `BaseEvent`
--

CREATE TABLE IF NOT EXISTS `BaseEvent` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `EventName` varchar(256) NOT NULL,
  `UserID` varchar(256) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `k_EventName` (`EventName`(255)),
  KEY `k_UserID` (`UserID`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `BaseEvent`
--

INSERT INTO `BaseEvent` (`ID`, `Created`, `Modified`, `EventName`, `UserID`) VALUES
(6, '2016-11-02 07:34:40', '2016-11-02 07:34:40', 'login', '5');

-- --------------------------------------------------------

--
-- Table structure for table `ParameterizedEvent`
--

CREATE TABLE IF NOT EXISTS `ParameterizedEvent` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `EventName` varchar(256) NOT NULL,
  `UserID` varchar(256) NOT NULL,
  `ParamsCount` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `k_EventName` (`EventName`(255)),
  KEY `k_UserID` (`UserID`(255))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Parameters`
--

CREATE TABLE IF NOT EXISTS `Parameters` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EventID` int(11) NOT NULL,
  `ParamName` varchar(256) NOT NULL,
  `ParamValue` varchar(256) NOT NULL,
  `Created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `k_EventID` (`EventID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Parameters`
--
ALTER TABLE `Parameters`
  ADD CONSTRAINT `fk_Parameters_EventID` FOREIGN KEY (`EventID`) REFERENCES `ParameterizedEvent` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
