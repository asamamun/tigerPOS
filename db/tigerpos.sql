-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 06:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tigerpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `expense` decimal(20,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `address`, `expense`, `created`, `deleted`) VALUES
(1, 'Shariful Islam', 'php.shariful@gmail.com', '01746959343', 'Mirpur 13, Dhaka-1216', '0.00', '2022-06-19 21:08:52', NULL),
(2, 'Tamimul Islam', 'tamimislam732@gmail.com', '01911151732', 'Savar, Dhaka', '0.00', '2022-06-19 21:08:52', NULL),
(3, 'Syed Zayed Hosssain', 'php.zayed@gmail.com', '01629999666', 'Manikdi, Dhaka Cantonment, Dhaka-1206', '0.00', '2022-06-19 21:10:34', NULL),
(4, 'Tasnim Al Rahman', 'tasnim333@gmail.com', '01712345678', 'Mirpur, Dhaka-1216', '0.00', '2022-06-19 21:10:34', NULL),
(5, 'ASA Al-Mamun', 'asamamun.web@gmail.com', '01911039525', 'Dhaka', '123.00', '2022-06-20 10:18:12', NULL),
(6, 'admin123 admin', 'test@gmail.com', '0195465656', 'Taltola', '666.00', '2022-06-20 10:19:01', '2022-06-20 00:25:15'),
(8, 'ASA Al-Mamun456', 'asamamun.web456@gmail.com', '01911039527', 'Dhaka', '777777.00', '2022-06-20 10:20:56', NULL),
(9, 'Xioami MI', 'mi@mi.com', '0123123123', 'Dhaka', '333.00', '2022-06-20 10:25:26', NULL),
(10, 'admin1277', 'admin@idbbisew.com', '01911039529', 'Taltola', '111111.00', '2022-06-20 10:52:10', '2022-06-20 00:25:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
