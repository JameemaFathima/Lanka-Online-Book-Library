-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2022 at 09:44 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_user_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `userid`, `email`, `password`, `phone`, `deleted`) VALUES
(2, 'Fathima Jameema', 'IT17137874', 'it17137874@my.sliit.lk', '$2y$10$eH4IZ7AjVQtN5njPSbAsXucoT9lIgAhfMLqmCYbHi1n96ggZ3MqHq', '0773312890', 0),
(4, 'Kasun', 'IT17127876', 'test123@gmail.com', '$2y$10$qsOO.PEfntbe8I0Rg4DP0.VLipWvyniPa5hLKAruh.SmALQCZbQe2', '0773312899', 1),
(5, 'Amal', 'IT17147875', 'amal123@gmail.com', '$2y$10$.KqFUrtSUypO9uLh5xccHuB6s04ZXa1EQ8BgHlAhcnfeLs8lZOroC', '0773312891', 1),
(6, 'Nimal', 'IT17137773', 'it17137773@my.sliit.lk', '$2y$10$kveYOACUofWsV.gb5VlLgujAIKQaT3ObNkHTQhLJz92wbKfRi0cBG', '0773312892', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
