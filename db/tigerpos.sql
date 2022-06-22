-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 07:09 PM
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
(5, 'Al-Amin', 'alamin@gmail.com', '01912345678', 'Mirpur', '1200000.00', '2022-06-20 16:38:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `amount`, `created`, `deleted`) VALUES
(1, 'Breakfast', '185.00', '2022-06-20 21:52:01', NULL),
(2, 'Lunch', '430.00', '2022-06-20 21:52:15', NULL),
(3, 'Labour Cost', '1500.00', '2022-06-20 21:52:25', NULL),
(4, 'Transport Cost', '3200.00', '2022-06-20 21:52:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `barcode` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `wholesale_price` decimal(20,2) NOT NULL,
  `retail_price` decimal(20,2) NOT NULL,
  `purchase_price` decimal(20,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `tax` decimal(5,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `barcode`, `name`, `company_name`, `category_id`, `supplier_id`, `wholesale_price`, `retail_price`, `purchase_price`, `quantity`, `description`, `tax`, `created`, `deleted`) VALUES
(1, '12343234', 'Lengra Mango (kg)', 'AZ Agro Ltd.', 1, 1, '50.00', '60.00', '35.00', 200, 'Fresh fruits', '0.00', '2022-06-20 20:48:55', NULL),
(2, '12343222', 'Himsagar Mango (kg)', 'Confident Mart Ltd.', 1, 4, '75.00', '90.00', '50.00', 300, 'Fresh Fruits', '5.00', '2022-06-20 20:48:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created`, `deleted`) VALUES
(1, 'Fruits', '2022-06-20 20:19:39', NULL),
(2, 'Kids', '2022-06-20 20:19:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `mobile`, `address`, `created`, `deleted`) VALUES
(1, 'Arif Khan', 'arif@gmail.com', '01911223344', 'Manikdi, Dhaka Cantonment', '2022-06-20 19:33:48', NULL),
(2, 'Md Jony', 'jony@gmail.com', '01911151733', 'Matikata, Dhaka Cantonment', '2022-06-20 19:33:48', NULL),
(3, 'Akib Khan', 'akib@gmail.com', '01711223311', 'Chittagong', '2022-06-20 19:56:16', '2022-06-20 08:56:35'),
(4, 'Rony Hossain', 'rony@gmail.com', '01987654312', 'Mohakhali', '2022-06-20 19:58:52', NULL),
(5, 'Tamim Hossain', 'tamim@gmail.com', '01988383332', 'Dhaka', '2022-06-20 21:22:27', '2022-06-20 10:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `deleted_at`) VALUES
(11, 'admin123', 'admin@gmail.com', '$2y$10$5jcDr4EkuLmgVzXQsdOBFOo87I2Ot9s1Q9yfiZohuPl.2I/.ntlZS', 1, '2022-06-22 11:08:33', NULL),
(12, 'test', 'test@gmail.com', '$2y$10$kQGyjxVdf6cVfgulgIi2JOld/dJZ/XhWsL8nbO52rZ/fUdMO9o9nu', 1, '2022-06-22 12:17:36', NULL),
(13, 'test33', 'test33@gmail.com', '$2y$10$dco2K49IK9W4gZjE2509Lej49AULjke8cJ5S/Wj.xpjE8O6i9dlwO', 1, '2022-06-22 12:34:44', NULL);

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
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
