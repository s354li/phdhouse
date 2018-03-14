-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 14, 2018 at 02:04 AM
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
-- Database: `phdhouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(500) NOT NULL,
  `First_Name` varchar(500) DEFAULT NULL,
  `Last_Name` varchar(500) DEFAULT NULL,
  `Password` varchar(1000) NOT NULL,
  `Country` varchar(250) DEFAULT NULL,
  `PhoneNumber` varchar(250) DEFAULT NULL,
  `Email` varchar(350) DEFAULT NULL,
  `Level` int(11) NOT NULL,
  `Photo` longblob,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `User_Name`, `First_Name`, `Last_Name`, `Password`, `Country`, `PhoneNumber`, `Email`, `Level`, `Photo`) VALUES
(1, 'grace.li', 'Siyuan', 'Li', '920328', 'Canada', '12269781254', 'zoujinshenhai@gmail.com', 1, ''),
(2, 'pan', 'Jialei', 'Pan', '12345', 'China', '15197216860', 'jocelypan@gmail.com', 1, ''),
(3, 'Chao', 'Chao', 'Li', '11111111', 'Canada', '2269781254', 'Jeremy3Markhan3@gmail.com', 2, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
