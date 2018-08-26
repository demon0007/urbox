-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2017 at 06:49 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

DROP TABLE IF EXISTS `signin`;
CREATE TABLE IF NOT EXISTS `signin` (
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(30) DEFAULT NULL,
  `QUESTION` varchar(100) DEFAULT NULL,
  `ANSWER` varchar(50) DEFAULT NULL,
  `HINT` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`USERNAME`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`USERNAME`, `PASSWORD`, `QUESTION`, `ANSWER`, `HINT`) VALUES
('priyesh', 'raj', 'what do i fear', 'snakes', 'lname'),
('sarvesh', 'asd', 'what do i fear', 'snakes', 'fname'),
('test', 'run', 'run', 'run', 'run'),
('fafdaa', '', '', '', ''),
('test2', 'run', 'run', 'run', 'run');

--
-- Triggers `signin`
--
DROP TRIGGER IF EXISTS `UpTime`;
DELIMITER $$
CREATE TRIGGER `UpTime` AFTER UPDATE ON `signin` FOR EACH ROW UPDATE uptime
SET LU = now()
WHERE USERNAME=new.USERNAME
$$
DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
